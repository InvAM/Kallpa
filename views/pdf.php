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
    $pdf->Image('public/Img/Kallpa1.png', 5, 5, 70);
    $pdf->Image('public/Img/Usuario.jpeg', 180, 8, 20);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Ln(25);
    $pdf->Cell(0, 10, utf8_decode('INFORMACIÓN DEL CONTRATO'), 0, 1, 'C');

    // Agregar los datos de la sesión al PDF
    // Agregar un salto de línea
    //$pdf->Ln();

    // Agregar una celda vacía (espacio vertical)
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'DNI del cliente: ' . $datosParaImprimir['DNI_cli']);
    $pdf->Ln();
    
    $pdf->Cell(40, 10, 'ID Contrato: ' . $datosParaImprimir['IDContrato']);
    $pdf->Ln();

    $pdf->Cell(40, 10, 'Fecha del Contrato: ' . $datosParaImprimir['Fecha_Con']);
    $pdf->Ln();

    $pdf->Cell(40, 10, utf8_decode( 'Número de radicando: ' . $datosParaImprimir['NumeroRadicado_Con']));
    $pdf->Ln();

    $pdf->Cell(40, 10, utf8_decode('Punto de instalación: ' . $datosParaImprimir['PuntoInstalacion_Con']));
    $pdf->Ln();

    $pdf->Cell(40, 10, utf8_decode( 'Número de Suministro: ' . $datosParaImprimir['numSum']));
    $pdf->Ln();

    $pdf->Cell(40, 10, 'Estado: ' . $datosParaImprimir['estado']);
    $pdf->Ln();

    $pdf->Cell(40, 10, 'ID Domicilio: ' . $datosParaImprimir['IDDomicilio']);
    $pdf->Ln();

    $pdf->Cell(40, 10, 'DNI empleado: ' . $datosParaImprimir['DNI_Em']);
    $pdf->Ln();

    $pdf->Cell(40, 10, 'ID Gabinete Categoria: ' . $datosParaImprimir['IDGabineteCategoria']);
    $pdf->Ln();
    
    $pdf->Cell(40, 10, utf8_decode('ID Tipo de Instalación: ' . $datosParaImprimir['IDTipoInst']));
    $pdf->Ln();   
    

    // Salida del PDF
    $pdf->Output();

    // Limpia la variable de sesión si es necesario
    unset($_SESSION['datosParaImprimir']);
} else {
    echo 'Error: No se encontraron datos en la sesión.';
}
?>
