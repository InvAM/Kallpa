<?php

require('fpdf/fpdf.php');

// Inicia o reanuda una sesión
session_start();

// Accede a los datos almacenados en la sesión
if (isset($_SESSION['datosParaImprimir'])) {
    $datosParaImprimir = $_SESSION['datosParaImprimir'];

    // Crear un nuevo PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);

    // Agregar los datos de la sesión al PDF
    $pdf->Cell(40, 10, 'SE LOGRO CARLITOS :DDDDDDDDDDDDDDDDD');
    // Agregar un salto de línea
    $pdf->Ln();

    // Agregar una celda vacía (espacio vertical)
    $pdf->Cell(40, 10, '');
    
    $pdf->Cell(40, 10, 'ID Contrato: ' . $datosParaImprimir['IDContrato']);
    $pdf->Ln();

    // Agregar una celda vacía (espacio vertical)
    $pdf->Cell(40, 10, '');
    
    
    $pdf->Cell(40, 10, 'Fecha Contrato: ' . $datosParaImprimir['Fecha_Con']);

    // Más celdas según sea necesario...

    // Salida del PDF
    $pdf->Output();

    // Limpia la variable de sesión si es necesario
    unset($_SESSION['datosParaImprimir']);
} else {
    echo 'Error: No se encontraron datos en la sesión.';
}
?>
