<?php
require('../Fpdf/fpdf.php');


class PDF extends FPDF
{

    
    // Cabecera de pagina
    function Header()
    {
        $this->Image('../assets/logo.png', 15, 5, 45, 15);
        $this->Image('../assets/logoparaestuardocruz2.png', 150, 5, 45, 15);

        $this->SetFont('Times', 'B', 12);

        $this->SetXY(15,25);
        $this->Cell(80,10,utf8_decode('ADS SOFTWARE CIA. LTDA.'), 'LTR', 0, '');
        $this->SetFont('Times', 'B', 14);
        $this->Cell(60,10,utf8_decode('COTIZACIÓN'), 'LTR', 1,'C' );
        $this->SetFont('Times', 'B', 12);
        
        $this->SetXY(15,30);
        $this->Cell(80,10,utf8_decode('Sistema Administrativo Integrado'), 'LRB', 0, '');
        $this->Cell(60,10,utf8_decode(''), 'LRB', 1,'C' );

        $this->SetXY(155,25);
        $this->Cell(40,10,'', 'TR', 1, '');
        $this->SetXY(155,35);
        $this->Cell(40,5,utf8_decode('Titulo No. 8237'), 'BR', 1, 'C');

        $this->Image("../assets/logo_iepi.png", 171, 26, 9, 9);
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
        $this->SetFont('Times', '', 12);
        $this->SetY(-13);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . ' de{nb} ', 0, 0, 'R');
    }
}
