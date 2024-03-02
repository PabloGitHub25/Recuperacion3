<?php
include("../Config/confg.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idTarea = $_POST["id"];
    $nombreTarea = $_POST["nombre"];
    $tipoTarea = $_POST["tipo"];
    $descripcion = $_POST["descripcion"];

    // Actualizar la tarea en la base de datos
    $sql = "UPDATE tareas SET nombreTarea='$nombreTarea', tipoTarea='$tipoTarea', descripcion='$descripcion' WHERE idTarea=$idTarea";
    $result = mysqli_query($conexion, $sql);

    if ($result) {
        echo "<script>alert('Tarea actualizada correctamente');</script>";
        echo "<script>window.location.href='../Model/MEditarA.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar la tarea: " . mysqli_error($conexion) . "');</script>";
    }
} else {
    echo "<script>alert('Acceso denegado');</script>";
}
?>
