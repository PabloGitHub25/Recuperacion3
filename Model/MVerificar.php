<?php
include("../Config/confg.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $contraseña = $_POST["contraseña"];

    // Consulta a la base de datos para verificar si el usuario es usuario o administrador
    $sql = "(SELECT idUser, 'user' AS type FROM usuario WHERE emailUser = '$email' AND contraseñaUser = '$contraseña')
            UNION
            (SELECT idAdmin AS idUser, 'admin' AS type FROM administrador WHERE emailAdmin = '$email' AND contraseñaAdmin = '$contraseña')";

    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        // Usuario autenticado, obtener el idUser y tipo de usuario
        $row = mysqli_fetch_assoc($resultado);
        $idUser = $row['idUser'];
        $tipoUsuario = $row['type'];

        // Iniciar sesión y almacenar el idUser y tipo de usuario en la sesión
        $_SESSION['idUser'] = $idUser;
        $_SESSION['tipoUsuario'] = $tipoUsuario;

        // Redirigir según el tipo de usuario
        if ($tipoUsuario == 'user') {
            header("Location: ../View/VInicioUser.php");
            exit();
        } else if ($tipoUsuario == 'admin') {
            header("Location: ../View/VInicioAdmin.php");
            exit();
        }
    } else {
        // Usuario no autenticado, redirigir a la página de registro
        header("Location: ../View/VRegistro.php");
        exit();
    }
}
?>
