<?php
include("../Config/confg.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el id de la tarea a eliminar
    $idTarea = $_POST["id"];

    // Eliminar la tarea de la base de datos
    $sql = "DELETE FROM tareas WHERE idTarea = $idTarea";
    $result = mysqli_query($conexion, $sql);

    if ($result) {
        echo "<script>alert('Tarea eliminada correctamente');</script>";
        echo "<script>window.location.href='../View/VEditarEliminarA.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar la tarea: " . mysqli_error($conexion) . "');</script>";
    }
} else {
    echo "<script>alert('Acceso denegado');</script>";
}
?>
