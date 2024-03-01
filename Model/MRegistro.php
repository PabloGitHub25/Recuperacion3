<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de configuración de la base de datos
    include("../Config/confg.php");

    // Obtener los datos del formulario
    $nombreUser = $_POST["nombreUser"];
    $emailUser = $_POST["emailUser"];
    $contraseñaUser = $_POST["contraseñaUser"];

    // Hash de la contraseña
    $hashed_password = password_hash($contraseñaUser, PASSWORD_DEFAULT);

    // Preparar la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO usuario (nombreUser, emailUser, contraseñaUser) VALUES ('$nombreUser', '$emailUser', '$hashed_password')";

    // Ejecutar la consulta y verificar si se realizó correctamente
    if (mysqli_query($conexion, $sql)) {
        // Redireccionar a una página de éxito si el registro fue exitoso
        header("Location: ../View/VRegistroExitoso.php");
        exit();
    } else {
        // Mostrar un mensaje de error si hubo un problema con la consulta SQL
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
