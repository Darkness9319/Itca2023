<?php
include("../Template/header.php");

// error_reporting(0);
// $rol = "0000000002 ";
$rol = $_GET['idrol'];


// $cadena = $_GET['cadena']




?>


<?php
if (isset($_SESSION['msj'])) {

    $respuesta = $_SESSION['msj'];

?>
    <script>
        Swal.fire(
            'Felicidades!',
            'Informacion ingresada con exito',
            'success'
        )
    </script>

<?php
    unset($_SESSION['msj']);
}
?>



<div class="card">
    <div class="card-header">
        <h4 style="color: red;"> <strong> Rol: </strong> <label style="color: black;"> <?php echo $rol  ?> </label> </h4>  
       
        <div class="card-header-right">
        <a href="ingresos.php" class="btn btn-danger"><i style="color:white;" class="fa-solid fa-x"></i> Regresar</a>
            <!-- <ul class="list-unstyled card-option">
                <li><i class="icofont icofont-simple-left "></i></li>
                <li><i class="icofont icofont-maximize full-card"></i></li>
                <li><i class="icofont icofont-minus minimize-card"></i></li>
                <li><i class="icofont icofont-refresh reload-card"></i></li>
       
            </ul> -->
        </div>
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Empleado</th>
                        <th>Centro de costos</th>
                        <th>Estado</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM horasxprocentaje where codrol = '$rol' group by empleado";
                    $resultado = getConexion()->query($query);

                    $i = 1;
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $var = $row['codrol'] . '-' . $row['empleado'];

                        $cadena = str_replace(' ', '_', $var);

                        // echo $var;
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>

                            <td><?php echo $row['empleado'] ?></td>
                            <td>



                                <a title="Repetir Pedido" style="color: white;  " href="ingresoh.php?cadena=<?php echo $cadena ?>" class="btn btn-inverse ">
                                    <span class="fa-solid fa-pencil"></span> Ingresar horas </a>

                            </td>

                            <td>
                                <?php echo $row['estado'] ?>
                            </td>

                        </tr>


                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>






<?php
include("../Template/footer.php");
?>