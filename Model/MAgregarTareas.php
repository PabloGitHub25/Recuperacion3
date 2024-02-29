<?php
include("../Config/confg.php");

// Consulta a la base de datos para obtener los tipos de tarea
$sqlTipos = "SELECT DISTINCT tipoTarea FROM tareas";
$resultTipos = mysqli_query($conexion, $sqlTipos);

// Mostrar las divisiones y checkboxes con los nombres de las tareas del mismo tipo
while ($rowTipo = mysqli_fetch_assoc($resultTipos)) {
    $tipoTarea = $rowTipo["tipoTarea"];

    echo "<div class='tarea'>";
    echo "<h2>$tipoTarea</h2>";

    $sqlTareas = "SELECT nombreTarea FROM tareas WHERE tipoTarea='$tipoTarea'";
    $resultTareas = mysqli_query($conexion, $sqlTareas);
    while ($rowTarea = mysqli_fetch_assoc($resultTareas)) {
        $nombreTarea = $rowTarea["nombreTarea"];
        echo "<label><input type='checkbox' name='tareas[]' value='$nombreTarea'> $nombreTarea</label><br>";
    }

    echo "</div>";
}

mysqli_close($conexion);
?>
