<?php
include("../Config/confg.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el id de la tarea a eliminar
    $idTarea = $_POST["id"];

    // Eliminar la tarea de la base de datos
    $sql = "DELETE FROM tareas WHERE idTarea = $idTarea";
    $result = mysqli_query($conexion, $sql);

    if ($result) {
        echo "Tarea eliminada correctamente";
    } else {
        echo "Error al eliminar la tarea: " . mysqli_error($conexion);
    }
} else {
    echo "Acceso denegado";
}
?>
