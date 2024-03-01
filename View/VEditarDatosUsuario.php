<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos de Usuario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="modal">
        <div class="modal-content">
            <h1>Editar Datos de Usuario</h1>
            <form action="../Model/MEditarDatosUsuario.php" method="post">
                <label for="editNombre">Nombre:</label>
                <input type="text" id="editNombre" name="editNombre" required>
                <label for="editEmail">Email:</label>
                <input type="email" id="editEmail" name="editEmail" required>
                <label for="editContraseña">Contraseña:</label>
                <input type="password" id="editContraseña" name="editContraseña" required>
                <br><br>
                <input type="submit" value="Actualizar" class="button">
            </form>

        </div>
    </div>
</body>
</html>
