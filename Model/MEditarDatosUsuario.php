<?php
include("../Config/confg.php"); // Incluir archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario de edición
    $userId = $_POST['editUserId'];
    $nombreUser = $_POST['editNombre'];
    $emailUser = $_POST['editEmail'];

    // Consulta SQL para actualizar los datos del usuario
    $sql = "UPDATE usuario SET nombreUser='$nombreUser', emailUser='$emailUser' WHERE idUser='$userId'";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        // Éxito al actualizar los datos del usuario
        echo "<script>alert('Los datos del usuario han sido actualizados correctamente');</script>";
    } else {
        // Error al actualizar los datos del usuario
        echo "<script>alert('Error al actualizar los datos del usuario');</script>";
    }
}

// Redireccionar de regreso a la página de búsqueda de usuario
echo "<script>window.location='../View/BuscarDatosUsuarios.php';</script>";

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
