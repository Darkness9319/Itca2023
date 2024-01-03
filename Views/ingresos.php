<?php
include("../Template/header.php");
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




<?php
if (isset($_SESSION['msjel'])) {

    $respuesta = $_SESSION['msjel'];

?>
    <script>
        Swal.fire(
            'Felicidades!',
            'Informacion Eliminada con exito',
            'success'
        )
    </script>

<?php
    unset($_SESSION['msjel']);
}
?>

<div class="card">
    <div class="card-body">
        <form action="../Controllers/Cargar/traerempleados.php" method="POST">
            <h5 class="card-title">Seleccione el rol a cargar las horas </h5>
            <div class="form row">

                <div class="col-md-6 mb-6">


                    <select name="cmbrol" id="cmbrol" class="form-control">


                        <?php
                        $s3 = "SELECT * FROM roles where estado_rol = 'A'";
                        $res3 = getConexion()->query($s3);

                        while ($row3 = mysqli_fetch_assoc($res3)) {
                            $rolconcat = $row3['codrol'] . '-' . $row3['nombre_rol'];

                        ?>
                            <option value="<?php echo $rolconcat ?>"><?php echo $row3['codrol'] . ' - ' . $row3['nombre_rol'] ?></option>
                        <?php } ?>


                    </select>
                </div>

                <div class="col-md-6 mb-6">

                    <button type="submit" class="btn btn-primary">Seleccionar</button>
                </div>

            </div>

        </form>


    </div>
</div>






<div class="card">
    <div class="card-header">
        <h4> <label style="color: black;"> Ingreso de Horas </label> </h4>

        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li><i class="icofont icofont-simple-left "></i></li>
                <li><i class="icofont icofont-maximize full-card"></i></li>
                <li><i class="icofont icofont-minus minimize-card"></i></li>
                <li><i class="icofont icofont-refresh reload-card"></i></li>
                <!-- <li><i class="icofont icofont-error close-card"></i></li> -->
            </ul>
        </div>
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Rol</th>
                        <th>Acciones</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM horasxprocentaje group by rol";
                    $resultado = getConexion()->query($query);

                    $i = 1;
                    while ($row = mysqli_fetch_assoc($resultado)) {




                    ?>
                        <tr>
                            <td><?php echo $i ?></td>

                            <td><?php echo $row['codrol'] . ' - ' . $row['rol']  ?></td>
                            <td>



                                <a style="color: white;" href="cargarhoras.php?idrol=<?php echo  $row['codrol']  ?>" class="btn btn-primary ">
                                    <span class="fa-solid fa-eye"></span> Abrir </a>

                                <a style="color: white;" href="eliminar.php?idrol=<?php echo  $row['codrol']  ?>" class="btn btn-danger ">
                                    <span style="color:white;" class="fa-solid fa-x"></span> Eliminar </a>

                            </td>



                        </tr>


                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>













<!-- <a type="button" class="btn btn-primary" href="cargarhoras.php?idrol=<?php echo $idrol  ?>" ><?php echo $row3['encrolcodigo'] . ' - ' . $row3['encroldescrip'] ?> </a> -->

<?php
include("../Template/footer.php");
?>