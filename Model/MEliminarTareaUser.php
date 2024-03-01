<?php
include("../Config/confg.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Obtener el id de la tarea a eliminar
    $idTarea = $_GET['id'];

    // Verificar si la tarea pertenece al usuario
    if (isset($_GET['idUser'])) {
        $idUser = $_GET['idUser'];
    } else {
        die("Error: No se ha especificado un usuario.");
    }

    // Eliminar la tarea de la tabla usuario_tarea
    $sqlEliminarTarea = "DELETE FROM usuario_tarea WHERE idUser = $idUser AND idTarea = $idTarea";
    $resultEliminarTarea = mysqli_query($conexion, $sqlEliminarTarea);

    if (!$resultEliminarTarea) {
        die("Error al eliminar la tarea: " . mysqli_error($conexion));
    }

    // Redirigir a la página principal de edición de tareas de usuario
    header("Location: ../View/VEditarTareasUserA.php");
    exit();
} else {
    die("Error: Método no permitido o falta el parámetro 'id'.");
}
?>
