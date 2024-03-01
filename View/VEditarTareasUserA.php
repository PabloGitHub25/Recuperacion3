<?php
include("../Config/confg.php");
session_start();

if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];

    // Obtener los detalles de las tareas de usuario desde el modelo MUserTareas
    include("../Model/MUserTareas.php");
    $userTareas = obtenerUserTareas();

    // Mostrar la tabla con los detalles de las tareas de usuario
    echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edición de Tareas de Usuario</title>
            <link rel="stylesheet" href="../css/styleUser.css">
        </head>
        <body>
            <div class="container" style="margin: 0 auto; width: 80%;">
                <h1>Edición de tareas de usuarios</h1>
                <img src="../public/img/agregar.png" alt="Imagen">
                <form action="../Model/MIEditarTareaUserA.php" method="post" class="tareas-container">
                    <table border="1" style="margin: 0 auto;">
                        <tr>
                            <th>ID Usuario</th>
                            <th>Nombre Usuario</th>
                            <th>Nombre Tarea</th>
                            <th>Acciones</th>
                        </tr>';
    foreach ($userTareas as $userTarea) {
        echo '<tr>';
        echo '<td>' . $userTarea['idUser'] . '</td>';
        echo '<td>' . $userTarea['nombreUser'] . '</td>';
        echo '<td>' . $userTarea['nombreTarea'] . '</td>';
        echo '<td>';
        echo '<a href="../Model/MEditarTareaUserA.php?id=' . $userTarea['idTarea'] . '&idUser=' . $userTarea['idUser'] . '">Editar</a> | ';
        echo '<a href="../Model/MEliminarTarea.php?id=' . $userTarea['idTarea'] . '">Eliminar</a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</form></div></body></html>';
} else {
    echo "Usuario no logeado";
}
?>
