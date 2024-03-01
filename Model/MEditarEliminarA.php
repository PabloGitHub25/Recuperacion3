<?php
include("../Config/confg.php");

function obtenerTareas() {
    global $conexion;
    $tareas = array();

    $sqlTareas = "SELECT * FROM tareas";
    $resultTareas = mysqli_query($conexion, $sqlTareas);

    if (!$resultTareas) {
        die("Error al obtener las tareas: " . mysqli_error($conexion));
    }

    while ($row = mysqli_fetch_assoc($resultTareas)) {
        $tareas[] = $row;
    }

    return $tareas;
}
?>
