<?php
include("../Config/confg.php");
session_start();

// Verificar si el usuario está logeado y obtener su ID
if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];

    // Inicializar el array de tareas seleccionadas en la sesión si no existe
    if (!isset($_SESSION['tareasSeleccionadas'])) {
        $_SESSION['tareasSeleccionadas'] = [];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si se han seleccionado tareas
        if (isset($_POST["tareas"])) {
            $tareasSeleccionadas = $_POST["tareas"];
            $tareasNuevas = array_diff($tareasSeleccionadas, $_SESSION['tareasSeleccionadas']);

            foreach ($tareasNuevas as $nombreTarea) {
                // Obtener el idTarea correspondiente al nombre de la tarea
                $sqlGetIdTarea = "SELECT idTarea FROM tareas WHERE nombreTarea='$nombreTarea'";
                $resultIdTarea = mysqli_query($conexion, $sqlGetIdTarea);

                if (mysqli_num_rows($resultIdTarea) > 0) {
                    $rowIdTarea = mysqli_fetch_assoc($resultIdTarea);
                    $idTarea = $rowIdTarea['idTarea'];

                    // Verificar si la tarea ya está asignada al usuario
                    $sqlCheckAssigned = "SELECT idUsuarioTarea FROM usuario_tarea WHERE idUser='$idUser' AND idTarea='$idTarea'";
                    $resultCheckAssigned = mysqli_query($conexion, $sqlCheckAssigned);

                    if (mysqli_num_rows($resultCheckAssigned) == 0) {
                        // Insertar la tarea en la tabla usuario_tarea si no está asignada
                        $sqlInsert = "INSERT INTO usuario_tarea (idUser, idTarea, estado) VALUES ('$idUser', '$idTarea', 'Pendiente')";
                        mysqli_query($conexion, $sqlInsert);
                    } else {
                        echo "La tarea $nombreTarea ya está asignada al usuario.";
                    }
                } else {
                    echo "La tarea con nombre $nombreTarea no existe en la tabla tareas.";
                }
            }

            // Actualizar el registro de tareas seleccionadas en la sesión
            $_SESSION['tareasSeleccionadas'] = $tareasSeleccionadas;

            echo "Tareas agregadas correctamente";
        } else {
            echo "No se han seleccionado tareas";
        }
    }
} else {
    echo "Usuario no logeado";
}
?>
