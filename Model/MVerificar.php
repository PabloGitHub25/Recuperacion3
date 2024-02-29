<?php
include("../Config/confg.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $contraseña = $_POST["contraseña"];

    // Consulta a la base de datos para verificar si el usuario existe
    $sql = "SELECT idUser FROM usuario WHERE emailUser = '$email' AND contraseñaUser = '$contraseña'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        // Usuario autenticado, obtener el idUser
        $row = mysqli_fetch_assoc($resultado);
        $idUser = $row['idUser'];

        // Iniciar sesión y almacenar el idUser en la sesión
        $_SESSION['idUser'] = $idUser;

        // Redirigir a la página de inicio de usuario
        header("Location: ../View/VInicioUser.php");
        exit();
    } else {
        // Usuario no autenticado, redirigir a la página de registro
        header("Location: ../View/VRegistro.php");
        exit();
    }
}
?>
