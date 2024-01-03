<?php
require('../Fpdf/fpdf.php');


class PDF extends FPDF
{
    // Cabecera de pagina
    function Header()
    {
        $this->Image('../assets/logo.png', 5, 5, 35, 15);

        $this->SetFont('Arial', 'B', 10);
        $this->SetY(5);
        $this->Cell(53);
        $this->Cell(20, 4, 'HOJA DE CONTROL', 0, 1, '');
        $this->SetFont('Arial', 'I', 7);
        $this->SetX(60);
        $this->Cell(20, 4, 'Accontable Integral Soluciones JDV', 0, 1, '');
        // $this->SetX(47);
        //UIO
        // $this->Cell(20, 4, 'La Padrera 520 y San Salvador, Edif. Omega, Piso 6 Of. 606', 0, 1, '');
        // $this->SetX(53);
        // $this->Cell(20, 4, 'Cel: 0984591151 / 0963233067 * Quito - Ecuador', 0, 1, '');
        // $this->SetX(63);
        // $this->Cell(20, 4, utf8_decode('Teléfonos: 4757504 / 4757505'), 0, 1, '');
        //GYE
        // $this->Cell(20, 4, 'Av. 9 de Octubre y Cordova, Edificio MU, Piso 6 Oficina 5', 0, 1, '');
        // $this->SetX(58);
        // $this->Cell(20, 4, 'Cel: 0963233067 * Guayaquil - Ecuador', 0, 1, '');
        // $this->SetX(67);
        // $this->Cell(20, 4, utf8_decode('Teléfonos: 042561524'), 0, 1, '');
    }

   
    //Pie de pagina
    function Footer()
    {
        $this->SetFont('Arial', '', 7.5);
        $this->SetY(-13);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }


    function ColoredCell($text, $width, $height, $fill_color) {
        $this->SetFillColor($fill_color[0], $fill_color[1], $fill_color[2]);
        $this->Cell($width, $height, $text, 1, 0, 'L', true);
        $this->SetFillColor(255, 255, 255);  // Restablecer el color de relleno a blanco
    }
    
}
