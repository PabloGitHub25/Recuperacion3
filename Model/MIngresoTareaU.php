<?php
include("../Config/confg.php");
session_start();

// Verificar si el usuario está logeado y obtener su ID
if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si se han seleccionado tareas
        if (isset($_POST["tareas"])) {
            $tareasSeleccionadas = $_POST["tareas"];

            foreach ($tareasSeleccionadas as $nombreTarea) {
                // Verificar si la tarea ya está asignada al usuario
                $sqlCheckAssigned = "SELECT idTarea FROM usuario_tarea WHERE idUser='$idUser' AND idTarea IN (SELECT idTarea FROM tareas WHERE nombreTarea='$nombreTarea')";
                $resultCheckAssigned = mysqli_query($conexion, $sqlCheckAssigned);

                if (mysqli_num_rows($resultCheckAssigned) == 0) {
                    // Insertar la tarea en la tabla usuario_tarea si no está asignada
                    $sqlInsert = "INSERT INTO usuario_tarea (idUser, idTarea, estado) SELECT '$idUser', idTarea, 'Pendiente' FROM tareas WHERE nombreTarea='$nombreTarea'";
                    mysqli_query($conexion, $sqlInsert);
                }
            }

            echo "Tareas agregadas correctamente";
        } else {
            echo "No se han seleccionado tareas";
        }
    }
} else {
    echo "Usuario no logeado";
}
?>
