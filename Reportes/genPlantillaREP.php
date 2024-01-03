<?php
require('../Fpdf/fpdf.php');


class PDF extends FPDF
{
    // Cabecera de pagina
    function Header()
    {
        $this->Image('../assets/logo.png', 5, 5, 45, 15);

        $this->SetFont('Arial', 'B', 12);
        $this->SetY(5);
        $this->Cell(110);
        $this->Cell(20, 4, 'REPORTE SOPORTES', 0, 1, '');
        $this->SetFont('Arial', 'I', 10);
        $this->SetX(110);
        $this->Cell(20, 4, 'Accontable Integral Soluciones JDV', 0, 1, '');
        $this->SetX(95);
        //UIO
        $this->Cell(20, 4, 'La Padrera 520 y San Salvador, Edif. Omega, Piso 6 Of. 606', 0, 1, '');
        $this->SetX(100);
        $this->Cell(20, 4, 'Cel: 0984591151 / 0963233067 * Quito - Ecuador', 0, 1, '');
        $this->SetX(110);
        $this->Cell(20, 4, utf8_decode('Teléfonos: 4757504 / 4757505'), 0, 1, '');
        //GYE
        // $this->Cell(20, 4, 'Av. 9 de Octubre y Cordova, Edificio MU, Piso 6 Oficina 5', 0, 1, '');
        // $this->SetX(58);
        // $this->Cell(20, 4, 'Cel: 0963233067 * Guayaquil - Ecuador', 0, 1, '');
        // $this->SetX(67);
        // $this->Cell(20, 4, utf8_decode('Teléfonos: 042561524'), 0, 1, '');
    }

     //Encabezado Tabla de Egresos
    function EncabEgresos(){
        $this->SetFont('Arial', 'B', 9);
        $this->SetXY(10,30);
        //$this->SetTextColor(255,255,255);
        //$this->SetFillColor(79,78,77);
        $this->Cell(10, 5, utf8_decode('N°'), 'B', 0, 'C');
        $this->Cell(30, 5, 'TELEFONO', 'B', 0, 'C');
        $this->Cell(20, 5, 'TECNICO', 'B', 0, 'C');
        //$this->Cell(35, 5, 'FECHA / HORA ', 'B', 0, 'C');
        $this->Cell(90, 5, 'EMPRESA', 'B', 0, 'C');
        //$this->Cell(35, 5, 'SOLICITANTE', 'B', 0, 'C');
        $this->Cell(130, 5, 'TRABAJO REALIZADO', 'B', 1, 'C');
    }

    function headUIO()
    {
        // $this->SetX(47);
        $this->Cell(20, 4, 'La Padrera 520 y San Salvador, Edif. Omega, Piso 6 Of. 606', 0, 1, '');
        $this->SetX(53);
        $this->Cell(20, 4, 'Cel: 0984591151 / 0963233067 * Quito - Ecuador', 0, 1, '');
        $this->SetX(63);
        $this->Cell(20, 4, utf8_decode('Teléfonos: 4757504 / 4757505'), 0, 1, '');
    }

    function headGYE()
    {
        // $this->SetX(47);
        $this->Cell(20, 4, 'Av. 9 de Octubre y Cordova, Edificio MU, Piso 6 Oficina 5', 0, 1, '');
        $this->SetX(58);
        $this->Cell(20, 4, 'Cel: 0963233067 * Guayaquil - Ecuador', 0, 1, '');
        $this->SetX(67);
        $this->Cell(20, 4, utf8_decode('Teléfonos: 042561524'), 0, 1, '');
    }


    function DataClient()
    {
        $this->SetY(30);
        $this->Cell(-5);
        $this->Ln();

        $this->SetFont('Arial', 'B', 7);
        $this->Cell(1);
        $this->Cell(27, 5, 'FECHA: ', 0, 0, '', 0);
        $this->SetXY(105, 30);
        $this->Cell(27, 5, 'ASESOR: ', 0, 1, '', 0);

        $this->SetXY(11, 35);
        $this->Cell(27, 5, 'HORA ING: ', 0, 0, '', 0);
        $this->SetXY(60, 35);
        $this->Cell(27, 5, 'HORA SAL: ', 0, 0, '', 0);
        $this->SetXY(105, 35);
        $this->Cell(27, 5, 'T.HORAS: ', 0, 0, '', 0);

        $this->SetY(40);
        $this->Cell(1);
        $this->Cell(27, 5, 'CLIENTE: ', 0, 1, '', 0);

        $this->SetXY(40, 50);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(20, 5, utf8_decode('DESCRIPCIÓN DE LA VISITA REALIZADA'), 0, 0, '', '0');
        $this->Ln();

        $this->SetXY(10, 80);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(20, 5, utf8_decode('Observaciones'), 0, 0, '', '0');

        $this->SetXY(10, 100);
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(20, 5, utf8_decode('TIPO DE SOPORTE: '), 0, 0, '', '0');

        $this->SetX(105);
        $this->Cell(20, 5, utf8_decode('SOPORTE FACTURADO: '), 0, 0, '', '0');
        $this->Ln();

        $this->SetXY(37, 108);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(20, 5, utf8_decode('DATOS DEL CLIENTE PARA FACTURACIÓN'), 0, 1, '', '0');
        // $this->Ln();

        $this->SetFont('Arial', 'B', 7);
        // $this->Cell(1);
        $this->SetXY(11, 115);
        $this->Cell(27, 5, 'EMPRESA: ', 0, 0, '', 0);
        // $this->SetX(120);
        // $this->Cell(27, 5, 'RUC: ', 0, 1, '', 0);

        $this->SetXY(11, 120);
        $this->Cell(27, 5, 'RUC: ', 0, 0, '', 0);
        // $this->SetXY(120, 120);
        // $this->Cell(27, 5, 'CARGO: ', 0, 1, '', 0);

        //$this->Cell(1);
        $this->SetXY(11, 125);
        $this->Cell(27, 5, 'SOLICITANTE: ', 0, 0, '', 0);
        $this->SetXY(90, 125);
        $this->Cell(27, 5, 'CARGO: ', 0, 0, '', 0);

        $this->SetXY(11, 130);
        $this->Cell(27, 5, 'VALOR A FACTURAR: ', 0, 0, '', 0);
    }


    //Pie de pagina
    function Footer()
    {
        $this->SetFont('Arial', '', 7.5);
        $this->SetY(-13);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
