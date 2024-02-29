<?php
include("../Config/confg.php");
session_start();

// Verificar si el usuario está logeado y obtener su ID
if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si se han seleccionado tareas
        if (isset($_POST["tareas"])) {
            $tareasSeleccionadas = implode("','", $_POST["tareas"]);
            
            // Insertar las tareas en la tabla usuario_tareas
            $sqlInsert = "INSERT INTO usuario_tarea (idUser, idTarea, estado) SELECT '$idUser', idTarea, 'Pendiente' FROM tareas WHERE nombreTarea IN ('$tareasSeleccionadas')";
            mysqli_query($conexion, $sqlInsert);
            
            echo "Tareas agregadas correctamente";
        } else {
            echo "No se han seleccionado tareas";
        }
    }
} else {
    echo "Usuario no logeado";
}
?>
