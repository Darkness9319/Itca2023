<?php
session_start();
//setlocale(LC_ALL,"es_ES@euro","es_ES","esp");

include "genPlantillaPDF1.php";
require '../Modelo/dbconfig.php';

$mesAnf = date("m", time() - 18000);
if ($mesAnf == '10') {

    $resultadodia = $mesAnf - 1;
} else {


    $cadenafecha = $mesAnf - 1;

    $resultadodia = str_replace("0", "", $cadenafecha);
}

$anioAnf = date("Y", time() - 18000);

$sql2 = "SELECT codigo_cln, ROUND(SUM(valor_cuo),2) as 'Total' FROM tbl_cuotas where mes_cuo <= $resultadodia and anio_cuo <= $anioAnf and estado_cuo = 'I' group by codigo_cln ORDER BY `id_cuo` ASC; ";
$result2 = mysqli_query(getconexion(), $sql2);

	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
    $pdf->cabecerareporte();



	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'Codigo Socio',1,0,'C',1);
	$pdf->Cell(40,6,'Total de deuda',1,0,'C',1);

	
	$pdf->SetFont('Arial','',10);
    $pdf->Ln();
	
	while($row = $result2->fetch_assoc())
	{
		$pdf->Cell(70,6,utf8_decode($row['codigo_cln']),1,0,'C');
		$pdf->Cell(40,6,$row['Total'],1,1,'C');
	
	}

    $pdf->Output();
