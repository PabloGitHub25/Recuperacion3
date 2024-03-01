<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Usuario</title>
</head>
<body>
    <h1>Buscar Usuario por ID</h1>
    <form action="../Model/MBuscarDatosUsuario.php" method="GET">
        <label for="idUser">ID de Usuario:</label>
        <input type="text" id="idUser" name="idUser" required>
        <input type="submit" value="Buscar">
    </form>

    <?php
    // Mostrar los datos del usuario si se ha enviado un ID de usuario
    if (isset($_GET['idUser'])) {
        $idUser = $_GET['idUser'];
        include("../Model/MBuscarDatosUsuario.php");
    }
    ?>
</body>
</html>
