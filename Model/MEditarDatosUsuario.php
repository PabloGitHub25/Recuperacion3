<?php
include("../Config/confg.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario de edición
    $idUser = $_POST['idUser']; // Obtener el ID del usuario desde el formulario
    $nombreUser = $_POST['editNombre'];
    $emailUser = $_POST['editEmail'];
    $contraseñaUser = $_POST['editContraseña'];

    // Consulta SQL para actualizar los datos del usuario
    $sql = "UPDATE usuario SET nombreUser='$nombreUser', emailUser='$emailUser', contraseñaUser='$contraseñaUser' WHERE idUser='$idUser'";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        // Éxito al actualizar los datos del usuario
        echo "<script>alert('Los datos del usuario han sido actualizados correctamente');</script>";
        // Mostrar los datos actualizados en una ventana modal
        echo '<link rel="stylesheet" href="../css/styleRegEdit.css">';

        echo '<div class="modal" ;>';
        echo '    <div class="modal-content">';
        echo '            <h2>Datos del Usuario Actualizados:</h2>';
        echo '            <p>Nombre: ' . $nombreUser . '</p>';
        echo '            <p>Email: ' . $emailUser . '</p>';
        echo '            <p>Contraseña: ' . $contraseñaUser . '</p>';
        echo '<button onclick="window.location.href=\'../View/VInicioAdmin.php\';" class="button">Aceptar</button>';

        echo '    </div>';
        echo '</div>';
    } else {
        // Error al actualizar los datos del usuario
        echo "<script>alert('Error al actualizar los datos del usuario');</script>";
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
