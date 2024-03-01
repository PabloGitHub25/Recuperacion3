<?php
include("../Config/confg.php");
session_start();

if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["tareas_editar"])) {
            $tareasEditar = implode(",", $_POST["tareas_editar"]);

            // Ejemplo: Recuperar detalles de las tareas desde la base de datos para el formulario de edición
            $sqlDetallesTareas = "SELECT idTarea, nombreTarea, tipoTarea, descripcion FROM tareas WHERE idTarea IN ($tareasEditar)";
            $resultDetallesTareas = mysqli_query($conexion, $sqlDetallesTareas);

            // Mostrar formulario de edición
            while ($row = mysqli_fetch_assoc($resultDetallesTareas)) {
                echo '<form action="../Model/MActualizarTareas.php" method="post">';
                echo 'ID de Tarea: ' . $row['idTarea'] . '<br>';
                echo 'Nombre: <input type="text" name="nombre_tarea" value="' . htmlspecialchars($row['nombreTarea']) . '"><br>';
                echo 'Tipo: <input type="text" name="tipo_tarea" value="' . htmlspecialchars($row['tipoTarea']) . '"><br>';
                echo 'Descripción: <textarea name="descripcion_tarea">' . htmlspecialchars($row['descripcion']) . '</textarea><br>';
                echo '<input type="hidden" name="id_tarea" value="' . $row['idTarea'] . '">';
                echo '<input type="submit" value="Guardar Cambios">';
                echo '</form>';
            }
        } else {
            echo "No se han seleccionado tareas para editar";
        }
    }
} else {
    echo "Usuario no logeado";
}
?>
