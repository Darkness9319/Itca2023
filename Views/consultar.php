<?php
include("../Template/header.php");
?>

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
                        <th>Reporte</th>


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




                                <a href="../Reportes/Rrol.php?idrol=<?php echo $row['codrol']  ?>" class="btn btn-info" style="color:black"> <i class="fa-regular fa-file-pdf"></i> Generar reporte</a>


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