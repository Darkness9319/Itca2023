<?php
include("../Template/header.php");


$cadena = $_GET['cadena'];
?>


<div class="card">
    <div class="car-header">


    </div>
    <div class="card-body" style="align-items: rigth;">
        <form method="POST" action="../Controllers/Guardar/guardarhoras.php">




            <?php


            $array = explode("-", $cadena);


            $nombreempleado = str_replace('_', ' ', $array[1]);
            // 0 - es el rol

            // 1 - es el empleado    



            ?>
            <input type="hidden" name="cadena" class="form-control" value="<?php echo $cadena   ?>">
            <input type="hidden" name="roluni" class="form-control" value="<?php echo $array[0]  ?>">
            <input type="hidden" name="empleadouni" class="form-control" value="<?php echo $nombreempleado   ?>">
            <div class="form row">

                <div class="col-md-4 mb-3">
                    <label style="color: white;" for="validationCustom01">Administrativo<span class="m-0 font-weight-bold text-danger"></span></label>
                </div>

                <div class="col-md-4 mb-3">
                    <center>
                        <label for="validationCustom01"><strong>Cantidad Horas </strong><span class="m-0 font-weight-bold text-danger"></span></label>
                    </center>
                </div>

                <div class="col-md-4 mb-3">
                    <center>
                        <label for="validationCustom01"><strong>Porcentaje </strong><span class="m-0 font-weight-bold text-danger"></span></label>
                    </center>
                </div>

            </div>


            <div class="form row">

                <div class="col-md-4 mb-3">

                    <label for="validationCustom01">Administrativo<span class="m-0 font-weight-bold text-danger"></span></label>

                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="horasad" id="horasad" class="form-control" value="0">
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="porcentajead" id="porcentajead" class="form-control" readonly>
                </div>


            </div>

            <div class="form row">

                <div class="col-md-4 mb-3">

                    <label for="validationCustom01">Calidad<span class="m-0 font-weight-bold text-danger"></span></label>

                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="horasca" id="horasca" class="form-control" value="0">
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="porcentajeca" id="porcentajeca" class="form-control" readonly>
                </div>


            </div>

            <div class="form row">

                <div class="col-md-4 mb-3">

                    <label for="validationCustom01">Cosese<span class="m-0 font-weight-bold text-danger"></span></label>

                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="horasco" id="horasco" class="form-control" value="0">
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="porcentajeco" id="porcentajeco" class="form-control" readonly>
                </div>


            </div>

            <div class="form row">

                <div class="col-md-4 mb-3">

                    <label for="validationCustom01">Distancia</label><span class="m-0 font-weight-bold text-danger"></span></label>

                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="horasdi" id="horasdi" class="form-control" value="0">
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="porcentajedi" id="porcentajedi" class="form-control" readonly>
                </div>


            </div>

            <div class="form row">

                <div class="col-md-4 mb-3">

                    <label for="validationCustom01">Educacion<span class="m-0 font-weight-bold text-danger"></span></label>

                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="horased" id="horased" class="form-control" value="0">
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="porcentajeed" id="porcentajeed" class="form-control" readonly>
                </div>


            </div>

            <div class="form row">

                <div class="col-md-4 mb-3">

                    <label for="validationCustom01">Investigacion<span class="m-0 font-weight-bold text-danger"></span></label>

                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="horasin" id="horasin" class="form-control" value="0">
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="porcentajein" id="porcentajein" class="form-control" readonly>
                </div>


            </div>

            <div class="form row">

                <div class="col-md-4 mb-3">

                    <label for="validationCustom01">Posgrados<span class="m-0 font-weight-bold text-danger"></span></label>

                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="horaspo" id="horaspo" class="form-control" value="0">
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="porcentajepo" id="porcentajepo" class="form-control" readonly>
                </div>


            </div>

            <div class="form row">

                <div class="col-md-4 mb-3">

                    <label for="validationCustom01">Salud<span class="m-0 font-weight-bold text-danger"></span></label>

                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="horassa" id="horassa" class="form-control" value="0">
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="porcentajesa" id="porcentajesa" class="form-control" readonly>
                </div>


            </div>

            <div class="form row">

                <div class="col-md-4 mb-3">

                    <label for="validationCustom01">Sede manta<span class="m-0 font-weight-bold text-danger"></span></label>

                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="horassm" id="horassm" class="form-control" value="0">
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="porcentajesm" id="porcentajesm" class="form-control" readonly>
                </div>


            </div>

            <div class="form row">

                <div class="col-md-4 mb-3">

                    <label for="validationCustom01">Ubicacion<span class="m-0 font-weight-bold text-danger"></span></label>

                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="horasub" id="horasub" class="form-control" value="0">
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="porcentajeub" id="porcentajeub" class="form-control" readonly>
                </div>


            </div>

            <div class="form row">

                <div class="col-md-4 mb-3">

                    <label for="validationCustom01">Unacem<span class="m-0 font-weight-bold text-danger"></span></label>

                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="horasun" id="horasun" class="form-control" value="0">
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="porcentajeun" id="porcentajeun" class="form-control" readonly>
                </div>


            </div>

            <div class="form row">

                <div class="col-md-4 mb-3">

                    <label for="validationCustom01">Vinculacion<span class="m-0 font-weight-bold text-danger"></span></label>

                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="horasvi" id="horasvi" class="form-control" value="0">
                </div>

                <div class="col-md-4 mb-3">
                    <input type="text" name="porcentajevi" id="porcentajevi" class="form-control" readonly>
                </div>


            </div>

            <div class="form row">


                <div class="col-md-4 mb-3">

                </div>
                <div class="col-md-4 mb-3">
                    <label>Total de horas: </label><input type="text" name="totalhoras" id="totalhoras" class="form-control" value="0" readonly>
                </div>

                <div class="col-md-4 mb-3">
                    <label>Total porcentaje</label><input type="text" name="totalporc" id="totalporc" class="form-control" readonly>
                </div>


            </div>






            <button type="button" class="btn btn-success" onclick="calcular()">Calcular</button>
            <button type="submit" id="btnhoras" name="btnhoras" class="btn btn-primary">Guardar</button>
            <a href="cargarhoras.php?idrol=<?php echo $array[0]  ?>"  class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</div>



<?php
include("../Template/footer.php");
?>


<script>
    function calcular() {
        //----------------------------1---------------------------------------
        var cc1 = document.getElementById('horasad').value;
        if (cc1 == "0") {

            document.getElementById('porcentajead').value = "0 ";
        } else {

            document.getElementById('porcentajead').value = 100 * cc1 / 160;

        }
        //--------------------------------------------------------------------


        //----------------------------2---------------------------------------
        var cc1 = document.getElementById('horasca').value;
        if (cc1 == "0") {

            document.getElementById('porcentajeca').value = "0 ";
        } else {

            document.getElementById('porcentajeca').value = 100 * cc1 / 160;

        }
        //--------------------------------------------------------------------


        //----------------------------3---------------------------------------
        var cc1 = document.getElementById('horasco').value;
        if (cc1 == "0") {

            document.getElementById('porcentajeco').value = "0 ";
        } else {

            document.getElementById('porcentajeco').value = 100 * cc1 / 160;

        }
        //--------------------------------------------------------------------


        //----------------------------4---------------------------------------
        var cc1 = document.getElementById('horasdi').value;
        if (cc1 == "0") {

            document.getElementById('porcentajedi').value = "0 ";
        } else {

            document.getElementById('porcentajedi').value = 100 * cc1 / 160;

        }
        //--------------------------------------------------------------------


        //----------------------------5---------------------------------------
        var cc1 = document.getElementById('horased').value;
        if (cc1 == "0") {

            document.getElementById('porcentajeed').value = "0 ";
        } else {

            document.getElementById('porcentajeed').value = 100 * cc1 / 160;

        }
        //--------------------------------------------------------------------

        //----------------------------6---------------------------------------
        var cc1 = document.getElementById('horasin').value;
        if (cc1 == "0") {

            document.getElementById('porcentajein').value = "0 ";
        } else {

            document.getElementById('porcentajein').value = 100 * cc1 / 160;

        }
        //--------------------------------------------------------------------

        //----------------------------8---------------------------------------
        var cc1 = document.getElementById('horaspo').value;
        if (cc1 == "0") {

            document.getElementById('porcentajepo').value = "0 ";
        } else {

            document.getElementById('porcentajepo').value = 100 * cc1 / 160;

        }
        //--------------------------------------------------------------------

        //----------------------------9---------------------------------------
        var cc1 = document.getElementById('horassa').value;
        if (cc1 == "0") {

            document.getElementById('porcentajesa').value = "0 ";
        } else {

            document.getElementById('porcentajesa').value = 100 * cc1 / 160;

        }
        //--------------------------------------------------------------------

        //----------------------------10---------------------------------------
        var cc1 = document.getElementById('horassm').value;
        if (cc1 == "0") {

            document.getElementById('porcentajesm').value = "0 ";
        } else {

            document.getElementById('porcentajesm').value = 100 * cc1 / 160;

        }
        //--------------------------------------------------------------------

        //----------------------------11---------------------------------------
        var cc1 = document.getElementById('horasub').value;
        if (cc1 == "0") {

            document.getElementById('porcentajeub').value = "0 ";
        } else {

            document.getElementById('porcentajeub').value = 100 * cc1 / 160;

        }
        //--------------------------------------------------------------------

        //----------------------------12---------------------------------------
        var cc1 = document.getElementById('horasun').value;
        if (cc1 == "0") {

            document.getElementById('porcentajeun').value = "0 ";
        } else {

            document.getElementById('porcentajeun').value = 100 * cc1 / 160;

        }
        //--------------------------------------------------------------------

        //----------------------------1---------------------------------------
        var cc1 = document.getElementById('horasvi').value;
        if (cc1 == "0") {

            document.getElementById('porcentajevi').value = "0 ";
        } else {

            document.getElementById('porcentajevi').value = 100 * cc1 / 160;

        }
        //--------------------------------------------------------------------




        var t1 = document.getElementById('horasad').value;
        var t2 = document.getElementById('horasca').value;
        var t3 = document.getElementById('horasco').value;
        var t4 = document.getElementById('horasdi').value;
        var t5 = document.getElementById('horased').value;
        var t6 = document.getElementById('horasin').value;
        var t7 = document.getElementById('horaspo').value;
        var t8 = document.getElementById('horassa').value;
        var t9 = document.getElementById('horassm').value;
        var t10 = document.getElementById('horasub').value;
        var t11 = document.getElementById('horasun').value;
        var t12 = document.getElementById('horasvi').value;



        var g1 = document.getElementById('porcentajead').value;
        var g2 = document.getElementById('porcentajeca').value;
        var g3 = document.getElementById('porcentajeco').value;
        var g4 = document.getElementById('porcentajedi').value;
        var g5 = document.getElementById('porcentajeed').value;
        var g6 = document.getElementById('porcentajein').value;
        var g7 = document.getElementById('porcentajepo').value;
        var g8 = document.getElementById('porcentajesa').value;
        var g9 = document.getElementById('porcentajesm').value;
        var g10 = document.getElementById('porcentajeub').value;
        var g11 = document.getElementById('porcentajeun').value;
        var g12 = document.getElementById('porcentajevi').value;



        var total = parseInt(t1) + parseInt(t2) + parseInt(t3) + parseInt(t4) + parseInt(t5) + parseInt(t6) + parseInt(t7) + parseInt(t8) + parseInt(t9) + parseInt(t10) + parseInt(t11) + parseInt(t12);


        var totalpor = parseFloat(g1) + parseFloat(g2) + parseFloat(g3) + parseFloat(g4) + parseFloat(g5) + parseFloat(g6) + parseFloat(g7) + parseFloat(g8) + parseFloat(g9) + parseFloat(g10) + parseFloat(g11) + parseFloat(g12);


        document.getElementById("totalhoras").value = total;
        document.getElementById("totalporc").value = totalpor;


        if (total > 160) {

            Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'El empleado tiene mas de 160 horas!'
                
            })

        }




    }
</script>