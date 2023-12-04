<?php
require('fpdf/fpdf.php');
session_start();
if (isset($_SESSION['datosParaImprimir'])) {
    $datosParaImprimir = $_SESSION['datosParaImprimir'];

    // Acceder a la información de la tarjeta si está presente
    $cardData = isset($datosParaImprimir['cardData']) ? $datosParaImprimir['cardData'] : [];

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->Image('public/Img/Kallpa1.png', 5, 5, 70);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Ln(25);
    $pdf->Cell(0, 10, utf8_decode('Resumen de pago'), 0, 1, 'C');

    $producto = reset($datosParaImprimir);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'Nombre del producto: ' . $producto['nombre']);
    $pdf->Ln();

    $pdf->Cell(40, 10, 'Cuota :' . $producto['cuota']);
    $pdf->Ln();

    $pdf->Cell(40, 10, 'Precio anterior :' . $producto['precio1']);
    $pdf->Ln();

    $pdf->Cell(40, 10, utf8_decode('Precio a pagar: ' . $producto['precio2']));
    $pdf->Ln();

    // Utilizar la información de la tarjeta en el PDF si está presente
    if (!empty($cardData)) {
        $pdf->Ln();
        $pdf->Cell(0, 10, utf8_decode('Información de la tarjeta:'));
        $pdf->Ln();
        $pdf->Cell(40, 10, utf8_decode('Número de tarjeta: ') . $cardData['cardNumber']);
        $pdf->Ln();
        $pdf->Cell(40, 10, utf8_decode('Nombre en la tarjeta: ') . $cardData['cardName']);
        // ... Agregar más información de la tarjeta según sea necesario
    }

    $pdf->Ln();

    ob_clean();
    $pdf->Output();

    unset($_SESSION['datosParaImprimir']);
} else {
    echo 'Error: No se encontraron datos en la sesión.';
}
?>