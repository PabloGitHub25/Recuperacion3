<?php
include("../Config/confg.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $contraseña = $_POST["contraseña"];

    // Consulta a la base de datos para verificar si el usuario existe
    $sql = "SELECT * FROM usuario WHERE emailUser = '$email' AND contraseñaUser = '$contraseña'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        // Usuario autenticado, redirigir a la página de ingreso
        header("Location: ../View/VInicioUser.php");
        exit();
    } else {
        // Usuario no autenticado, redirigir a la página de registro
        header("Location: MRegistro.php");
        exit();
    }
}
?>
