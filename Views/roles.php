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
            'Rol activado con exito',
            'success'
        )
    </script>

<?php
    unset($_SESSION['msj']);
}
?>


<?php
if (isset($_SESSION['msj3'])) {

    $respuesta = $_SESSION['msj3'];

?>
    <script>
        Swal.fire(
            'Felicidades!',
            'Rol creado con exito',
            'success'
        )
    </script>

<?php
    unset($_SESSION['msj3']);
}
?>






<?php
if (isset($_SESSION['msj2'])) {

    $respuesta = $_SESSION['msj2'];

?>
    <script>
        Swal.fire(
            'Atencion!',
            'Rol desactivado con exito',
            'error'
        )
    </script>

<?php
    unset($_SESSION['msj2']);
}
?>


<h5>Roles</h5>

<div class="card">
    <div class="card-header">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Nuevo rol
        </button>
    </div>

    <br>
    <div class="card-block">




        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Codigo </th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $query = "SELECT * FROM roles ";
                        $resultado = getConexion()->query($query);

                        $i = 1;
                        while ($row = mysqli_fetch_assoc($resultado)) {




                        ?>
                            <tr>
                                <td><?php echo $i ?></td>

                                <td><?php echo $row['codrol']   ?></td>
                                <td><?php echo $row['nombre_rol']   ?></td>

                                <td>
                                    <?php

                                    if ($row['estado_rol'] == 'A') {
                                    ?>

                                        <label style="font-size: small;" class="label label-success">Activo</label>


                                    <?php  } else { ?>

                                        <label style="font-size: small;" class="label label-danger">Inactivo</label>
                                    <?php  }  ?>


                                </td>


                                <td>
                                    <?php

                                    if ($row['estado_rol'] == 'A') {
                                    ?>

                                        <a style="color: white;" href="../controllers/Roles/desactivar.php?idemp=<?php echo  $row['id_rol']  ?>" class="btn btn-danger ">
                                            <i class="ti-close"></i> Desactivar </a>



                                    <?php  } else { ?>

                                        <a style="color: white;" href="../controllers/Roles/activar.php?idemp=<?php echo  $row['id_rol']  ?>" class="btn btn-primary ">
                                            <i class="ti-check"></i> Activar </a>
                                    <?php  }  ?>


                                </td>





                            </tr>


                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>







    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../Controllers/Roles/crear.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Creacion de nuevo rol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="">Codigo Rol</label>
                            <input type="text" name="txtcod" id="txtcod" class="form-control">
                        </div>
                        
                        <div class="col-sm-12">
                            <label for="">Nombre Rol</label>
                            <input type="text" name="txtrol" id="txtrol" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="btnemp" id="btnemp">Guardar</button>
                </div>

            </form>
        </div>
    </div>
</div>




<?php
include("../Template/footer.php");
?>