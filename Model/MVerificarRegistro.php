<?php
include("../Config/confg.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $emailUser = $_POST["emailUser"];

    // Consulta SQL para verificar si el usuario ya está registrado
    $sql_verificar = "SELECT * FROM usuario WHERE emailUser='$emailUser'";

    // Ejecutar la consulta
    $resultado_verificar = mysqli_query($conexion, $sql_verificar);

    // Verificar si se encontraron resultados (si el usuario ya está registrado)
    if (mysqli_num_rows($resultado_verificar) > 0) {
        // Si el usuario ya está registrado, mostrar un mensaje de alerta y redirigir a la página de registro
        echo "<script>alert('El usuario ya está registrado. Por favor, intente con otro correo electrónico.');</script>";
        echo "<script>window.location.href='../View/VRegistro.php';</script>";
        exit();
    }else {
        // El usuario no está registrado, proceder con la inserción en la base de datos
        // Preparar la consulta SQL para insertar los datos en la base de datos
        include("../Model/MRegistro.php");

    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
