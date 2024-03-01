<?php
require('../fpdf182/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../images/logo.png',10,8,33);
        // Título
        $this->SetFont('Arial','I',15);
        $this->Cell(0,10,'LA ESQUINA DEL SABOR',0,1,'C');
        // Línea de separación
        $this->Line(10, 42, 200, 42);
        $this->Ln(10); // Espacio después del título
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);

        // Número de página
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        // Nombre de la empresa
        $this->Ln(5); // Espacio antes del nombre
        $this->SetFont('Arial','',10);
        $this->Cell(0,10,'LA ESQUINA DEL SABOR',0,0,'C');
    }
    // Tabla coloreada
    function FancyReservaTable($header, $data)
    {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        
        // Cabecera
        $w = array(30, 30, 30, 30, 50, 40); // Widths of the columns
        for($i=0; $i<count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();

        // Restauración de colores y fuentes
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');

        // Datos
        $fill = false;
        foreach($data as $row)
        {
            $this->Cell($w[0], 6, $row['IDReserva'], 'LR', 0, 'L', $fill); // ID Reserva
            $this->Cell($w[1], 6, $row['FechaReserva'], 'LR', 0, 'L', $fill); // Fecha
            $this->Cell($w[2], 6, $row['HoraReserva'], 'LR', 0, 'L', $fill); // Hora
            $this->Cell($w[3], 6, $row['Tipo'], 'LR', 0, 'L', $fill); // Tipo
            $this->Cell($w[4], 6, $row['NombreCliente'], 'LR', 0, 'L', $fill); // Cliente
            $this->Cell($w[5], 6, number_format($row['TotalCobrar']), 'LR', 0, 'R', $fill); // TotalCobrar
            $this->Ln();
            $fill = !$fill;
        }

        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}
?>
