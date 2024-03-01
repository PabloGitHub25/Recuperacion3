<?php
include("../Config/confg.php");

// Verificar si se ha seleccionado un usuario
if (isset($_GET['idUser'])) {
    $idUser = $_GET['idUser'];
} else {
    die("Error: No se ha seleccionado un usuario.");
}

// Obtener el idTarea de la URL
$idTarea = $_GET['id'];

// Obtener los detalles de la tarea del usuario seleccionado desde la base de datos
$sqlTarea = "SELECT t.*, ut.estado
             FROM usuario_tarea ut
             INNER JOIN tareas t ON ut.idTarea = t.idTarea
             WHERE ut.idUser = $idUser AND ut.idTarea = $idTarea";
$resultTarea = mysqli_query($conexion, $sqlTarea);

if (!$resultTarea) {
    die("Error al obtener la tarea: " . mysqli_error($conexion));
}

$row = mysqli_fetch_assoc($resultTarea);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea de Usuario</title>
    <link rel="stylesheet" href="../css/styleUser.css">
</head>
<body>
    <div class="container">
        <h1>Editar Tarea de Usuario</h1>
        <img src="../public/img/agregar.png" alt="Imagen">
        <form action="../Model/MActualizarTareas.php" method="post" class="tareas-container">
            <input type="hidden" name="id" value="<?php echo $row['idTarea']; ?>">
            <label for="nombre">Nombre de la tarea:</label>
            <p><?php echo $row['nombreTarea']; ?></p>
            <br>
            <label for="descripcion">Descripción de la tarea:</label>
            <p><?php echo $row['descripcion']; ?></p>
            <br>
            <label for="nuevo_estado">Estado de la tarea:</label>
            <select name="nuevo_estado[<?php echo $row['idTarea']; ?>]">
                <option value="Pendiente" <?php if ($row['estado'] == 'Pendiente') echo 'selected'; ?>>Pendiente</option>
                <option value="Completado" <?php if ($row['estado'] == 'Completado') echo 'selected'; ?>>Completado</option>
            </select>
            <br><br>
            <input type="submit" value="Actualizar Estado">
        </form>
    </div>
</body>
</html>
