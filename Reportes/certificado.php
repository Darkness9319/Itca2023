<?php
session_start();
//setlocale(LC_ALL,"es_ES@euro","es_ES","esp");

include "genPlantillaPDF1.php";
require '../Modelo/dbconfig.php';


$idSp = $_GET['id'];

$sql2 = "SELECT * FROM clientes WHERE codigo_cln = '$idSp'";
$result2 = mysqli_query(getconexion(), $sql2);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//Funciones

$pdf->cabeceraCertificado();


$fechaAnf = date("Y-m-d", time() - 18000);
//Datos Tabla
while ($row2 = mysqli_fetch_assoc($result2)) {
    $fecha = $row2['fecha_registro'];


    //$apellidosSoc = $row2['apellidos_socn'];
    $nombresSoc = $row2['nombres_socn'];
    $cedrucSoc = $row2['cedularuc'];
    $codigoSoc = $row2['codigo_cln'];
    $cuent_numtar = $row2['cuent_numtar'];
    $numCuenta = $row2['num_cad'];
    $cuota = $row2['cuota'];
    $fechaR = $row2['fecha_registro'];
    $rz = $row2['razon_social'];
    $fechaconst = $row2['fecha_const'];
    $cedularuc = $row2['cedularuc'];
    $capital = $row2['capital'];
    $celular = $row2['celular'];
    $convencional = $row2['convencional'];
    $nacionalidad = $row2['nacionalidad'];
    $profesion = $row2['profesion'];
    $correo = $row2['correo_electronico'];
    $direccion = $row2['direccion'];
    $correspondencia = $row2['direccion_correspondencia'];
    $universidad = $row2['universidad'];
    $fechanaci = $row2['fecha_nacimiento'];
    $actividad = $row2['actividad_principal'];
    $tipopago = $row2['tipo_pago'];
    $bantar = $row2['ban_tar'];
    $num_cad = $row2['num_cad'];
    $estados = $row2['estados'];
    $condonacion = $row2['condonacion'];
    $fechadesa = $row2['fecha_desafiliacion'];
    $fechacarta = $row2['fecha_carta_desafiliacion'];
    $tipocli = $row2['tipocli_cli'];
    $reprel = $row2['repre_legal'];
    $cedulal = $row2['cedula_legal'];
    $celul = $row2['celular_legal'];
    $cmbtpid = $row2['tpdocumento'];
    $txtnumerodoc = $row2['numdoc'];
    $txttitular = $row2['titular'];
    $fecha_registro  = $row2['fecha_registro'];


    if ($nombresSoc == '-') {

        $nomb = $rz;
    } else {
        $nomb = $nombresSoc;
    }
    //$pdf->SetFont('Times','BI',10); 
    //$pdf->SetFont('Times','',10);      
    // $numCOT = $row2['num_cot'];

    // $op1 = $valorCt * 0.12;
    // $op2 = $valorCt + $op1;


    // if ($profesion == 'Otros') {

    //     $var =  'SI';
    // } else {

    //     $var = 'NO';
    // }

    // function obtenerFechaEnLetra($fecha)
    // {

    //     // asigno a la variable $num el número del dia de la fecha dada ejemplo: 17/06/2016 $num = 17 ver date en http://php.net/manual/es/function.date.php
    //     $num = date("j", strtotime($fecha));

    //     // asigno a la variable $anno el año de la fecha dada ejemplo: 17/06/2016 $anno = 2016 ver date en http://php.net/manual/es/function.date.php
    //     $anno = date("Y", strtotime($fecha));

    //     // asigno a la variable $mes una lista de los meses donde cada elemento de la lista concide con el numero del mes - 1
    //     $mes = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

    //     // redefino la variable $mes que es una lista con el número de mes que me devuelve la (date('m', strtotime($fecha)), lo multiplico x1 y le
    //     // resto -1 ejemplo : fecha-> 17/06/2016 (date('m', strtotime($fecha))-> m= 07*1 -> 7-1 = 6 -> $mes[6] = junio
    //     $mes = $mes[(date('m', strtotime($fecha)) * 1)];

    //     // retorno todo los valores concatenados como quiero ejemplo: Viernes, 17 de junio del 2016
    //     return  $num . ' de ' . $mes . ' del ' . $anno;
    // }


    function fechaEs($fechaAnf)
    {
        $fecha = substr($fechaAnf, 0, 10);
        $numeroDia = date('d', strtotime($fechaAnf));
        $dia = date('l', strtotime($fechaAnf));
        $mes = date('F', strtotime($fechaAnf));
        $anio = date('Y', strtotime($fechaAnf));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return  $numeroDia . " de " . $nombreMes . " de " . $anio;
    }
}


//Funcion para Signo de Dolar y 2 Decimales
function SetCurrency(float $valor, string $signo = '$'): string
{
    return $signo . number_format($valor, 2, '.', '');
}



$pdf->SetFont('Times', '', 10);
$pdf->SetXY(15, 40);
$pdf->Cell(50, 5, utf8_decode('Quito, ' . fechaEs($fechaAnf)), 0, 1);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->SetX(15);
// $pdf->Cell(75, 5, utf8_decode('Para los fines legales consiguientes, Certifico que: '), 1, 0);
// $pdf->SetFont('Times', 'IB', 10);
// $pdf->Cell(80, 5, utf8_decode($nombresSoc), 1, 1);
// $pdf->SetFont('Times', '', 10);
// $pdf->SetX(15);
// $pdf->Cell(75, 5, utf8_decode('con No. de Documento: '), 1, 1);





if ($profesion == ' ') {
    $var = 'Sr./Sra. ' . $nomb;
} else {

    $var = $profesion . ' ' . $nomb;
}

$pdf->MultiCell(180, 7, utf8_decode('Para los fines legales consiguientes, Certifico que: ' . $var  . ' con No. de Documento:' . $cedularuc . ' es afiliado a la Cámara de la Industria de la Construcción desde el ' . fechaEs($fecha_registro) . ' con el número de registro: ' . $codigoSoc . '. En cumplimiento de lo que dispone la Ley de Cámaras de la Construcción.

Bajo el amparo de las prescripciones establecidas en la ley de Cámaras de la Construcción y demás leyes pertinentes el socio ' . $var . ' se encuentra legalmente calificado para el desarrollo de su profesión.

Es todo cuanto puedo aseverar en virtud de la información presentada, en honor a la verdad, y de acuerdo a las competencias que los Estatutos de la Cámara de la Industria de la Construcción me confiere.

El '  . $var . ' podrá hacer uso de este certificado como a bien tuviere, mas este refrendo, no constituye ningún tipo de aval por la cual la Cámara de la Industria de la Construcción llegue a asumir de pasado, presente o futuro cualquier responsabilidad civil del socio, en el desarrollo de su actividad profesional o contractual.

Así consta en nuestros archivos, a los que me refiero en caso necesario. '), 0, 'J');

$pdf->Ln();
$pdf->SetX(15);
$pdf->SetFont('Times', 'IB', 10);
$pdf->Cell(80, 5, utf8_decode('Atentamente: '), 0, 1);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetX(15);
$pdf->SetFont('Times', 'IB', 10);
$pdf->Cell(80, 5, utf8_decode('______________________________'), 0, 1);
$pdf->SetX(15);
$pdf->Cell(80, 5, utf8_decode('Ing. Leopoldo Ocampo'), 0, 1);
$pdf->SetX(15);
$pdf->Cell(80, 5, utf8_decode('Presidente'), 0, 1);
$pdf->SetX(15);
$pdf->Cell(80, 5, utf8_decode('C.C.'), 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Ln();
$pdf->Ln();
$pdf->SetX(15);
$pdf->Cell(150, 5, utf8_decode('Valido por  60 Días'), 0, 0);
$pdf->Cell(10, 5, utf8_decode('Valor: '), 0, 0);
$pdf->SetFont('Times', 'IB', 10);

if ($tipocli == 'N') {

    $pdf->Cell(80, 5, utf8_decode('$2.50'), 0, 1);
} else {
    $pdf->Cell(80, 5, utf8_decode('$5.00'), 0, 1);
}
$pdf->Ln();
$pdf->SetFont('Times', '', 10);
$pdf->SetX(15);
$pdf->Cell(80, 5, utf8_decode('De la misma manera, esta certificación no es válida para la aplicación de lo expuesto en el Artículo Segundo, de la Resolución'), 0, 1);
$pdf->SetX(15);

$pdf->Cell(80, 5, utf8_decode('de la Junta Monetaria No. 010.82, para el uso de la Línea de Redescuento de la Construcción.'), 0, 1);
$pdf->Output('', 'FormularioCompromiso_#' . $idSp . '.pdf');
