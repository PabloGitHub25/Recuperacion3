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
    echo '<link rel="stylesheet" href="../css/style.css">';

    // Mostrar los datos del usuario en una ventana modal
    echo '<div id="userModal" class="modal";">';
    echo '    <div class="modal-content">';

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<h2>Datos del Usuario:</h2>';
        echo 'ID: ' . $fila['idUser'] . '<br>';
        echo 'Nombre: ' . $fila['nombreUser'] . '<br>';
        echo 'Email: ' . $fila['emailUser'] . '<br>';
        echo 'Contraseña: ' . $fila['contraseñaUser'] . '<br>';

        echo '<br>';

        echo '<button onclick="window.location.href=\'../View/VBuscarDatosUsuario.php\';" class="button">Cancelar</button>';

        echo '<button onclick="window.location.href=\'../View/VEditarDatosUsuario.php\';" class="button">Editar</button>';
        
        // Puedes mostrar más campos aquí según tu estructura de base de datos
    }

    echo '    </div>';
    echo '</div>';
} else {
    echo "<p>No se encontró ningún usuario con el ID proporcionado.</p>";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
