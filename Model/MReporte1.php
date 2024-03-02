<?php
include("../Config/confg.php");
include("../View/VPlantilla.php");

session_start();

if (isset($_SESSION['idUser'])) {
    $idUser = $_SESSION['idUser'];

    $sql = "SELECT * FROM usuario_tarea ut
            INNER JOIN tareas t ON ut.idTarea = t.idTarea
            WHERE ut.idUser = $idUser";
    $resultado = mysqli_query($conexion, $sql);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'I', 7);
    $pdf->Cell(0, 10, 'Todas Mis Tareas', 0, 1, 'C'); // Título centrado
    $pdf->Ln(20);

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
    $pdf->Cell(30, 4, 'Tipo Tarea', 1, 0, 'C', true);
    $pdf->Cell(30, 4, 'Estado', 1, 0, 'C', true);
    $pdf->Ln();

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
