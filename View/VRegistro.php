<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="modal">
        <div class="modal-content">
            <h1 style="text-align: center;">Registro de Nuevo Usuario</h1>
            <form action="../Model/MVerificarRegistro.php" method="post">
                <label for="nombreUser">Nombre de Usuario:</label>
                <input type="text" id="nombreUser" name="nombreUser" required>
                <label for="emailUser">Email:</label>
                <input type="text" id="emailUser" name="emailUser" required>
                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseñaUser" name="contraseñaUser" required>
                <br><br>
                <input type="submit" value="Registrar" class="button">
            </form>
        </div>
    </div>
</body>
</html>
