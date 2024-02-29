<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INGRESO DE TAREAS</title>
    <link rel="stylesheet" href="../css/styleUser.css">
</head>
<body>
    <div class="container">
        <h1>Agrega nuevas tareas</h1>
        <img src="../public/img/inicio.png" alt="Imagen">
        <form action="../Model/MIngresoTareaU.php" method="post" class="tareas-container">
            <?php include("../Model/MAgregarTareas.php"); ?>
            <?php include("../Model/MVerificar.php"); ?>
            <input type="submit" value="Agregar tareas" class="button">
        </form>
    </div>
</body>
</html>
