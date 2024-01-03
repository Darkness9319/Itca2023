<?php

include "genPlantillaPDF1.php";
include('../Modelo/dbconfig.php');


$pdf = new PDF();
$pdf->AliasNbPages(); // Establece el alias para el número total de páginas
$pdf->AddPage('L');



// $pdf->Content();


$idrol = $_GET['idrol'];
$sql2 = "SELECT * FROM horasxprocentaje WHERE codrol = '$idrol' group by empleado order by empleado ASC ";
$result2 = mysqli_query(getconexion(), $sql2);



$pdf->SetY(51);
while ($row = mysqli_fetch_assoc($result2)) {

    $empleado = $row['empleado'];
    $centro_costo = $row['centro_costo'];


    // $pdf->SetX(5);
    // $pdf->SetFont('Times', 'B', 10);
    // $pdf->Cell(20, 8, 'Empleado', 1, 0);

    $pdf->SetX(5);
    $pdf->SetFont('Times', '', 7);
    $pdf->Cell(55, 8, utf8_decode($empleado), 1, 0);


    $sqlc1 = "SELECT * FROM horasxprocentaje WHERE codrol = '$idrol' and centro_costo = 'ADMINISTRATIVO' and empleado = '$empleado'; ";
    $resultc1 = mysqli_query(getconexion(), $sqlc1);
    foreach ($resultc1 as $rowc1) :

        $horac1 = $rowc1['hora'];
        $porcentajec1 = $rowc1['porcentaje'];

    endforeach;

    $pdf->SetX(60);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $horac1, 1, 0, 'C');

    $pdf->SetX(69);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $porcentajec1, 1, 0, 'C');



    $sqlc1 = "SELECT * FROM horasxprocentaje WHERE codrol = '$idrol' and centro_costo = 'CALIDAD' and empleado = '$empleado'; ";
    $resultc1 = mysqli_query(getconexion(), $sqlc1);
    foreach ($resultc1 as $rowc1) :

        $horac1 = $rowc1['hora'];
        $porcentajec1 = $rowc1['porcentaje'];

    endforeach;

    $pdf->SetX(78);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $horac1, 1, 0, 'C');

    $pdf->SetX(87);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $porcentajec1, 1, 0, 'C');




    $sqlc1 = "SELECT * FROM horasxprocentaje WHERE codrol = '$idrol' and centro_costo = 'COSESE' and empleado = '$empleado'; ";
    $resultc1 = mysqli_query(getconexion(), $sqlc1);
    foreach ($resultc1 as $rowc1) :

        $horac1 = $rowc1['hora'];
        $porcentajec1 = $rowc1['porcentaje'];

    endforeach;

    $pdf->SetX(96);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $horac1, 1, 0, 'C');

    $pdf->SetX(105);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $porcentajec1, 1, 0, 'C');




    $sqlc1 = "SELECT * FROM horasxprocentaje WHERE codrol = '$idrol' and centro_costo = 'DISTANCIA' and empleado = '$empleado'; ";
    $resultc1 = mysqli_query(getconexion(), $sqlc1);
    foreach ($resultc1 as $rowc1) :

        $horac1 = $rowc1['hora'];
        $porcentajec1 = $rowc1['porcentaje'];

    endforeach;

    $pdf->SetX(114);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $horac1, 1, 0, 'C');

    $pdf->SetX(123);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $porcentajec1, 1, 0, 'C');



    $sqlc1 = "SELECT * FROM horasxprocentaje WHERE codrol = '$idrol' and centro_costo = 'EDUCACION' and empleado = '$empleado'; ";
    $resultc1 = mysqli_query(getconexion(), $sqlc1);
    foreach ($resultc1 as $rowc1) :

        $horac1 = $rowc1['hora'];
        $porcentajec1 = $rowc1['porcentaje'];

    endforeach;

    $pdf->SetX(132);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $horac1, 1, 0, 'C');

    $pdf->SetX(141);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $porcentajec1, 1, 0, 'C');



    $sqlc1 = "SELECT * FROM horasxprocentaje WHERE codrol = '$idrol' and centro_costo = 'INVESTIGACION' and empleado = '$empleado'; ";
    $resultc1 = mysqli_query(getconexion(), $sqlc1);
    foreach ($resultc1 as $rowc1) :

        $horac1 = $rowc1['hora'];
        $porcentajec1 = $rowc1['porcentaje'];

    endforeach;

    $pdf->SetX(150);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $horac1, 1, 0, 'C');

    $pdf->SetX(159);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $porcentajec1, 1, 0, 'C');


    $sqlc1 = "SELECT * FROM horasxprocentaje WHERE codrol = '$idrol' and centro_costo = 'POSGRADOS' and empleado = '$empleado'; ";
    $resultc1 = mysqli_query(getconexion(), $sqlc1);
    foreach ($resultc1 as $rowc1) :

        $horac1 = $rowc1['hora'];
        $porcentajec1 = $rowc1['porcentaje'];

    endforeach;

    $pdf->SetX(168);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $horac1, 1, 0, 'C');

    $pdf->SetX(177);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $porcentajec1, 1, 0, 'C');


    $sqlc1 = "SELECT * FROM horasxprocentaje WHERE codrol = '$idrol' and centro_costo = 'SALUD' and empleado = '$empleado'; ";
    $resultc1 = mysqli_query(getconexion(), $sqlc1);
    foreach ($resultc1 as $rowc1) :

        $horac1 = $rowc1['hora'];
        $porcentajec1 = $rowc1['porcentaje'];

    endforeach;

    $pdf->SetX(186);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $horac1, 1, 0, 'C');

    $pdf->SetX(195);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $porcentajec1, 1, 0, 'C');




    $sqlc1 = "SELECT * FROM horasxprocentaje WHERE codrol = '$idrol' and centro_costo = 'SEDE MANTA' and empleado = '$empleado'; ";
    $resultc1 = mysqli_query(getconexion(), $sqlc1);
    foreach ($resultc1 as $rowc1) :

        $horac1 = $rowc1['hora'];
        $porcentajec1 = $rowc1['porcentaje'];

    endforeach;

    $pdf->SetX(204);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $horac1, 1, 0, 'C');

    $pdf->SetX(213);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $porcentajec1, 1, 0, 'C');



    $sqlc1 = "SELECT * FROM horasxprocentaje WHERE codrol = '$idrol' and centro_costo = 'UBI' and empleado = '$empleado'; ";
    $resultc1 = mysqli_query(getconexion(), $sqlc1);
    foreach ($resultc1 as $rowc1) :

        $horac1 = $rowc1['hora'];
        $porcentajec1 = $rowc1['porcentaje'];

    endforeach;

    $pdf->SetX(222);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $horac1, 1, 0, 'C');

    $pdf->SetX(231);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $porcentajec1, 1, 0, 'C');



    
    $sqlc1 = "SELECT * FROM horasxprocentaje WHERE codrol = '$idrol' and centro_costo = 'UNACEM' and empleado = '$empleado'; ";
    $resultc1 = mysqli_query(getconexion(), $sqlc1);
    foreach ($resultc1 as $rowc1) :

        $horac1 = $rowc1['hora'];
        $porcentajec1 = $rowc1['porcentaje'];

    endforeach;

    $pdf->SetX(240);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $horac1, 1, 0, 'C');

    $pdf->SetX(249);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $porcentajec1, 1, 0, 'C');




    $sqlc1 = "SELECT * FROM horasxprocentaje WHERE codrol = '$idrol' and centro_costo = 'VINCULACION' and empleado = '$empleado'; ";

    // echo $sqlc1;
    $resultc1 = mysqli_query(getconexion(), $sqlc1);
    foreach ($resultc1 as $rowc1) :

        $horac1 = $rowc1['hora'];
        $porcentajec1 = $rowc1['porcentaje'];

    endforeach;

    $pdf->SetX(258);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $horac1, 1, 0, 'C');

    $pdf->SetX(267);
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(9, 8, $porcentajec1, 1, 0, 'C');


    $pdf->Ln();



}


$sqlc1x = "SELECT sum(hora) as horas, sum(porcentaje) as porcentajes FROM `horasxprocentaje` Where  codrol = '$idrol' and centro_costo = 'ADMINISTRATIVO'";

// echo $sqlc1;
$resultc1x = mysqli_query(getconexion(), $sqlc1x);
foreach ($resultc1x as $rowc1x) :

    $t1 = $rowc1x['horas'];
    $p1 = $rowc1x['porcentajes'];

endforeach;


$sqlc1x = "SELECT sum(hora) as horas, sum(porcentaje) as porcentajes FROM `horasxprocentaje` Where  codrol = '$idrol' and centro_costo = 'CALIDAD'";

// echo $sqlc1;
$resultc1x = mysqli_query(getconexion(), $sqlc1x);
foreach ($resultc1x as $rowc1x) :

    $t2 = $rowc1x['horas'];
    $p2 = $rowc1x['porcentajes'];

endforeach;


$sqlc1x = "SELECT sum(hora) as horas, sum(porcentaje) as porcentajes FROM `horasxprocentaje` Where  codrol = '$idrol' and centro_costo = 'COSESE'";

// echo $sqlc1;
$resultc1x = mysqli_query(getconexion(), $sqlc1x);
foreach ($resultc1x as $rowc1x) :

    $t3 = $rowc1x['horas'];
    $p3 = $rowc1x['porcentajes'];

endforeach;


$sqlc1x = "SELECT sum(hora) as horas, sum(porcentaje) as porcentajes FROM `horasxprocentaje` Where  codrol = '$idrol' and centro_costo = 'DISTANCIA'";

// echo $sqlc1;
$resultc1x = mysqli_query(getconexion(), $sqlc1x);
foreach ($resultc1x as $rowc1x) :

    $t4 = $rowc1x['horas'];
    $p4 = $rowc1x['porcentajes'];

endforeach;


$sqlc1x = "SELECT sum(hora) as horas, sum(porcentaje) as porcentajes FROM `horasxprocentaje` Where  codrol = '$idrol' and centro_costo = 'EDUCACION'";

// echo $sqlc1;
$resultc1x = mysqli_query(getconexion(), $sqlc1x);
foreach ($resultc1x as $rowc1x) :

    $t5 = $rowc1x['horas'];
    $p5 = $rowc1x['porcentajes'];

endforeach;


$sqlc1x = "SELECT sum(hora) as horas, sum(porcentaje) as porcentajes FROM `horasxprocentaje` Where  codrol = '$idrol' and centro_costo = 'INVESTIGACION'";

// echo $sqlc1;
$resultc1x = mysqli_query(getconexion(), $sqlc1x);
foreach ($resultc1x as $rowc1x) :

    $t6 = $rowc1x['horas'];
    $p6 = $rowc1x['porcentajes'];

endforeach;


$sqlc1x = "SELECT sum(hora) as horas, sum(porcentaje) as porcentajes FROM `horasxprocentaje` Where  codrol = '$idrol' and centro_costo = 'POSGRADOS'";

// echo $sqlc1;
$resultc1x = mysqli_query(getconexion(), $sqlc1x);
foreach ($resultc1x as $rowc1x) :

    $t7 = $rowc1x['horas'];
    $p7 = $rowc1x['porcentajes'];

endforeach;


$sqlc1x = "SELECT sum(hora) as horas, sum(porcentaje) as porcentajes FROM `horasxprocentaje` Where  codrol = '$idrol' and centro_costo = 'SALUD'";

// echo $sqlc1;
$resultc1x = mysqli_query(getconexion(), $sqlc1x);
foreach ($resultc1x as $rowc1x) :

    $t8 = $rowc1x['horas'];
    $p8 = $rowc1x['porcentajes'];

endforeach;


$sqlc1x = "SELECT sum(hora) as horas, sum(porcentaje) as porcentajes FROM `horasxprocentaje` Where  codrol = '$idrol' and centro_costo = 'SEDE MANTA'";

// echo $sqlc1;
$resultc1x = mysqli_query(getconexion(), $sqlc1x);
foreach ($resultc1x as $rowc1x) :

    $t9 = $rowc1x['horas'];
    $p9 = $rowc1x['porcentajes'];

endforeach;


$sqlc1x = "SELECT sum(hora) as horas, sum(porcentaje) as porcentajes FROM `horasxprocentaje` Where  codrol = '$idrol' and centro_costo = 'UBI'";

// echo $sqlc1;
$resultc1x = mysqli_query(getconexion(), $sqlc1x);
foreach ($resultc1x as $rowc1x) :

    $t10 = $rowc1x['horas'];
    $p10 = $rowc1x['porcentajes'];

endforeach;


$sqlc1x = "SELECT sum(hora) as horas, sum(porcentaje) as porcentajes FROM `horasxprocentaje` Where  codrol = '$idrol' and centro_costo = 'UNACEM'";

// echo $sqlc1;
$resultc1x = mysqli_query(getconexion(), $sqlc1x);
foreach ($resultc1x as $rowc1x) :

    $t11 = $rowc1x['horas'];
    $p11 = $rowc1x['porcentajes'];

endforeach;


$sqlc1x = "SELECT sum(hora) as horas, sum(porcentaje) as porcentajes FROM `horasxprocentaje` Where  codrol = '$idrol' and centro_costo = 'VINCULACION'";

// echo $sqlc1;
$resultc1x = mysqli_query(getconexion(), $sqlc1x);
foreach ($resultc1x as $rowc1x) :

    $t12 = $rowc1x['horas'];
    $p12 = $rowc1x['porcentajes'];

endforeach;




$pdf->SetX(5);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(55, 8, utf8_decode('Totales: '), 1, 0);


$pdf->SetX(60);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($t1), 1, 0, 'C');

$pdf->SetX(69);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($p1), 1, 0, 'C');

$pdf->SetX(78);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($t2), 1, 0, 'C');

$pdf->SetX(87);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($p2), 1, 0, 'C');


$pdf->SetX(96);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($t3), 1, 0, 'C');

$pdf->SetX(105);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($p3), 1, 0, 'C');



$pdf->SetX(114);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($t4), 1, 0, 'C');

$pdf->SetX(123);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($p4), 1, 0, 'C');


$pdf->SetX(132);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($t5), 1, 0, 'C');

$pdf->SetX(141);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($p5), 1, 0, 'C');


$pdf->SetX(150);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($t6), 1, 0, 'C');

$pdf->SetX(159);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($p6), 1, 0, 'C');


$pdf->SetX(168);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($t7), 1, 0, 'C');

$pdf->SetX(177);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($p7), 1, 0, 'C');


$pdf->SetX(186);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($t8), 1, 0, 'C');

$pdf->SetX(195);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($p8), 1, 0, 'C');


$pdf->SetX(204);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($t9), 1, 0, 'C');

$pdf->SetX(213);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($p9), 1, 0, 'C');


$pdf->SetX(222);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($t10), 1, 0, 'C');

$pdf->SetX(231);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($p10), 1, 0, 'C');


$pdf->SetX(240);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($t11), 1, 0, 'C');

$pdf->SetX(249);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($p11), 1, 0, 'C');


$pdf->SetX(258);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($t12), 1, 0, 'C');

$pdf->SetX(267);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(9, 8, utf8_decode($p12), 1, 0, 'C');




$pdf->Output();
