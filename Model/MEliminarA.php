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
    <title>Eliminar Tarea</title>
    <link rel="stylesheet" href="../css/styleUser.css">
</head>
<body>
    <div class="container">
        <h1>Editar Tarea</h1>
        <img src="../public/img/editar_eliminar.jpg" alt="Imagen">
        <form action="../Model/MEliminarTareasA.php" method="post" class="tareas-container">
            <input type="hidden" name="id" value="<?php echo $row['idTarea']; ?>">
            <label for="nombre">Nombre de la tarea: </label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombreTarea']; ?>" readonly>
            <br><br>
            <label for="tipo">Tipo de la tarea: </label>
            <input type="text" name="tipo" id="tipo" value="<?php echo $row['tipoTarea']; ?>" readonly>
            <br><br>
            <label for="descripcion">Descripción de la tarea: </label>
            <textarea name="descripcion" id="decripcion" cols="100" rows="7" readonly><?php echo $row['descripcion']; ?></textarea>
            <br>
            <?php include("../Model/MVerificar.php"); ?>
            <center><input type="submit" value="Eliminar Tarea" class="button" disabled></center>
        </form>
    </div>
</body>
</html>
