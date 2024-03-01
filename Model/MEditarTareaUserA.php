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
$sqlTarea = "SELECT t.*
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
        <form action="../Model/MIEditarTareaUserA.php" method="post" class="tareas-container">
            <input type="hidden" name="id" value="<?php echo $row['idTarea']; ?>">
            <label for="nombre">Nombre de la tarea: </label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombreTarea']; ?>" required>
            <br><br>
            <label for="descripcion">Descripción de la tarea: </label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10" required><?php echo $row['descripcion']; ?></textarea>
            <br><br>
            <label for="estado">Estado de la tarea: </label>
            <select name="estado" id="estado">
                <option value="Pendiente" <?php if (isset($row['estado']) && $row['estado'] == 'Pendiente') echo 'selected'; ?>>Pendiente</option>
                <option value="Completada" <?php if (isset($row['estado']) && $row['estado'] == 'Completada') echo 'selected'; ?>>Completada</option>
            </select>

            <br><br>
            <input type="submit" value="Actualizar Tarea">
        </form>
    </div>
</body>
</html>
