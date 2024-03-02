<?php
include("../Config/confg.php"); // Incluir archivo de conexión

// Obtener el ID de usuario enviado desde el formulario
$idUser = $_GET['idUser'];

// Consulta SQL para obtener los datos del usuario con el ID proporcionado
$sql = "SELECT * FROM usuario WHERE idUser = $idUser";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Agregar el enlace a la hoja de estilos CSS
    echo '<link rel="stylesheet" href="../css/styleRegEdit.css">';

    // Mostrar los datos del usuario en una ventana modal
    echo '<div class="modal";">';
    echo '    <div class="modal-content">';

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<h2>Datos del Usuario:</h2>';
        echo '<form action="../Model/MEditarDatosUsuario.php" method="post">'; // Agregamos el formulario de edición
        echo '<input type="hidden" name="idUser" value="' . $fila['idUser'] . '">'; // Agregamos un campo oculto con el ID del usuario
        echo 'ID: ' . $fila['idUser'] . '<br>';
        echo 'Nombre: <br><input type="text" name="editNombre" value="' . $fila['nombreUser'] . '"><br>'; // Campo de nombre editable
        echo 'Email: <br><input type="text" name="editEmail" value="' . $fila['emailUser'] . '"><br>'; // Campo de email editable
        echo 'Contraseña: <br><input type="text" name="editContraseña" value="' . $fila['contraseñaUser'] . '"><br>'; // Campo de contraseña editable

        echo '<br>';
        echo '<button onclick="window.location.href=\'../View/VEditarDatosUsuario.php\';" class="button">Guardar Cambios</button>';
        echo '<br>';
        
        echo '</form>';
        echo '<button onclick="window.location.href=\'../View/VBuscarDatosUsuario.php\';" class="button">Cancelar</button>';
        // Puedes mostrar más campos aquí según tu estructura de base de datos
    }

    echo '    </div>';
    echo '</div>';
} else {
    echo "<script>alert('No se encontró ningún usuario con el ID proporcionado.');</script>";
    echo "<script>window.location.href='../View/VBuscarDatosUsuario.php';</script>";
    exit();
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
