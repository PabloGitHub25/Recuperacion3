<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="../css/styleEdit.css">
</head>
<body>
    <Center><h2>Lista de Tareas</h2></Center> 

    <table border="1">
        <tr class="titulo-fila">
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Acción</th>
        </tr>
        <?php
        include("../Model/MEditarEliminarA.php");
        $tareas = obtenerTareas();
        foreach ($tareas as $tarea) {
            echo '<tr>';
            echo '<td>' . $tarea['idTarea'] . '</td>';
            echo '<td>' . $tarea['nombreTarea'] . '</td>';
            echo '<td>' . $tarea['tipoTarea'] . '</td>';
            echo '<td>' . $tarea['descripcion'] . '</td>';
            echo '<td>';
            echo '<a href="../Model/MEditarA.php?id=' . $tarea['idTarea'] . '">Editar</a> | ';
            echo '<a href="eliminar.php?id=' . $tarea['idTarea'] . '">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    <br>

</body>
</html>
