<?php


include '../../includes/menu.html';


?>

<!DOCTYPE html>
<html lang="en">


<body onload="document.getElementById('doc').focus()">


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../lib/wow/wow.min.js"></script>
    <script src="../../lib/easing/easing.min.js"></script>
    <script src="../../lib/waypoints/waypoints.min.js"></script>
    <script src="../../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../js/main.js"></script>
    <script src="../../js/jquery.min.js"></script>
</body>

</html>

<div class="container" align="center">
    <fieldset class="mb-4">

        <form class="dashboard-container FormularioAjax" method="" data-form="save" data-lang="es" autocomplete="off" >
            <input type="hidden" name="modulo_producto" value="registro">
            <fieldset class="mb-4">
                <legend><i class="fas fa-user"></i> &nbsp;AAAAAAAA</legend>
                <div class="container-fluid"><br>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="col-12 col-md-9">
                                <div class="form-outline mb-4">
                                    <label for="" class="nav-link"><i class="fas fa-id-card"></i> &nbsp;<strong>AAAAAA </strong></label>
                                    <input type="text" class="form-control" name="" id="" maxlength="" placeholder="" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="col-12 col-md-9">
                                <div class="form-outline mb-4">
                                    <div class="mb-4">
                                        <div class="form-outline mb-4">
                                            <label for="" class="nav-link"><i class="fas fa-user-tie"></i> &nbsp;<strong>AAAAAA</strong></label>
                                            <input type="text"  class="form-control" name="" id="" maxlength="" placeholder="" required ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </fieldset>
            <fieldset class="mb-4">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="col-12 col-md-9">
                                <div class="form-outline mb-4">
                                    <div class="mb-4">
                                        <label for="" class="nav-link"><i class="fas fa-map-marker"></i> &nbsp;<strong>AAAAAA </strong></label>
                                        <input type="text"  class="form-control" name="" id="" maxlength="" required>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <style>
                            option {
                                font-size: 12px
                            }
                        </style>
                        <div class="col-12 col-md-6">
                            <div class="col-12 col-md-9">
                                <div class="form-outline mb-6">
                                <label for="" class="nav-link"><i class="fas fa-phone"></i> &nbsp;<strong>AAAAAA </strong></label>
                                        <input type="text"  class="form-control" name="" id="" maxlength=""  required>
                                </div>
                            </div>
                        </div>
                    
    </fieldset>

    <fieldset class="mb-4">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="col-12 col-md-9">
                                <div class="form-outline mb-4">
                                    <div class="mb-4">
                                        <label for="" class="nav-link"><i class="fas fa-envelope"></i> &nbsp;<strong>AAAAA </strong></label>
                                        <input type="text"  class="form-control" name="" id=""  required>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <p class="text-center" style="margin-top: 40px;">
                            <button type="submit" class="btn btn-primary" name="save"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
                        </p>
                        <p class="text-center">
                            <small>Los campos marcados con son obligatorios</small>
                        </p>
    </fieldset>
    </form>

</div>
 <!-- Copyright End -->
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../../lib/wow/wow.min.js"></script>
        <script src="../../lib/easing/easing.min.js"></script>
        <script src="../../lib/waypoints/waypoints.min.js"></script>
        <script src="../../lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="../../lib/counterup/counterup.min.js"></script>
        
<script src="../../js/main.js"></script>
         <script>
        function mayus(e) {
        e.value = e.value.toUpperCase();
        }

        function minus(e) {
        e.value = e.value.toLowerCase();
        }
    </script>
    
    </body>
    $consulta_vehiculo = $con->prepare("SELECT * FROM vehiculo WHERE vehiculo.vehiculo_placa = vehiculo_placa;");
        $consulta_vehiculo->execute([]);
        $vehiculo = $consulta_vehiculo->fetch(PDO::FETCH_ASSOC);
        $cilindraje = $vehiculo['cilindraje_codg'];
        $tipo_vehiculo = $vehiculo['tipo_vehiculo_codg'];

        $consulta_cilindraje = $con->prepare("SELECT cilindraje_potencia FROM cilindraje, vehiculo WHERE cilindraje.cilindraje_codg= vehiculo.cilindraje_codg and vehiculo.vehiculo_placa = vehiculo_placa;");
        $consulta_cilindraje->execute([]);
        $cil = $consulta_cilindraje->fetch(PDO::FETCH_ASSOC);
        $cilindraje = $cil['cilindraje_potencia'];

        $consulta_tipo_vehiculo = $con->prepare("SELECT tipo_vehiculo_codg FROM vehiculo WHERE vehiculo_placa = vehiculo_placa;");
        $consulta_tipo_vehiculo->execute([]);
        $tipo_vehiculo = $consulta_tipo_vehiculo->fetch(PDO::FETCH_ASSOC);
        $tipo_vehiculo = $tipo_vehiculo['tipo_vehiculo_codg'];

        $consulta_avaluo = $con->prepare("SELECT avaluo_valor FROM vehiculo, avaluo, cilindraje where avaluo.avaluo_codg = cilindraje.avaluo_codg AND vehiculo.cilindraje_codg =cilindraje.cilindraje_codg and vehiculo.vehiculo_placa = vehiculo_placa;");
        $consulta_avaluo->execute([]);
        $avaluo = $consulta_avaluo->fetch(PDO::FETCH_ASSOC);
        $avaluo_valor = $avaluo['avaluo_valor'];

        $avaluo_codg = 0;
        
        
    
# calculo del impuesto a pagar por medio de condicionales
        if  ($tipo_vehiculo == 1){
            if ($cilindraje > 100 && $cilindraje < 149) {
                $impuesto = 205650;
                $avaluo_codg = 6;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.02));
                echo $impuesto_total;
                echo "<br/>";
                echo $cilindraje;
                echo "<br/>";
                echo $tipo_vehiculo;
                echo "<br/>";
                echo $avaluo_valor;
                echo "<br/>";
            }

            if ($cilindraje > 174 && $cilindraje < 273) {
                $impuesto = 316200;
                $avaluo_codg = 7;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.02) );
                echo $impuesto_total;
                echo "<br/>";
                echo $cilindraje;
                echo "<br/>";
                echo $tipo_vehiculo;
                echo "<br/>";
                echo $avaluo_valor;
                echo "<br/>";
            }

            if ($cilindraje > 274 ) {
                $impuesto = 411350;
                $avaluo_codg = 8;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.03) );
                echo $impuesto_total;
                echo "<br/>";
                echo $cilindraje;
                echo "<br/>";
                echo $tipo_vehiculo;
                echo "<br/>";
                echo $avaluo_valor;
                echo "<br/>";
            }

        
        }
        if  ($tipo_vehiculo == 2){
            if ($cilindraje < 1000 && $cilindraje < 2001 ) {
                $impuesto = 328900;
                $avaluo_codg = 1;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.02) );
                echo $impuesto_total;
                echo "<br/>";
                echo $cilindraje;
                echo "<br/>";
                echo $tipo_vehiculo;
                echo "<br/>";
                echo $avaluo_valor;
                echo "<br/>";
            }

            if ($cilindraje > 2001 && $cilindraje < 4001) {
                $impuesto = 415700;
                $avaluo = 2;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.02) );
                echo $impuesto_total;
                echo "<br/>";
                echo $cilindraje;
                echo "<br/>";
                echo $tipo_vehiculo;
                echo "<br/>";
                echo $avaluo_valor;
                echo "<br/>";
            }

            if ($cilindraje > 4499 ) {
                $impuesto = 487500;
                $avaluo = 3;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.03) );
                echo $impuesto_total;
                echo "<br/>";
                echo $cilindraje;
                echo "<br/>";
                echo $tipo_vehiculo;
                echo "<br/>";
                echo $avaluo_valor;
                echo "<br/>";
            }

         
        }

        if  ($tipo_vehiculo == 3){
            if ($cilindraje < 2500 && $cilindraje < 4499) {
                $impuesto = 410500;
                $avaluo_codg = 4;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.03) );
                echo $impuesto_total;
                echo "<br/>";
                echo $cilindraje;
                echo "<br/>";
                echo $tipo_vehiculo;
                echo "<br/>";
                echo $avaluo_valor;
                echo "<br/>";
            }


            if ($cilindraje > 4499 ) {
                $impuesto = 593100 ;
                $avaluo_codg = 5;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.04) );
                echo $impuesto_total;
                echo "<br/>";
                echo $cilindraje;
                echo "<br/>";
                echo $tipo_vehiculo;
                echo "<br/>";
                echo $avaluo_valor;
                echo "<br/>";
            }

           
        }
        else{
            echo "datos no validos";
        }