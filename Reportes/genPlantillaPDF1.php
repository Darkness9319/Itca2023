<?php
require('../Fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        // Configura el encabezado del documento PDF
        // Aquí puedes agregar un encabezado personalizado, como un logotipo o un título
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'INSTITUTO SUPERIOR TECNOLOGICO ITCA', 0, 1, 'C');

        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Reporte de horas por centro de costo', 0, 1, 'C');

        $this->Image('lgitca.png', 5, 5, 55, 25);
        $this->RoundedRect(5, 5, 285, 25, 5, '13');

        $this->SetY(35);
        // $this->SetX(5);
        // $this->SetFont('Times', 'B', 10);
        // $this->Cell(290, 8, 'Empleado   Admin.    Calidad     Cosese     Distan.     Educa.     Invest.     Posgra.     Salud      Manta     Ubicacion     Unacem     Vinculacion', 1, 1, 'R');


        $this->SetX(5);
        $this->SetFont('Times', 'B', 14);
        $this->Cell(55, 16, 'Empleado', 1, 0,'C');

        $this->SetX(60);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(18, 8, 'Admin', 1, 0,'C');

        $this->SetX(78);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(18, 8, 'Calidad', 1, 0,'C');

        $this->SetX(96);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(18, 8, 'Cosese', 1, 0,'C');

        $this->SetX(114);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(18, 8, 'Distan.', 1, 0,'C');

        $this->SetX(132);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(18, 8, 'Educa.', 1, 0,'C');
        
        $this->SetX(150);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(18, 8, 'Invest.', 1, 0,'C');

        $this->SetX(168);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(18, 8, 'Posgra.', 1, 0,'C');

        $this->SetX(186);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(18, 8, 'Salud', 1, 0,'C');

        $this->SetX(204);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(18, 8, 'Manta', 1, 0,'C');

        $this->SetX(222);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(18, 8, 'Ubic', 1, 0,'C');

        $this->SetX(240);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(18, 8, 'Unacem', 1, 0,'C');

        $this->SetX(258);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(18, 8, 'Vincula.', 1, 1, 'C');

// Horas --------------------------------------------------------



        $this->SetX(60);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, 'H', 1, 0,'C');
        $this->SetX(69);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, '%', 1, 0,'C');

        $this->SetX(78);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, 'H', 1, 0,'C');
        $this->SetX(87);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, '%', 1, 0,'C');

        $this->SetX(96);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, 'H', 1, 0,'C');
        $this->SetX(105);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, '%', 1, 0,'C');

        $this->SetX(114);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, 'H', 1, 0,'C');
        $this->SetX(123);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, '%', 1, 0,'C');

        $this->SetX(132);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, 'H', 1, 0,'C');
        $this->SetX(141);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, '%', 1, 0,'C');

        $this->SetX(150);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, 'H', 1, 0,'C');
        $this->SetX(159);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, '%', 1, 0,'C');

        $this->SetX(168);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, 'H', 1, 0,'C');
        $this->SetX(177);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, '%', 1, 0,'C');

        $this->SetX(186);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, 'H', 1, 0,'C');
        $this->SetX(195);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, '%', 1, 0,'C');

        $this->SetX(204);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, 'H', 1, 0,'C');
        $this->SetX(213);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, '%', 1, 0,'C');

        $this->SetX(222);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, 'H', 1, 0,'C');
        $this->SetX(231);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, '%', 1, 0,'C');

        $this->SetX(240);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, 'H', 1, 0,'C');
        $this->SetX(249);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, '%', 1, 0,'C');

        $this->SetX(258);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, 'H', 1, 0,'C');
        $this->SetX(267);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(9, 8, '%', 1, 0,'C');




 

    

        $this->Ln(8);
    }


    function Footer()
    {


        // Configura el pie de página del documento PDF
        // Aquí puedes agregar información adicional, como números de página
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ' . $this->PageNo() . '/{nb}'), 0, 0, 'C');
    }
}
