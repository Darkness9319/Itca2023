<?php

require('../Fpdf/fpdf.php');
include('../Modelo/dbconfig.php');

$pdf = new FPDF();
$pdf->AddPage();


$idped = $_GET['id'];
$sql2 = "SELECT * FROM pedido WHERE id_ped = '$idped'";
$result2 = mysqli_query(getconexion(), $sql2);

while ($row = mysqli_fetch_assoc($result2)) {


    $secped = $row['secped'];
    $secuenciac = $row['secuenciac'];
    $fecha = $row['fecha'];
    $canal = $row['canal'];
    $nometiqueta = $row['nometiqueta'];
    $ancho = $row['ancho'];
    $largod = $row['largod'];
    $calidad = $row['calidad'];
    $corte = $row['corte'];
    $aplicacoin = $row['aplicacoin'];
    $muestra = $row['muestra'];
    $urdimbre = $row['urdimbre'];
    $forma = $row['forma'];
    $acabado = $row['acabado'];
    $colors = $row['colors'];
    $imagensb = $row['imagensb'];
    $imgextension = $row['imgextension'];
    $disenio = $row['disenio'];
    $diextension = $row['diextension'];
    $colores = $row['colores'];
    $ob = $row['ob'];
    $cantidad = $row['cantidad'];
    $fimpresion = $row['fimpresion'];
}

if ($fimpresion == "0000-00-00") {

    $fechaAnf = date("Y-m-d", time() - 18000);

    $sql = "UPDATE pedido set fimpresion = '$fechaAnf' WHERE id_ped = '$idped'";
    $res =  mysqli_query(getconexion(), $sql);

    // echo $sql;
}





$pdf->SetFillColor(192);
$pdf->RoundedRect(8, 10, 195, 25, 5, '13');
$pdf->Image('logosinfondo.png', 10, 15, 55, 15);

$pdf->RoundedRect(143, 25, 60, 10, 5, '13', 13);

$pdf->SetFont('Times', 'BI', 10);
$pdf->SetXY(155, 28);
$pdf->Cell(25, 5, utf8_decode('Nota de Pedido: '), 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->SetXY(180, 28);
$pdf->SetTextColor(252, 10, 6);
$pdf->Cell(20, 5, $secuenciac, 0, 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times', '', 10);



$pdf->SetFont('Times', '', 10);
$pdf->SetTextColor(253, 253, 253);
$pdf->SetXY(40, 40);
$fill_color = array(78, 79, 84);  // Relleno rojo (RGB)
$pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
$pdf->Rect(15, 41, 182, 5, true);
$pdf->SetFillColor(255, 255, 255);






$pdf->Cell(180, 8, 'Quito, calle E7 N67-38 y de los Aceitunos. Telefax: 02 247 4821 / 02 604 4580 (581 - 582)', 0, 1);


$pdf->SetFont('Times', 'B', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(15, 50);
$pdf->Rect(15, 41, 182, 5);
$pdf->Cell(15, 6, 'Cliente: ', 1, 0);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(90, 6, $canal, 1, 0);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(15, 6, 'Fecha: ', 1, 0);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(30, 6, $fecha, 1, 0);
$pdf->SetXY(15, 57);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(35, 6, 'Nombre de etiqueta: ', 1, 0);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(50, 6, $nometiqueta, 1, 0);


// cuadros



if ($calidad == 'DAMASCO') {


    $pdf->SetXY(15, 65);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Calidad'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Damasco'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Tafeta'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(' '), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Mixta'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');
} else if ($calidad == 'TAFETA') {

    $pdf->SetXY(15, 65);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Calidad'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Damasco'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Tafeta'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Mixta'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');
} else if ($calidad == 'MIXTA') {

    $pdf->SetXY(15, 65);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Calidad'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Damasco'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Tafeta'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Mixta'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');
}



$pdf->SetXY(15, 88);
$pdf->SetX(15);
$pdf->SetTextColor(253, 253, 253);
$fill_color = array(78, 79, 84);  // Relleno  (RGB)
$pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
$pdf->Cell(40, 5, utf8_decode('Medidas M.M'), 1, 1, 'C', true);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);



$pdf->SetX(15);
$pdf->Cell(30, 5, utf8_decode('Ancho'), 1, 0, 'L');
$pdf->Cell(10, 5, utf8_decode($ancho), 1, 1, 'C');

$pdf->SetX(15);
$pdf->Cell(30, 5, utf8_decode('Largo Diseño'), 1, 0, 'L');
$pdf->Cell(10, 5, utf8_decode($largod), 1, 1, 'C');



if ($urdimbre == 'BLANCO') {

    $pdf->SetXY(15, 106);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Urdimbre'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);


    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('BLANCO'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('NEGRO'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');
} else if ($urdimbre == 'NEGRO') {

    $pdf->SetXY(15, 106);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Urdimbre'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);


    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('BLANCO'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('NEGRO'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');
}



if ($corte == 'NORMAL') {

    $pdf->SetXY(15, 125);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de corte'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);


    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Cuchilla'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Rollo'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');
} else if ($corte == 'CUCHILLA') {

    $pdf->SetXY(15, 125);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de corte'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Cuchilla'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Rollo'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');
} else if ($corte == 'BANDERA') {

    $pdf->SetXY(15, 125);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de corte'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Cuchilla'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Rollo'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');
} else if ($corte == 'TRAPECIO') {

    $pdf->SetXY(15, 125);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de corte'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Cuchilla'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Rollo'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');
} else if ($corte == 'ROLLO') {

    $pdf->SetXY(15, 125);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de corte'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Cuchilla'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(30, 5, utf8_decode('Rollo'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');
}



if ($aplicacoin == 'RELOJERA') {

    $pdf->SetXY(15, 160);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de Aplicacion'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Relojera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode('X'), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cocotera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Pretina'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Garra'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Comp.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Instruct.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Manilla'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Collarin'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cinta Bor'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');
    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Parche'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($aplicacoin == 'COCOTERA') {
    $pdf->SetXY(15, 160);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de Aplicacion'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Relojera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cocotera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Pretina'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Garra'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Comp.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Instruct.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Manilla'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Collarin'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cinta Bor'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');
    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Parche'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($aplicacoin == 'PRETINA') {
    $pdf->SetXY(15, 160);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de Aplicacion'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Relojera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cocotera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Pretina'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode('X'), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Garra'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Comp.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Instruct.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Manilla'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Collarin'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cinta Bor'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Parche'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($aplicacoin == 'BANDERA') {
    $pdf->SetXY(15, 160);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de Aplicacion'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Relojera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cocotera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Pretina'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Garra'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Comp.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Instruct.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Manilla'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Collarin'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cinta Bor'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Parche'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($aplicacoin == 'GARRA') {
    $pdf->SetXY(15, 160);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de Aplicacion'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Relojera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cocotera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Pretina'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Garra'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode('X'), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Comp.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Instruct.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Manilla'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Collarin'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cinta Bor'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Parche'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($aplicacoin == 'COMP.') {
    $pdf->SetXY(15, 160);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de Aplicacion'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Relojera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cocotera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Pretina'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Garra'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Comp.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Instruct.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Manilla'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Collarin'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cinta Bor'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Parche'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($aplicacoin == 'INSTRUCT.') {
    $pdf->SetXY(15, 160);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de Aplicacion'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Relojera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cocotera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Pretina'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Garra'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Comp.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Instruct.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode('X'), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Manilla'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Collarin'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cinta Bor'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Parche'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($aplicacoin == 'MANILLA') {
    $pdf->SetXY(15, 160);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de Aplicacion'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Relojera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cocotera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Pretina'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Garra'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Comp.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Instruct.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Manilla'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Collarin'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cinta Bor'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Parche'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($aplicacoin == 'COLLARIN') {
    $pdf->SetXY(15, 160);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de Aplicacion'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Relojera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cocotera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Pretina'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Garra'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Comp.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Instruct.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Manilla'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Collarin'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode('X'), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cinta Bor'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Parche'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($aplicacoin == 'CINTA BOR') {
    $pdf->SetXY(15, 160);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de Aplicacion'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Relojera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cocotera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Pretina'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Garra'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Comp.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Instruct.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Manilla'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Collarin'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cinta Bor'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Parche'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($aplicacoin == 'TRAPECIO') {
    $pdf->SetXY(15, 160);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de Aplicacion'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Relojera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cocotera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Pretina'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Garra'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Comp.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Instruct.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Manilla'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Collarin'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cinta Bor'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode('X'), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Parche'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($aplicacoin == 'NORMAL') {
    $pdf->SetXY(15, 160);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de Aplicacion'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Relojera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cocotera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Pretina'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Garra'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Comp.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Instruct.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Manilla'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Collarin'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cinta Bor'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Parche'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($aplicacoin == 'PARCHE') {
    $pdf->SetXY(15, 160);
    $pdf->SetX(15);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Tipo de Aplicacion'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Relojera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cocotera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Pretina'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Bandera'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Garra'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Comp.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Instruct.'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Manilla'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Collarin'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Cinta Bor'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(15);
    $pdf->Cell(15, 5, utf8_decode('Trapecio'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(''), 1, 0, 'C');
    $pdf->Cell(15, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' '), 1, 1, 'C');

    $pdf->Cell(15, 5, utf8_decode('Parche'), 1, 0, 'L');
    $pdf->Cell(5, 5, utf8_decode(' X'), 1, 1, 'C');
}




if ($muestra == 'Si') {

    $pdf->SetXY(15, 65);
    $pdf->SetX(155);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Muestra Fisica'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('SI'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('NO'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($muestra == 'No') {

    $pdf->SetXY(15, 65);
    $pdf->SetX(155);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Muestra Fisica'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('SI'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('NO'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');
}



if ($forma == 'HORIZONTAL') {

    $pdf->SetXY(15, 85);
    $pdf->SetX(155);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Forma'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Horizontal'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Vertical'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($forma == 'VERTICAL') {

    $pdf->SetXY(15, 85);
    $pdf->SetX(155);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Forma'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Horizontal'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Vertical'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');
}



if ($acabado == 'SIN APRESTO') {

    $pdf->SetXY(15, 105);
    $pdf->SetX(155);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Acabado Apresto'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Sin Apresto'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(' '), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Medio'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(' '), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Fuerte'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($acabado == 'NORMAL') {

    $pdf->SetXY(15, 105);
    $pdf->SetX(155);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Acabado Apresto'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Sin Apresto'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Medio'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(' '), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Fuerte'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($acabado == 'MEDIO') {
    $pdf->SetXY(15, 105);
    $pdf->SetX(155);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Acabado Apresto'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Sin Apresto'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(' '), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Medio'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Fuerte'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(' '), 1, 1, 'C');
} else if ($acabado == 'FUERTE') {

    $pdf->SetXY(15, 105);
    $pdf->SetX(155);
    $pdf->SetTextColor(253, 253, 253);
    $fill_color = array(78, 79, 84);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(40, 5, utf8_decode('Acabado Apresto'), 1, 1, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Sin Apresto'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(''), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Normal'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(' '), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Medio'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode(' '), 1, 1, 'C');

    $pdf->SetX(155);
    $pdf->Cell(30, 5, utf8_decode('Fuerte'), 1, 0, 'L');
    $pdf->Cell(10, 5, utf8_decode('X'), 1, 1, 'C');
}



$pdf->SetXY(15, 135);
$pdf->SetX(155);
$pdf->SetTextColor(253, 253, 253);
$fill_color = array(78, 79, 84);  // Relleno  (RGB)
$pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
$pdf->Cell(40, 5, utf8_decode('Numeros de colores'), 1, 1, 'C', true);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

$pdf->SetX(155);
$pdf->Cell(40, 5, utf8_decode($colors), 1, 0, 'C');


$pdf->SetXY(15, 150);
$pdf->SetX(155);
$pdf->SetTextColor(253, 253, 253);
$fill_color = array(78, 79, 84);  // Relleno  (RGB)
$pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
$pdf->Cell(40, 5, utf8_decode('Colores'), 1, 1, 'C', true);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);



$arraycolores = explode(",", $colores);


for ($i = 0; $i < count($arraycolores); $i++) {

    $sql2 = "SELECT * FROM colores WHERE nombre = '$arraycolores[$i]'";
    $result2 = mysqli_query(getconexion(), $sql2);

    while ($row = mysqli_fetch_assoc($result2)) {
        $hexadecimal = $row['hexadecimal'];
    }


    $red = hexdec(substr($hexadecimal, 1, 2));
    $green = hexdec(substr($hexadecimal, 3, 2));
    $blue = hexdec(substr($hexadecimal, 5, 2));

    $pdf->SetX(155);
    $pdf->SetTextColor($red, $green, $blue);
    $fill_color = array($red, $green, $blue);  // Relleno  (RGB)
    $pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
    $pdf->Cell(20, 5, utf8_decode($hexadecimal), 1, 0, 'C', true);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetX(175);
    $pdf->Cell(20, 5, utf8_decode($arraycolores[$i]), 1, 1, 'C');
}






$pdf->SetXY(15, 202);
$pdf->SetX(15);
$pdf->SetTextColor(253, 253, 253);
$fill_color = array(78, 79, 84);  // Relleno  (RGB)
$pdf->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
$pdf->Cell(180, 5, utf8_decode('Observaciones'), 1, 1, 'C', true);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

$pdf->SetX(15);
$pdf->Cell(180, 15, utf8_decode($ob), 1, 0, 'L');



$pdf->Image('../Pedido/' . $imagensb, 75, 120, 55, 15);


$pdf->SetXY(70, 250);
$pdf->SetX(20);
$pdf->SetFont('Arial', '', 7);

// Definir el ancho y alto de la celda
$width = 180;
$height = 5;

// Texto a insertar en la celda


$pdf->MultiCell($width, $height, 'ESTE CONTRATO CONSTITUYE UNA ORDEN DE PRODUCCION, POR LO QUE EL CLIENTE SE COMPROMETE A CANCELAR EL VALOR DE LA FACTURA GENERADA POR ESTE CONTRATO EN EL PLAZO PREESTABLECIDO.
EL COMPRADOR DECLARA ESTAR LEGALMENTE AUTORIZADO PARA UTILIZAR LA MARCA QUE TIENE EN ESTE PEDIDO Y EXIME AL FABRICANTE DE TODA RESPONSABILIDAD SOBRE REGISTROS DE MARCAS LAS CANTIDAD DESPACHADAS PUEDEN VARIAR EN MAS O MENOS 10% EL ANCHO Y EL LARGO FINAL DE LA MARQUILLA POR SER UN PROCESO TEXTIL PUEDE VARIAR EN MAS O MENOS 5 MM ', 0, 'J');











$pdf->Output();
