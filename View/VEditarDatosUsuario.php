<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos de Usuario</title>
    <link rel="stylesheet" href="../css/styleRegEdit.css">
</head>
<body>
    <div class="modal">
        <div class="modal-content">
            <h1>Editar Datos de Usuario</h1>
            <form action="../Model/MEditarDatosUsuario.php" method="post">
                <label for="idUser">ID de Usuario:</label>
                <input type="text" id="idUser" name="idUser" value="<?php echo $idUser; ?>" readonly>
                <label for="editNombre">Nuevo nombre:</label>
                <input type="text" id="editNombre" name="editNombre" required>
                <label for="editEmail">Nuevo email:</label>
                <input type="text" id="editEmail" name="editEmail" required>
                <label for="editContraseña">Nueva contraseña:</label>
                <input type="password" id="editContraseña" name="editContraseña" required> 
                <br><br>
                <input type="submit" value="Actualizar" class="button">
            </form>
        </div>
    </div>
</body>
</html>
