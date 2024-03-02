<?php
include("../Config/confg.php");
session_start();

if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $tipo = $_POST["tipo"];
        $descripcion = $_POST["descripcion"];

        // Insertar la nueva tarea en la tabla tareas
        $sqlInsert = "INSERT INTO tareas (nombreTarea, tipoTarea, descripcion) VALUES ('$nombre', '$tipo', '$descripcion')";
        if (mysqli_query($conexion, $sqlInsert)) {
            echo "<script>alert('Nueva Tarea Agregada.');</script>";
            echo "<script>window.location.href='../View/VAgregarTareaA.php';</script>";
        } else {
            echo "<script>alert('Error al añadir la nueva tarea: " . mysqli_error($conexion) . "');</script>";
        }
    }
} else {
    echo "<script>alert('Usuario no logeado');</script>";
}
?>
