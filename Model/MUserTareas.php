<?php
include("../Config/confg.php");

function obtenerUserTareas() {
    global $conexion; // Indica que $conexion es una variable global

    // Obtener tareas de usuario desde la base de datos
    $sql = "SELECT u.idUser, u.nombreUser, t.idTarea, t.nombreTarea
            FROM usuario u
            INNER JOIN usuario_tarea ut ON u.idUser = ut.idUser
            INNER JOIN tareas t ON ut.idTarea = t.idTarea";
    $result = mysqli_query($conexion, $sql);

    if (!$result) {
        die("Error al obtener las tareas de usuario: " . mysqli_error($conexion));
    }

    $tareas = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $tareas[] = $row;
    }

    return $tareas;
}
?>
