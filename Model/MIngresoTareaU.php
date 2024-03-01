<?php
include("../Config/confg.php");
session_start();

if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["tareas"])) {
            $tareas = $_POST["tareas"];

            foreach ($tareas as $nombre) {
                $consulta = "SELECT idTarea FROM usuario_tarea WHERE idUsuario='$idUser' AND idTarea IN (SELECT idTarea FROM tareas WHERE nombreTarea='$nombre')";
                $resultado = mysqli_query($conexion, $consulta);

                if (mysqli_num_rows($resultado) == 0) {
                    $insercion = "INSERT INTO usuario_tarea (idUsuario, idTarea, estado) SELECT '$idUser', idTarea, 'Pendiente' FROM tareas WHERE nombreTarea='$nombre'";
                    mysqli_query($conexion, $insercion);
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

