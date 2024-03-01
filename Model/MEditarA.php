<?php
include("../Config/confg.php");

// Obtener el idTarea de la URL
$idTarea = $_GET['id'];

// Obtener los datos de la tarea desde la base de datos
$sqlTarea = "SELECT * FROM tareas WHERE idTarea = $idTarea";
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
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="../css/styleUser.css">
</head>
<body>
    <div class="container">
        <h1>Editar Tarea</h1>
        <img src="../public/img/inicio.png" alt="Imagen">
        <form action="../Model/MActualizarTareasA.php" method="post" class="tareas-container">
        <input type="hidden" name="id" value="<?php echo $row['idTarea']; ?>">
        <label for="nombre">Nombre de la tarea: </label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombreTarea']; ?>">
        <br><br>
        <label for="tipo">Tipo de la tarea: </label>
        <select name="tipo" id="tipo">
            <option value="Educación" <?php if ($row['tipoTarea'] == 'Educación') echo 'selected'; ?>>Educación</option>
            <option value="Desarrollo Personal" <?php if ($row['tipoTarea'] == 'Desarrollo Personal') echo 'selected'; ?>>Desarrollo Personal</option>
            <option value="Responsabilidades Domésticas" <?php if ($row['tipoTarea'] == 'Responsabilidades Domésticas') echo 'selected'; ?>>Responsabilidades Domésticas</option>
            <option value="Relaciones Sociales" <?php if ($row['tipoTarea'] == 'Relaciones Sociales') echo 'selected'; ?>>Relaciones Sociales</option>
            <option value="Salud y Bienestar" <?php if ($row['tipoTarea'] == 'Salud y Bienestar') echo 'selected'; ?>>Salud y Bienestar</option>
        </select>
        <br><br>
        <label for="descripcion">Descripción de la tarea: </label>
        <textarea name="descripcion" id="decripcion" cols="100" rows="7"><?php echo $row['descripcion']; ?></textarea>
        <br>
            <?php include("../Model/MVerificar.php"); ?>
            <center><input type="submit" value="Actualizar Tarea" class="button"></center>
        </form>
    </div>
</body>
</html>
