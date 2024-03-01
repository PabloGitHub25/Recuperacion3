<?php
include("../Config/confg.php");
session_start();

if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];

    // Obtén las tareas del usuario desde la base de datos
    $sqlTareasUsuario = "SELECT t.idTarea, t.nombreTarea, t.tipoTarea, t.descripcion, ut.estado
                        FROM tareas t
                        LEFT JOIN usuario_tarea ut ON t.idTarea = ut.idTarea
                        WHERE ut.idUser = $idUser";

    $resultTareasUsuario = mysqli_query($conexion, $sqlTareasUsuario);

    if (!$resultTareasUsuario) {
        die("Error al obtener las tareas del usuario: " . mysqli_error($conexion));
    }
    ?>
    
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
        
        <form action="../Model/MActualizarTareas.php" method="post">
            <table border="1">
            <tr class="titulo-fila">
        <th>ID</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Nuevo Estado</th>
    </tr>

                <?php
                while ($row = mysqli_fetch_assoc($resultTareasUsuario)) {
                    echo '<tr>';
                    echo '<td>' . $row['idTarea'] . '</td>';
                    echo '<td>' . $row['nombreTarea'] . '</td>';
                    echo '<td>' . $row['tipoTarea'] . '</td>';
                    echo '<td>' . $row['descripcion'] . '</td>';
                    echo '<td>' . $row['estado'] . '</td>';
                    echo '<td>';
                    echo '<select name="nuevo_estado[' . $row['idTarea'] . ']">';
                    echo '<option value="Pendiente">Pendiente</option>';
                    echo '<option value="Completado">Completado</option>';
                    echo '</select>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>

            <input type="submit" value="Actualizar Estados">
        </form>
    </body>
    </html>

<?php
} else {
    echo "Usuario no logeado";
}
?>
