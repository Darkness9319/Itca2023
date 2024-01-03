<?php 
    session_start();
    //setlocale(LC_ALL,"es_ES@euro","es_ES","esp");

    include "genPlantillaPDF1.php";
    require '../Modelo/dbconfig.php';

    //$idSp = '1';
    $idSp = $_GET['id'];

    //$sql2 = "SELECT * FROM tbl_cotizacion WHERE id_cot = '$idSp'";
    //$sql2 = "SELECT *, DATE_FORMAT(fechaReg_cot,'%d  de %M  del %Y  ') as FCHA FROM tbl_cotizacion WHERE id_cot = '$idSp'";
    $sql2 = "SELECT * FROM clientes WHERE codigo_cln = '$idSp'";
    $result2 = mysqli_query(getconexion(), $sql2);


    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    //Funciones
    $pdf->cabeceraFormCompromiso();

    //Datos Tabla
    while ($row2 = mysqli_fetch_assoc($result2))
    {
        $fecha = $row2['fecha_registro'];
        
        
        $apellidosSoc = $row2['apellidos_socn'];
        $nombresSoc = $row2['nombres_socn'];
        
        $cedrucSoc = $row2['cedularuc'];
        $codigoSoc = $row2['codigo_cln'];

        $cuent_numtar = $row2['cuent_numtar'];
        $numCuenta = $row2['num_cad'];
        
        $valCuota = '13';

        
        $tpdocumento = $row2['tpdocumento'];
        $numdoc = $row2['numdoc'];
        $titular = $row2['titular'];

        //$pdf->SetFont('Times','BI',10); 
        //$pdf->SetFont('Times','',10);      
        // $numCOT = $row2['num_cot'];
        
        // $op1 = $valorCt * 0.12;
        // $op2 = $valorCt + $op1;


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
    function SetCurrency(float $valor, string $signo = '$'):string
    {
        return $signo.number_format($valor,2,'.','');
    }


    $pdf->SetFont('Times','',10);

    //$pdf->Cell(1);
    $pdf->SetXY(15,40);
    $pdf->Cell(50,5,utf8_decode('Quito, '.obtenerFechaEnLetra($fecha)), 0, 1);
    
    $pdf->Ln();
    $pdf->SetX(15);
    $pdf->Cell(10,5,utf8_decode('Señor'), 0, 1);
    $pdf->SetX(15);
    $pdf->Cell(10,5,utf8_decode('PRESIDENTE DE LA CÁMARA DE LA INDUSTRIA DE LA CONSTRUCCIÒN'), 0, 1);
    $pdf->SetX(15);
    $pdf->Cell(10,5,utf8_decode('Presente.-'), 0, 1);

    $pdf->Ln();
    $pdf->SetX(15);
    $pdf->Cell(10,5,utf8_decode('De mi consideración:'), 0, 1);


    $pdf->Ln();
    $pdf->SetX(15);
    $pdf->Multicell(180,5,utf8_decode('Siendo estatutariamente una de las obligaciones de los Socios de la Cámara de la Industria de la Construcción, el cancelar y satisfacer puntualmente las cuotas sociales ordinarias, a través del presente formulario digo:'),0,'J'); 
    
    $pdf->Ln();
    $pdf->SetX(15);
    $pdf->MultiCell(180,5,utf8_decode('Yo, '.$apellidosSoc.' '.$nombresSoc.' con cédula de ciudadania N°: '.$cedrucSoc.' y con Número de Afiliación '.$codigoSoc.', DECLARO CONOCER que todos los socios de la Cámara de la Industria de la Construcción , debemos satisfacer puntualmente nuestras obligaciones para poder acceder a los Servicios y ejercer los Derechos que brinda la Institucion.'),0,'J');
    
    $pdf->Ln();
    $pdf->SetX(15);
    $pdf->Multicell(180,5,utf8_decode('De la misma manera por medio de la presente, ME COMPROMETO A CANCELAR Y SATISFACER PUNTUALMENTE'),0,'J'); 
    
    $pdf->Ln();
    $pdf->SetX(15);
    $pdf->Multicell(180,5,utf8_decode('LAS CUOTAS SOCIALES ORDINARIAS, por un valor de USD '.SetCurrency(doubleval($valCuota)).', a través de la autorización de débitos bancarios o pagos via tarjeta de crédito'),0,'J'); 
    
    $pdf->Ln();
    $pdf->SetX(60);
    $pdf->Cell(100,7,utf8_decode('Banco Pichincha'),1,1,'C');
    $pdf->SetX(60);
    $pdf->Cell(40,7,utf8_decode('Tipo de Cuenta'),1,0,'R');
    $pdf->Cell(60,7,utf8_decode($cuent_numtar),1,1,'C');
    $pdf->SetX(60);
    $pdf->Cell(40,7,utf8_decode('Num Cuenta'),1,0,'R');
    $pdf->Cell(60,7,utf8_decode($numCuenta),1,1,'C');
    $pdf->SetX(60);
    $pdf->Cell(40,7,utf8_decode('C.I '),1,0,'R');
    $pdf->Cell(60,7,utf8_decode($cedrucSoc),1,1,'C');
    

    $pdf->Ln();
    $pdf->SetX(15);
    $pdf->Multicell(180,5,utf8_decode('Por tal motivo ACEPTO que cuando por cualquier razón haya dejado de cumplir puntualmente con mis obligaciones de pago, ya sea por imposibilidad financiera o voluntaria para realizar los débitos o pagos automáticos o personales, me encontraré en un estado de morosidad que me imposibilita el ejercer mis derechos y acceder a los servicios de la Institución, especialmente la cobertura de cualquier tipo de seguropersonal o de vida que brinde la Institución; por lo que EXPRESAMENTE DECLARO Y ACEPTO, que en el caso de atrasarme durante UN MES en el pago de mis cuotas sociales, PERDERE SIN RECLARO ALGUNO DICHAS COBERTURAS, pudiendo ser rehabilitado para gozar de tal beneficio, TREINTA DIAS DESPUES de haberme puesto al dia en el pago de mis haberes, y NOVENTA DIAS DESPUES, en el caso de sufrir enfermedad preexistente, sujetandome a las condiciones particulares de las pólizas contratas y cumpliendo con puntualidad y oportunidad el pago de dichas cuotas sociales.'),0,'J'); 
    
    $pdf->Ln();
    $pdf->SetX(15);
    $pdf->Multicell(180,5,utf8_decode('Finalmente ACEPTO el total contenido de todos y cada uno de los compromisos precedentes de este formulario, por haber sido acordados y admitidos de manera totalmente libre conveniendo asi a mis instereses y derechos.'),0,'J'); 
    
    
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetX(75);
    $pdf->Cell(50,5,'_________________________________',0,1);
    $pdf->SetX(70);
    $pdf->Cell(70,5,'Firma del Socio',0,1,'C');
    //$fechaFRTC = strftime( "%d de %B del %Y" );
    
    // $pdf->SetXY(95,30);

    


    // $sql = "SELECT * FROM login WHERE nombres = '$tec'";
    // $res = mysqli_query(getconexion(), $sql);


    // while ($row = mysqli_fetch_assoc($res))
    // {    
    //     $fotoFrm = $row['firma'];
    //     if($fotoFrm != ""){
    //         $pdf->Image("../assets/UsImgs/$fotoFrm", 15, 180, 45, 15);
    //     }else{

    //     }

    //     $prv = $row['ciudad'];
    //     if($prv == 'UIO'){
    //         $pdf->SetFont('Times', 'I', 12);
    //         $pdf->SetXY(15,43);
    //         $pdf->Cell(20, 4, 'Quito, '.obtenerFechaEnLetra($fecha), 0, 1, '');
    //     }
    //     if($prv == 'GYE'){
    //         $pdf->SetFont('Times', 'I', 12);
    //         $pdf->SetXY(15,43);
    //         $pdf->Cell(20, 4, 'Guayaquil, '.obtenerFechaEnLetra($fecha), 0, 1, '');
    //     }
        

    //     $m = $row['nombres'];
    //     if ($m == 'Diego Saavedra') {
    //         $nombreCom = "Tnlgo. Anthony Saavedra";
    //         $inicTec = "AS";
    //     }
    //     if ($m == 'Renato Zavala') {
    //         $nombreCom = "Tnlgo. Renato Zavala";
    //         $inicTec = "RZ";
    //     }
    //     if ($m == 'Vladimir Manzano') {
    //         $nombreCom = "Ing. Vladimir Manzano";
    //         $inicTec = "VM";
    //     }
    //     if ($m == 'Kiara Vera') {
    //         $nombreCom = "Ing. Kiara Vera";
    //         $inicTec = "KV";
    //     }
    //     if ($m == 'Sofia Cortez') {
    //         $nombreCom = "Ing. Sofia Cortez";
    //         $inicTec = "SC";
    //     }
    //     if ($m == 'Jonatan Viracocha') {
    //         $nombreCom = "Lic. Jonatan Viracocha";
    //         $inicTec = "JV";
    //     }

    //     $pdf->SetFont('Times','',12);
    //     $pdf->SetXY(95,33);
    //     $pdf->Cell(60,5,$inicTec.'-'.$numCOT, 0, 1,'C');

    //     $pdf->SetFont('Times', '', 12);
        
    //     $pdf->SetXY(15, 60);
    //     $pdf->Cell(45,5, utf8_decode('Señor'),0,1,'',0);
    //     $pdf->SetFont('Times', 'B', 12);
    //     $pdf->SetXY(15,65);
    //     $pdf->Cell(45,5, utf8_decode($empresa),0,1,'',0);
    //     $pdf->SetFont('Times', '', 12);
    //     $pdf->SetXY(15,70);
    //     $pdf->Cell(45,5, utf8_decode('Presente: '),0,1,'',0);
        
        
    //     $pdf->SetXY(15,90);
    //     $pdf->Cell(45,5, utf8_decode('Al presente ponemos a su disposición la siguiente  '),0,1,'',0);
        
    //     $pdf->SetFont('Times', 'BU', 14);
    //     $pdf->SetXY(85,100);
    //     $pdf->Cell(45,5, utf8_decode('Oferta Económica'),0,1,'',0);
    //     $pdf->Ln();

    //     //Funcion para Signo de Dolar y 2 Decimales
    //     function SetCurrency(float $valor, string $signo = '$'):string
    //     {
    //         return $signo.number_format($valor,2,'.','');
    //     }
        
    //     $pdf->SetFont('Arial', '', 9);
    //     $pdf->SetX(45);
    //     // $pdf->MultiCell(90,4,utf8_decode($concepto),1,'J');
    //     // $pdf->SetXY(135,110);
    //     // $pdf->MultiCell(20,12,SetCurrency(doubleval($valorCt)) ,1,'R');
    //     $pdf->Cell(90,5,utf8_decode($concepto),1,0,'J');
    //     $pdf->Cell(20,5,SetCurrency(doubleval($valorCt)),1,1,'R');
    //     $pdf->SetX(45);
    //     $pdf->SetFont('Arial', 'B', 7);
    //     $pdf->Cell(90,5,'SubTotal',1,0,'R');
    //     $pdf->SetFont('Arial', '', 9);
    //     $pdf->Cell(20,5,SetCurrency(doubleval($valorCt)),1,1,'R');
    //     $pdf->SetX(45);
    //     $pdf->SetFont('Arial', 'B', 7);
    //     $pdf->Cell(90,5,'IVA 12%',1,0,'R');
    //     $pdf->SetFont('Arial', '', 9);
    //     $pdf->Cell(20,5,SetCurrency(doubleval($op1)),1,1,'R');
    //     $pdf->SetX(45);
    //     $pdf->SetFont('Arial', 'B', 7);
    //     $pdf->Cell(90,5,'Total',1,0,'R');
    //     $pdf->SetFont('Arial', '', 9);
    //     $pdf->Cell(20,5,SetCurrency(doubleval($op2)),1,0,'R');
        
    //     $pdf->SetFont('Times', '', 12);
    //     $pdf->SetXY(15,140);
    //     //$pdf->Multicell(180,5,utf8_decode('Nota: Se solicita que el cliente tenga la conexión remota activa al equipo principal o servidor con el usuario de Windows y su respectiva contraseña en el equipo nuevo. '),0,'J'); 
    //     $pdf->MultiCell(180,5,'Nota: '.utf8_decode($notaAD),'J');
    //     $pdf->Ln();
    //     $pdf->Ln();
    //     $pdf->Ln();
    //     $pdf->Ln();
    //     $pdf->SetX(15);
    //     $pdf->Cell(45,5, utf8_decode('Atentamente,'),0,1,'',0);
    //     $pdf->Ln();
    //     $pdf->Ln();
    //     $pdf->Ln();
    //     $pdf->Ln();
    //     $pdf->SetX(15);
    //     $pdf->Cell(45,5, utf8_decode($nombreCom),0,1,'',0);
    //     $pdf->SetX(15);
    //     $pdf->Cell(45,5, utf8_decode('Distribuidor JDV S.A.'),0,1,'',0);
    //     $pdf->SetX(15);
    //     $pdf->Cell(45,5, utf8_decode('FenixCorp'),0,1,'',0);

        


    //     // $pdf->Cell(45,5, utf8_decode($row2['descripcion']),0,0,'',0);

    //     // $pdf->SetY(55);
    //     // $pdf->Cell(11);
    //     // $pdf->SetFont('Arial','U',7.5);
    //     // $pdf->SetTextColor(36,113,163);
    //     // $pdf->Cell(25,5, $row2['email'],0,0,'',0);

    //     // $pdf->SetTextColor(0,0,0);
    //     // $pdf->SetFont('Arial','',7.5);

    //     // $pdf->SetY(65);
    //     // $pdf->Cell(25);
    //     // $pdf->Cell(45,5, $row2['fechaReg'],0,0,'',0);
    // }



    // $pdf->SetFont('Arial','',8);

    $pdf->Output('','FormularioCompromiso_#'.$idSp.'.pdf');
