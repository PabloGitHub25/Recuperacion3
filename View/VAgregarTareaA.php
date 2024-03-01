<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación de Nuevas Tareas</title>
    <link rel="stylesheet" href="../css/styleUser.css">
</head>
<body>
    <div class="container">
        <h1>Crear nuevas tareas</h1>
        <img src="../public/img/inicio.png" alt="Imagen">
        <form action="../Model/MIngresoTareasA.php" method="post" class="tareas-container">
        <label for="nombre">Nombre de la tarea: </label>
        <input type="text" name="nombre" id="nombre">
        <br><br>
        <label for="tipo">Tipo de la tarea: </label>
        <select name="tipo" id="tipo">
            <option value="Educación">Educación</option>
            <option value="Desarrollo Personal">Desarrollo Personal</option>
            <option value="Responsabilidades Domésticas">Responsabilidades Domésticas</option>
            <option value="Relaciones Sociales">Relaciones Sociales</option>
            <option value="Salud y Bienestar">Salud y Bienestar</option>
            <option value="Desarrollo Personal">Desarrollo Personal</option>
        </select>
        <br><br>
        <label for="descripcion">Descripción de la tarea: </label>
        <textarea name="descripcion" id="decripcion" cols="100" rows="7"></textarea>
        <br>
            <?php include("../Model/MVerificar.php"); ?>
            <center><input type="submit" value="Añadir nuevas tareas" class="button"></center>
        </form>
    </div>
</body>
</html>
