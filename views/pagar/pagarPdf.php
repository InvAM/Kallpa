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
    $pdf->Image('public/Img/Kallpa1.png', 5, 5, 70);

    // Título centrado
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Ln(25);
    $pdf->Cell(0, 10, utf8_decode('Resumen de pago'), 0, 1, 'C');

    // Variable para almacenar la suma de precios a pagar
    $totalPrecioPagar = 0;

    // Iterar sobre cada producto en el carrito
    foreach ($datosParaImprimir as $producto) {
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);

        // Verificar y agregar la celda solo si el valor no está en blanco
        if (!empty($producto['nombre'])) {
            $pdf->Cell(0, 10, utf8_decode('Producto: ' . $producto['nombre']), 0, 1);
        }

        if (!empty($producto['cuota'])) {
            $pdf->Cell(0, 10, utf8_decode('Cuota:........................................................................................................................................... ' . $producto['cuota']), 0, 1);
        }

        if (!empty($producto['precio1'])) {
            $pdf->Cell(0, 10, utf8_decode('Precio anterior:..................................................................................................................................' . $producto['precio1']), 0, 1);
        }

        if (!empty($producto['precio2'])) {
            $pdf->Cell(0, 10, utf8_decode('Precio a pagar:............................................................................................................................ ' . $producto['precio2']), 0, 1);

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
    $pdf->Cell(0, 10, utf8_decode('Total a pagar: $' . number_format($totalPrecioPagar, 2)), 0, 1);

    // Información de la tarjeta
    if (!empty($cardData)) {
        $pdf->Ln();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, utf8_decode('Información de la tarjeta:'), 0, 1);

        if (!empty($cardData['cardNumber'])) {
            $pdf->Cell(0, 10, utf8_decode('Número de tarjeta: ' . $cardData['cardNumber']), 0, 1);
        }

        if (!empty($cardData['cardName'])) {
            $pdf->Cell(0, 10, utf8_decode('Nombre en la tarjeta: ' . $cardData['cardName']), 0, 1);
        }

    }

    ob_clean();
    $pdf->Output();

    unset($_SESSION['datosParaImprimir']);
} else {
    echo 'Error: No se encontraron datos en la sesión.';
}
?>