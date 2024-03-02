<?php
include("../Config/confg.php");
session_start();

if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["nuevo_estado"])) {
            $nuevosEstados = $_POST["nuevo_estado"];

            foreach ($nuevosEstados as $idTarea => $nuevoEstado) {
                // Actualizar el estado en la base de datos
                $sqlUpdateEstado = "UPDATE usuario_tarea 
                                    SET estado = '$nuevoEstado' 
                                    WHERE idUser = $idUser AND idTarea = $idTarea";

                $resultUpdateEstado = mysqli_query($conexion, $sqlUpdateEstado);

                if (!$resultUpdateEstado) {
                    die("Error al actualizar el estado de la tarea: " . mysqli_error($conexion));
                }
            }
            echo "<script>alert('Estados actualizados correctamente');</script>";
        } else {
            echo "<script>alert('No se han seleccionado nuevos estados para las tareas');</script>";
            }
    }
} else {
    echo "<script>alert('Usuario no logeado');</script>";
}
?>
