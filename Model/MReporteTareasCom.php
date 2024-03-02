<?php
include("../Config/confg.php");
include("../View/VPlantilla.php");

session_start();

if (isset($_SESSION['idUser'])) {
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->Cell(0, 10, 'Tareas Completadas de Todos los Usuarios', 0, 1, 'C'); // Título centrado

    // Consulta para obtener todos los usuarios
    $sqlUsers = "SELECT idUser, nombreUser FROM usuario";
    $resultadoUsers = mysqli_query($conexion, $sqlUsers);
    
    // Iterar sobre cada usuario
    while ($userData = mysqli_fetch_assoc($resultadoUsers)) {
        $idUser = $userData['idUser'];
        $nombreUser = $userData['nombreUser'];

        // Mostrar datos del usuario
        $pdf->SetFont('Arial', 'I', 10);
        $pdf->Cell(0, 10, 'Usuario: ' . $nombreUser . ' (ID: ' . $idUser . ')', 0, 1, 'C');
        $pdf->Ln(5);

        // Crear las celdas de la tabla
        $pdf->SetFont('Arial', '', 10); // Fuente normal
        $pdf->SetFillColor(192, 194, 215); // #C0C2D7
        $pdf->Cell(30, 4, 'ID Tarea', 1, 0, 'C', true);
        $pdf->Cell(63, 4, 'Nombre Tarea', 1, 0, 'C', true);
        $pdf->Cell(45, 4, 'Tipo Tarea', 1, 0, 'C', true);
        $pdf->Cell(30, 4, 'Estado', 1, 1, 'C', true);

        // Consulta de tareas completadas por usuario
        $sql = "SELECT t.idTarea, t.nombreTarea, t.tipoTarea, ut.estado
        FROM tareas t
        LEFT JOIN usuario_tarea ut ON t.idTarea = ut.idTarea
        WHERE ut.idUser = $idUser AND ut.estado = 'Completado'
        ORDER BY t.idTarea";

        $resultado = mysqli_query($conexion, $sql);

        // Mostrar tareas completadas del usuario en la tabla
        while ($mostrar = mysqli_fetch_array($resultado)) {
            $pdf->Cell(30, 4, $mostrar['idTarea'], 1, 0, 'C');
            $pdf->Cell(63, 4, $mostrar['nombreTarea'], 1, 0, 'C');
            $pdf->Cell(45, 4, $mostrar['tipoTarea'], 1, 0, 'C');
            $pdf->Cell(30, 4, $mostrar['estado'], 1, 1, 'C');
        }
        $pdf->Ln(5); // Salto de línea después de los datos del usuario y la tabla
    }

    $pdf->Output('I');
} else {
    echo "Usuario no logeado";
}
?>
