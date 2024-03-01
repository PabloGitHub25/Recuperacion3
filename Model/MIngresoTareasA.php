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
        $sqlInsert = "INSERT INTO tareas (nombreTarea, tipoTarea, descripcionTarea) VALUES ('$nombre', '$tipo', '$descripcion')";
        if (mysqli_query($conexion, $sqlInsert)) {
            echo "Nueva tarea añadida correctamente";
        } else {
            echo "Error al añadir la nueva tarea: " . mysqli_error($conexion);
        }
    }
} else {
    echo "Usuario no logeado";
}
?>
