<?php
session_start();
//setlocale(LC_ALL,"es_ES@euro","es_ES","esp");

include "genPlantillaPDF1.php";
require '../Modelo/dbconfig.php';

//$idSp = '2';
$idSp = $_GET['id'];

//$sql2 = "SELECT * FROM tbl_cotizacion WHERE id_cot = '$idSp'";
//$sql2 = "SELECT *, DATE_FORMAT(fechaReg_cot,'%d  de %M  del %Y  ') as FCHA FROM tbl_cotizacion WHERE id_cot = '$idSp'";
$sql2 = "SELECT * FROM clientes WHERE codigo_cln = '$idSp'";
$result2 = mysqli_query(getconexion(), $sql2);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//Funciones
$pdf->cabeceraSolicitudAfiliac();




//Datos Tabla
while ($row2 = mysqli_fetch_assoc($result2)) {
    $fecha = $row2['fecha_registro'];


    // $apellidosSoc = $row2['apellidos_socn'];
    $nombresSoc = $row2['nombres_socn'];

    $cedrucSoc = $row2['cedularuc'];
    $codigoSoc = $row2['codigo_cln'];

    $valCuota = '13';

    $profesionSoc = $row2['profesion'];
    $direc1Soc = $row2['direccion'];
    $telef1Soc = $row2['celular'];
    $telef2Soc = $row2['convencional'];


    $emailSoc = $row2['correo_electronico'];
    $univerSoc = $row2['universidad'];

    $fechaNacSoc = $row2['fecha_nacimiento'];
    $actiPrinSoc = $row2['actividad_principal'];



    //$pdf->SetFont('Times','BI',10); 
    //$pdf->SetFont('Times','',10);      
    // $numCOT = $row2['num_cot'];

    // $op1 = $valorCt * 0.12;
    // $op2 = $valorCt + $op1;
    $fecha = date("Y-m-d", time() - 18000);

    function obtenerFechaEnLetra($fecha)
    {

        // asigno a la variable $num el número del dia de la fecha dada ejemplo: 17/06/2016 $num = 17 ver date en http://php.net/manual/es/function.date.php
        $num = date("j", strtotime($fecha));

        // asigno a la variable $anno el año de la fecha dada ejemplo: 17/06/2016 $anno = 2016 ver date en http://php.net/manual/es/function.date.php
        $anno = date("Y", strtotime($fecha));

        // asigno a la variable $mes una lista de los meses donde cada elemento de la lista concide con el numero del mes - 1
        $mes = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

        // redefino la variable $mes que es una lista con el número de mes que me devuelve la (date('m', strtotime($fecha)), lo multiplico x1 y le
        // resto -1 ejemplo : fecha-> 17/06/2016 (date('m', strtotime($fecha))-> m= 07*1 -> 7-1 = 6 -> $mes[6] = junio
        $mes = $mes[(date('m', strtotime($fecha)) * 1) - 1];

        // retorno todo los valores concatenados como quiero ejemplo: Viernes, 17 de junio del 2016
        return  $num . ' de ' . $mes . ' del ' . $anno;
    }
}

//Funcion para Signo de Dolar y 2 Decimales
function SetCurrency(float $valor, string $signo = '$'): string
{
    return $signo . number_format($valor, 2, '.', '');
}


$pdf->SetFont('Times', 'BI', 10);
$pdf->SetXY(145, 22);
$pdf->Cell(20, 5, utf8_decode('RUC: '), 0, 0);

// $pdf->SetXY(145, 15);
$pdf->SetFont('Times', '', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(155, 22);
$pdf->Cell(20, 5, $cedrucSoc, 0, 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times', '', 10);


$pdf->SetXY(15, 35);
$pdf->SetFont('Times', 'B', 10);
$pdf->MultiCell(180, 5, utf8_decode('FORMULARIO DE SOLICITUD DE AFILIACIONES CAMICON (PERSONAS NATURALES) '), 0, 'J');

$pdf->SetFont('Times', '', 10);
// '
//$pdf->Cell(1);
$pdf->SetXY(15, 50);
$pdf->Cell(50, 5, utf8_decode('Quito, ' . obtenerFechaEnLetra($fecha)), 0, 0);

$pdf->SetXY(145, 50);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(50, 5, utf8_decode('Codigo de afiliacion: '), 0, 0);
$pdf->SetXY(178, 50);
$pdf->SetFont('Times', 'IB', 10);
$pdf->SetTextColor(255, 0, 0);
$pdf->Cell(50, 5, utf8_decode($codigoSoc), 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->SetTextColor(0, 0, 0);
//$pdf->Cell(1);
$pdf->SetXY(15, 50);
$pdf->Cell(50, 5, utf8_decode('Quito, ' . obtenerFechaEnLetra($fecha)), 0, 0);

$pdf->SetXY(153, 55);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(27, 5, utf8_decode('Valor de cuota: '), 0, 0);
$pdf->SetXY(178, 55);
$pdf->SetTextColor(255, 0, 0);
$pdf->SetFont('Times', 'IB', 10);
$pdf->Cell(30, 5, utf8_decode('$13.00'), 0, 1);


$pdf->Ln();
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Times', '', 10);

$pdf->Ln();
$pdf->SetX(15);
$pdf->MultiCell(180, 5, utf8_decode('Señor
PRESIDENTE DE LA CÁMARA DE LA INDUSTRIA DE LA CONSTRUCCIÒN
Presente.-

Por medio de la presente me dirijo a usted con el propósito de solicitarle se tome en cuenta mi nombre en calidad de SOCIO de la Cámara de la industria de la Construcción -CAMICON- para lo cual adjunto mis datos personales, así como los documentos requeridos para este efecto:  

Apellidos y Nombres: ' . $nombresSoc . '

Cédula: ' . $cedrucSoc . '

Profesión: ' . $profesionSoc . '

Dirección: ' . $direc1Soc . '

Teléfonos: ' . $telef1Soc . ' / ' . $telef2Soc . '

E-mail: ' . $emailSoc . '

Universidad Donde Estudió: ' . $univerSoc . '

Fecha de Nacimiento: ' . obtenerFechaEnLetra($fechaNacSoc) . '

Actividad Principal del Solicitante: ' . $actiPrinSoc . '
	
Por su atención y tramite a mi pedido, anticipo mis sinceros agradecimientos.

'), 0, 'J');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetX(30);
$pdf->Cell(50, 5, '_________________________________', 0, 0);
$pdf->Cell(100, 5, '_________________________________', 0, 1, 'R');
$pdf->SetX(25);
$pdf->Cell(70, 5, 'Firma del Solicitante', 0, 0, 'C');
$pdf->Cell(110, 5, 'Dpto. Financiero', 0, 1, 'C');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetX(50);
$pdf->Cell(100, 5, utf8_decode('Juan Pablo Sanz e Iñaquito (593-2) 2432-369 / 2432-370 / info@camicon.ec'), 0, 1);
$pdf->SetX(90);
$pdf->Cell(100, 5, utf8_decode('Quito - Ecuador'), 0, 1);
$pdf->SetX(89);
$pdf->Cell(100, 5, utf8_decode('www.camicon.ec'), 0, 1);


$pdf->Output('', 'SolicitudAfiliciacion_#' . $idSp . '.pdf');
