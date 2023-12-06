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
    $pdf->SetFont('Arial', 'B', 12.8);
    $pdf->Ln(25);
    $pdf->Cell(0, 10, utf8_decode('CONTRATO DE SUMINISTRO DE GAS NATURAL PARA CONSUMIDORES REGULADOS'), 0, 1, 'C');

    // Agregar los datos de la sesión al PDF
    // Agregar un salto de línea
    $pdf->Ln(2);

    // Agregar una celda vacía (espacio vertical)
    $pdf->SetFont('Arial', '', 11);
    $text = utf8_decode('Conste por el presente documento, el Contrato de Suministro de gas natural que celebran las partes que se indican, por el cual la empresas concesionaria de distribución de gas natural (en adelante, Concesionario), se obliga a brindar al consumidor (en adelante, Consumidor Regulado o Consumidor) el suministro de gas natural en las condiciones y bajo las normas establecidad en el Reglamento de Distribución de Gas Natural por Red de Ductos, aprobado por Decreto Supremo N° 042-99-EM (en adelante, Tarifas al Usario Final, aprobadas por Resolución de Consejo Directivo N° 054-2016-OS/CD (en adelante, la Resolución de Consejo Directivo N° 054-2016-OS/CD) y en las demás desposiciones legales, modificatorias, complementarias y conexas que regulan la distribución de gas natural.');
    $pdf->MultiCell(0, 6, $text);
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 11); //el b es para negrita
    $pdf->Ln(1);
    $pdf->Cell(0, 10, utf8_decode('I. DESCRIPCIÓN GENERAL DEL CONTRATO:'), 0, 1);

    $pdf->Cell(0, 10, utf8_decode('N° de Radicando               '), 0);
    $pdf->SetX(58);
    $pdf->Cell(0, 10, utf8_decode('Fecha del Contrato'), 0);
    $pdf->SetX(105);
    $pdf->Cell(0, 10, utf8_decode('N° de Suministro'), 0);
    $pdf->SetX(152);
    $pdf->Cell(0, 10, utf8_decode('Servicios Contratados'), 0, 1);
    
    $pdf->SetFont('Arial', '', 11);
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $pdf->Cell(40, 10, $datosParaImprimir['NumeroRadicado_Con'], 1);
    
    $pdf->SetX(58);
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $pdf->Cell(40, 10, $datosParaImprimir['Fecha_Con'], 1);

    $pdf->SetX(105);
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $pdf->Cell(40, 10, $datosParaImprimir['numSum'], 1);

    $pdf->SetX(152);
    $cellWidth = 50;
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $pdf->Cell($cellWidth, 10, 'Gas Natural y Transporte', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', 'B', 11); //el b es para negrita
    $pdf->Ln(3);
    $pdf->Cell(0, 10, utf8_decode('Punto de Instalación'), 0);

    $pdf->SetX(70);
    $pdf->Cell(0, 10, utf8_decode('Gabinete Categoria'), 0);

    $pdf->Ln();
    $pdf->SetFont('Arial', '', 11);
    $cellWidth = 52;
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $pdf->Cell($cellWidth, 10, $datosParaImprimir['PuntoInstalacion_Con'],1);

    $pdf->SetX(70);
    $cellWidth = 132;
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $nombreCompleto = $datosParaImprimir['IDGabineteCategoria'] . ' - ' . $datosParaImprimir['Descripcion_Ga'];
    $pdf->Cell($cellWidth, 10, $nombreCompleto, 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', 'B', 11); //el b es para negrita
    $pdf->Ln(3);
    $pdf->Cell(0, 10, utf8_decode('Estado'), 0);

    $pdf->SetX(70);
    $pdf->Cell(0, 10, utf8_decode('Tipo de Instalación'), 0);

    $pdf->Ln();
    $pdf->SetFont('Arial', '', 11);
    $cellWidth = 52;
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $pdf->Cell($cellWidth, 10, $datosParaImprimir['estado'],1);

    $pdf->SetX(70);
    $cellWidth = 132;
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $nombreCompleto = $datosParaImprimir['IDTipoInst'] . ' - ' . $datosParaImprimir['Descripcion_TI'];
    $pdf->Cell($cellWidth, 10, $nombreCompleto, 1);
    $pdf->Ln();

    $pdf->Ln();

    $pdf->SetFont('Arial', 'B', 11); //el b es para negrita
    $pdf->Ln(3);
    $pdf->Cell(0, 10, utf8_decode('II. IDENTIFICACIÓN DE INTERVINIENTES'), 0, 1);
    $pdf->Ln(3);
    $pdf->Cell(0, 10, utf8_decode('II.1 DATOS DEL CONCESIONARIO'), 0, 1);

    $pdf->Cell(40, 10, utf8_decode('Empresa de Distribución de Gas Natural'));
    
    $pdf->SetX(89);
    $pdf->Cell(0, 10, utf8_decode('RUC'), 0);

    $pdf->SetX(125);
    $pdf->Cell(0, 10, utf8_decode('Dominio Legal'), 0);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 11);
    $cellWidth = 75;
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $pdf->Cell($cellWidth, 10, 'Gas Natural de Lima y Callao S.A.', 1);
    
    $pdf->SetX(90);
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $cellWidth = 30;
    $pdf->Cell($cellWidth, 10, '20503758114', 1);

    $pdf->SetX(125);
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $cellWidth = 77;
    $pdf->Cell($cellWidth, 10, 'Calle Morelli 150, distrito de San Borja, C.C.', 1);

    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 11); //el b es para negrita
    $pdf->Ln(3);
    $pdf->Cell(0, 10, utf8_decode('Representante Legal'), 0);

    $pdf->SetX(90);
    $pdf->Cell(0, 10, utf8_decode('DNI Empleado'), 0);

    $pdf->Ln();
    $pdf->SetFont('Arial', '', 11);
    $cellWidth = 75;
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $nombreCompleto = $datosParaImprimir['Nombre_Em'] . ' ' . $datosParaImprimir['Apellido_Em'];
    $pdf->Cell($cellWidth, 10, $nombreCompleto, 1);

    $pdf->SetX(90);
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $cellWidth = 30;
    $pdf->Cell($cellWidth, 10, $datosParaImprimir['DNI_Em'], 1);
    $pdf->Ln();
    $pdf->Ln(50);

    $pdf->SetFont('Arial', 'B', 11); //el b es para negrita
    $pdf->Ln(3);
    $pdf->Cell(0, 10, utf8_decode('II.2 DATOS DEL CONSUMIDOR'), 0, 1);
    $pdf->Cell(40, 10, utf8_decode('Nombre o Razón Social del Consumidor'));

    $pdf->SetX(140);
    $pdf->Cell(0, 10, utf8_decode('DNI Cliente'), 0);

    $pdf->Ln();
    $pdf->SetFont('Arial', '', 11);
    $cellWidth = 122;
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $nombreCompleto = $datosParaImprimir['Nombre_cli'] . ' ' . $datosParaImprimir['Apellido_cli'];
    $pdf->Cell($cellWidth, 10, $nombreCompleto, 1);

    $pdf->SetX(140);
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $cellWidth = 62;
    $pdf->Cell($cellWidth, 10, $datosParaImprimir['DNI_cli'], 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', 'B', 11); //el b es para negrita
    $pdf->Ln(5);
    $pdf->Cell(0, 10, utf8_decode('PERSONA NATURAL'), 0, 1);
    $pdf->Cell(40, 10, utf8_decode('Fecha de Nacimiento'));

    $pdf->SetX(111);
    $pdf->Cell(0, 10, utf8_decode('Teléfono Celular'), 0);

    $pdf->Ln();
    $pdf->SetFont('Arial', '', 11);
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $cellWidth = 91;
    $pdf->Cell($cellWidth, 10, $datosParaImprimir['FechaNacimiento_cli'], 1);


    $pdf->SetX(111);
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $cellWidth = 91;
    $pdf->Cell($cellWidth, 10, $datosParaImprimir['Celular_cli'], 1);
    $pdf->Ln();
    $pdf->Ln(1);

    $pdf->SetFont('Arial', 'B', 11); //el b es para negrita
    $pdf->Ln(3);
    $pdf->Cell(0, 10, utf8_decode('DATOS DOMICILIO'), 0, 1);
    $pdf->Cell(40, 10, utf8_decode('ID Domicilio'));
    $pdf->SetX(70);
    $pdf->Cell(0, 10, utf8_decode('Dirección Domicilio'), 0);

    $pdf->Ln();
    $pdf->SetFont('Arial', '', 11);
    $cellWidth = 52;
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $pdf->Cell($cellWidth, 10, $datosParaImprimir['IDDomicilio'],1);

    $pdf->SetX(70);
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $cellWidth = 132;
    $pdf->Cell($cellWidth, 10, $datosParaImprimir['Direccion_Dom'], 1);
    $pdf->Ln();
    
    $pdf->SetFont('Arial', 'B', 11); //el b es para negrita
    $pdf->Ln(3);
    $pdf->Cell(40, 10, utf8_decode('Interior'));
    $pdf->SetX(70);
    $pdf->Cell(0, 10, utf8_decode('Piso'), 0);
    $pdf->SetX(120);
    $pdf->Cell(0, 10, utf8_decode('Nombre de Malla'), 0);

    $pdf->Ln();
    $pdf->SetFont('Arial', '', 11);
    $cellWidth = 52;
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $pdf->Cell($cellWidth, 10, $datosParaImprimir['Interior_Dom'],1);

    $pdf->SetX(70);
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $cellWidth = 42;
    $pdf->Cell($cellWidth, 10, $datosParaImprimir['Piso_Dom'], 1);

    $pdf->SetX(120);
    $pdf->SetDrawColor(0, 0, 0); // Color negro
    $cellWidth = 82;
    $pdf->Cell($cellWidth, 10, $datosParaImprimir['Nomb_Malla_Dom'], 1);
    $pdf->Ln(70);

    $pdf->SetFont('Arial', 'B', 11); //el b es para negrita
    $pdf->SetX(21);
    $pdf->Cell(0, 10, utf8_decode('GAS NATURAL DE LIMA Y CALLAO S.A.'), 0);
    
    $pdf->Ln(1);
    $pdf->SetX(16);
    $pdf->Cell(0, 10, utf8_decode('_______________________________________'), 0);
    $pdf->SetX(111);
    $pdf->Cell(0, 10, utf8_decode('_______________________________________'), 0,1);
    $pdf->SetX(44);
    $pdf->Cell(0, 10, utf8_decode('El Concesionario'), 0);
    $pdf->SetX(118);
    $pdf->Cell(0, 10, utf8_decode('El Consumidor con DNI:  '. $datosParaImprimir['DNI_cli']), 0);
    

    // Salida del PDF
    $pdf->Output();

    // Limpia la variable de sesión si es necesario
    unset($_SESSION['datosParaImprimir']);
} else {
    echo 'Error: No se encontraron datos en la sesión.';
}
?>
