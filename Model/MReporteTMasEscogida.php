<?php
include("../Config/confg.php");
include("../View/VPlantilla.php");

session_start();

if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];

    $sql = "SELECT t.idTarea, t.nombreTarea, COUNT(ut.idTarea) AS totalSelecciones
    FROM tareas t
    LEFT JOIN usuario_tarea ut ON t.idTarea = ut.idTarea
    GROUP BY t.idTarea, t.nombreTarea
    ORDER BY totalSelecciones DESC";
    
    $resultado = mysqli_query($conexion, $sql);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 10); // Fuente en negrita con tamaño 14
    $pdf->Cell(0, 10, 'Tareas más Seleccionadas', 0, 1, 'C'); // Título centrado
    $pdf->Ln(10); // Salto de línea después del título
    $pdf->SetFont('Arial', 'I', 7);
    $pdf->Ln(10);

    // Calcular el ancho total de la tabla
    $anchoTotal = 20 + 30 + 20 + 20; // Suma de los anchos de las columnas

    // Calcular la posición X para centrar la tabla
    $centroX = ($pdf->GetPageWidth() - $anchoTotal) / 2;

    // Establecer la posición X al centro de la página
    $pdf->SetX($centroX);

    // Crear las celdas de la tabla
    $pdf->SetFillColor(192, 194, 215); // #C0C2D7
    $pdf->Cell(30, 4, 'ID Tarea', 1, 0, 'C', true);
    $pdf->Cell(45, 4, 'Nombre Tarea', 1, 0, 'C', true);
   $pdf->Cell(30, 4, 'totalSelecciones', 1, 0, 'C', true);
   /*  $pdf->Cell(30, 4, 'Estado', 1, 0, 'C', true);  */
    $pdf->Ln();

    while ($mostrar = mysqli_fetch_array($resultado)) {
        $pdf->SetX($centroX);
        $pdf->Cell(30, 4, $mostrar['idTarea'], 1, 0, 'C');
        $pdf->Cell(45, 4, $mostrar['nombreTarea'], 1, 0, 'C');
        $pdf->Cell(30, 4, $mostrar['totalSelecciones'], 1, 0, 'C');
       /*  $pdf->Cell(30, 4, $mostrar['tipoTarea'], 1, 0, 'C');
        $pdf->Cell(30, 4, $mostrar['estado'], 1, 0, 'C'); */
        $pdf->Ln(); // Salto de línea después de cada fila
    }


    $pdf->Output('I');
} else {
    echo "Usuario no logeado";
}
?>