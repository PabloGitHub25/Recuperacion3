<?php
include("../Config/confg.php");
include("../View/VPlantilla.php");

session_start();

if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];

    // Obtener datos del usuario
    $sqlUser = "SELECT idUser, nombreUser FROM usuario WHERE idUser = $idUser";
    $resultadoUser = mysqli_query($conexion, $sqlUser);
    $userData = mysqli_fetch_assoc($resultadoUser);

    // Consulta de tareas completadas
    $sql = "SELECT t.idTarea, t.nombreTarea, t.tipoTarea, t.descripcion, ut.estado
    FROM tareas t
    LEFT JOIN usuario_tarea ut ON t.idTarea = ut.idTarea
    WHERE ut.idUser = $idUser AND ut.estado = 'Completado'
    ORDER BY t.idTarea";

    $resultado = mysqli_query($conexion, $sql);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 10); // Fuente en negrita con tamaño 14
    $pdf->Cell(0, 10, 'Tareas Completadas', 0, 1, 'C'); // Título centrado
    $pdf->Ln(5); // Salto de línea después del título

    // Crear fila para mostrar los datos del usuario
    $pdf->SetFont('Arial', 'I', 10);
    $pdf->Cell(0, 10, 'Usuario: ' . $userData['nombreUser'] . ' (ID: ' . $userData['idUser'] . ')', 0, 1, 'C');
    $pdf->Ln(5);

    // Calcular el ancho total de la tabla
    $anchoTotal = 30 + 45 + 30 + 30; // Suma de los anchos de las columnas

    // Calcular la posición X para centrar la tabla
    $centroX = ($pdf->GetPageWidth() - $anchoTotal) / 2;

    // Establecer la posición X al centro de la página
    $pdf->SetX($centroX);

    // Crear las celdas de la tabla
    $pdf->SetFillColor(192, 194, 215); // #C0C2D7
    $pdf->Cell(30, 4, 'ID Tarea', 1, 0, 'C', true);
    $pdf->Cell(45, 4, 'Nombre Tarea', 1, 0, 'C', true);
    $pdf->Cell(30, 4, 'Tipo Tarea', 1, 0, 'C', true);
    $pdf->Cell(30, 4, 'Estado', 1, 0, 'C', true);  
    $pdf->Ln();

    // Mostrar datos del usuario en la misma tabla
    $pdf->SetX($centroX);
    $pdf->Cell(30, 4, $userData['idUser'], 1, 0, 'C');
    $pdf->Cell(45, 4, $userData['nombreUser'], 1, 0, 'C');
    $pdf->Cell(30, 4, '', 1, 0, 'C'); // Celda vacía para el tipo de tarea
    $pdf->Cell(30, 4, '', 1, 0, 'C'); // Celda vacía para el estado
    $pdf->Ln(); // Salto de línea después de los datos del usuario

    while ($mostrar = mysqli_fetch_array($resultado)) {
        $pdf->SetX($centroX);
        $pdf->Cell(30, 4, $mostrar['idTarea'], 1, 0, 'C');
        $pdf->Cell(45, 4, $mostrar['nombreTarea'], 1, 0, 'C');
        $pdf->Cell(30, 4, $mostrar['tipoTarea'], 1, 0, 'C');
        $pdf->Cell(30, 4, $mostrar['estado'], 1, 0, 'C'); 
        $pdf->Ln(); // Salto de línea después de cada fila
    }

    $pdf->Output('I');
} else {
    echo "Usuario no logeado";
}

?>