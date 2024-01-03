<?php
$link = getconexion();

function getconexion()
{

    //------------------------Datos para host----------------//

    // $mysql = new mysqli("localhost","u308709611_adminitca","hatsunemiku212017D","u308709611_dbitca");
    //-------------------------------------------------------//

    //------------------------Datos para host----------------//

    $mysql = new mysqli("localhost", "root", "", "itca");

    //-------------------------------------------------------//

    return $mysql;
}
