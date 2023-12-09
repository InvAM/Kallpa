<?php
require('fpdf/fpdf.php');
session_start();

if (isset($_SESSION['datosParaImprimir'])) {
    $datosParaImprimir = $_SESSION['datosParaImprimir'];

    // Acceder a la información de la tarjeta si está presente
    $cardData = isset($datosParaImprimir['cardData']) ? $datosParaImprimir['cardData'] : [];

    $pdf = new FPDF();
    $pdf->AddPage();

    // Encabezado con imagen
    $pdf->Image('public/Img/pago_izquierda.png', 5, 10, 150);
    $pdf->Image('public/Img/pago_derecha.png', 160, 13, 40);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Ln(40);
    $pdf->Cell(0, 10, utf8_decode(        'FECHA DE EMISIÓN       :   ' . date('Y-m-d')), 0, 1);
    $pdf->Cell(0, 10, utf8_decode(        'CLIENTE                          :   ' . $cardData['cardName']), 0, 1);
    $pdf->Cell(0, 10, utf8_decode(        'DIRECCIÓN                     :   SAN MARTÍN DE PORRES LIMA, PERÚ ' ), 0, 1);

    // Variable para almacenar la suma de precios a pagar
    $totalPrecioPagar = 0;

    $pdf->Ln();
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.5);
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, utf8_decode('RESUMEN DE PAGO'), 0, 1, 'C');
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.5);
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());


    // Iterar sobre cada producto en el carrito
    foreach ($datosParaImprimir as $producto) {


        $pdf->SetFont('Arial', '', 12);

        // Verificar y agregar la celda solo si el valor no está en blanco
        if (!empty($producto['nombre'])) {
            $pdf->Cell(0, 10, utf8_decode('PRODUCTO                    :      ' . $producto['nombre']), 0, 1);
        }

        if (!empty($producto['cuota'])) {
            $pdf->Cell(0, 10, utf8_decode('CUOTA                            :    ....................................................................................................  ' . $producto['cuota']), 0, 1);
        }

        if (!empty($producto['precio1'])) {
            $pdf->Cell(0, 10, utf8_decode('PRECIO ANTERIOR       :    ....................................................................................................  ' . $producto['precio1']), 0, 1);
        }

        if (!empty($producto['precio2'])) {
            $pdf->Cell(0, 10, utf8_decode('PRECIO A PAGAR         :    ....................................................................................................  ' . $producto['precio2']), 0, 1);

            // Sumar al total
            $totalPrecioPagar += floatval($producto['precio2']);
        }
        $pdf->Ln(10);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetLineWidth(0.5);
        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
        // Espacio después de la línea divisoria/ Espacio entre productos
    }

    // Línea divisoria


    // Imprimir el total de precios a pagar
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, utf8_decode('Total a pagar           :                                                                                 $ ' . number_format($totalPrecioPagar, 2)), 0);
    $pdf->Ln(10);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(0.5);
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

    // Información de la tarjeta
    if (!empty($cardData)) {
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, utf8_decode('Información de la tarjeta:'), 'LTRB', 1, 'C');
    
        $pdf->SetFont('Arial', '', 14);
    
        if (!empty($cardData['cardNumber'])) {
            $pdf->Cell(0, 10, utf8_decode('Número de tarjeta         :                                                              ' . $cardData['cardNumber']), 'LTRB', 1);
        }
    
        if (!empty($cardData['cardName'])) {
            $pdf->Cell(0, 10, utf8_decode('Nombre en la tarjeta     :                                                                  ' . $cardData['cardName']), 'LTRB', 1);
        }
    }
    
    ob_clean();
    $pdf->Output();

    unset($_SESSION['datosParaImprimir']);
} else {
    echo 'Error: No se encontraron datos en la sesión.';
}
?>