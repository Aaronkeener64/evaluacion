<?php
require 'conexion.php';
$db = new Database();
$con = $db->conectar();

if (isset($_POST['liquidar'])) {
    if (empty($_POST['vehiculo_placa']) || empty($_POST['liquidacion_fecha'])) {
        echo "<script>alert('Datos no completos.')</script>";
        echo "<script>window.location='index.php'</script>";
    } else {

#taer los datos y asignarlos
        $impuesto = 0;
        $avaluo = 0;
        $liquidacion_codg = $_POST['liquidacion_codg'];
        $liquidacion_fecha = $_POST['liquidacion_fecha'];
        $vehiculo_placa = $_POST['vehiculo_placa'];
        $fecha1 = 0;

        

# todas las consultas necesarias para las consultas de datos
$consulta = $con->prepare("SELECT COUNT(*) AS cantidad FROM liquidacion WHERE liquidacion_fecha = ? AND vehiculo_placa = ?");
$consulta->execute([$liquidacion_fecha, $vehiculo_placa]);
$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

if ($resultado && $resultado['cantidad'] > 0) {
    echo "<script>alert('Este año ya está ingresado.');</script>";
    echo "<script>window.location='index.php'</script>";
} else {
        
    

        $consulta_vehiculo = $con->prepare("SELECT * FROM vehiculo WHERE vehiculo.vehiculo_placa = ?;");
        $consulta_vehiculo->execute([$vehiculo_placa]);
        $vehiculo = $consulta_vehiculo->fetch(PDO::FETCH_ASSOC);
        $cilindraje = $vehiculo['cilindraje_codg'];
        $tipo_vehiculo = $vehiculo['tipo_vehiculo_codg'];

        $consulta_cilindraje = $con->prepare("SELECT cilindraje_potencia FROM cilindraje, vehiculo WHERE cilindraje.cilindraje_codg= vehiculo.cilindraje_codg and vehiculo.vehiculo_placa = ?;");
        $consulta_cilindraje->execute([$vehiculo_placa]);
        $cil = $consulta_cilindraje->fetch(PDO::FETCH_ASSOC);
        $cilindraje = $cil['cilindraje_potencia'];

        $consulta_tipo_vehiculo = $con->prepare("SELECT tipo_vehiculo_codg FROM vehiculo WHERE vehiculo_placa = ?;");
        $consulta_tipo_vehiculo->execute([$vehiculo_placa]);
        $tipo_vehiculo = $consulta_tipo_vehiculo->fetch(PDO::FETCH_ASSOC);
        $tipo_vehiculo = $tipo_vehiculo['tipo_vehiculo_codg'];

        $consulta_avaluo = $con->prepare("SELECT avaluo_valor FROM vehiculo, avaluo, cilindraje where avaluo.avaluo_codg = cilindraje.avaluo_codg AND vehiculo.cilindraje_codg =cilindraje.cilindraje_codg and vehiculo.vehiculo_placa = ?;");
        $consulta_avaluo->execute([$vehiculo_placa]);
        $avaluo = $consulta_avaluo->fetch(PDO::FETCH_ASSOC);
        $avaluo_valor = $avaluo['avaluo_valor'];

        $consulta_avaluo = $con->prepare("SELECT avaluo_codg FROM vehiculo, cilindraje where vehiculo.cilindraje_codg =cilindraje.cilindraje_codg and vehiculo.vehiculo_placa = ?;");
        $consulta_avaluo->execute([$vehiculo_placa]);
        $avaluo = $consulta_avaluo->fetch(PDO::FETCH_ASSOC);
        $avaluo_codg = $avaluo['avaluo_codg'];
        
        $fecha = $con->prepare("SELECT liquidacion_fecha FROM liquidacion WHERE liquidacion.vehiculo_placa = ?;");
        $fecha->execute([$fecha1]);
        $fecha1 = $fecha->fetch(PDO::FETCH_ASSOC);


        
    
# calculo del impuesto a pagar por medio de condicionales
        if  ($tipo_vehiculo == 1){
            if ($cilindraje > 100 && $cilindraje < 149) {
                $impuesto = 205650;
                $avaluo_codg = 6;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.02));
                
            }

            if ($cilindraje > 174 && $cilindraje < 273) {
                $impuesto = 316200;
                $avaluo_codg = 7;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.02) );
                
            }

            if ($cilindraje > 274 ) {
                $impuesto = 411350;
                $avaluo_codg = 8;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.03) );
                
            }

        
        }
        if  ($tipo_vehiculo == 2){
            if ($cilindraje < 1000 && $cilindraje < 2001 ) {
                $impuesto = 328900;
                $avaluo_codg = 1;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.02) );
                
            }

            if ($cilindraje > 2001 && $cilindraje < 4001) {
                $impuesto = 415700;
                $avaluo = 2;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.02) );
                
            }

            if ($cilindraje > 4499 ) {
                $impuesto = 487500;
                $avaluo = 3;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.03) );
               
            }

         
        }

        if  ($tipo_vehiculo == 3){
            if ($cilindraje > 2499 && $cilindraje < 4501) {
                $impuesto = 410500;
                $avaluo_codg = 4;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.03) );
                
            }


            if ($cilindraje > 4599 ) {
                $impuesto = 593100 ;
                $avaluo_codg = 5;
                $impuesto_total = $impuesto + (($avaluo_valor * 0.04) );
                
            }

           
        }
        else{
            
        }
    }
        
       
               
        
                
                $estado = 1;
                
                #codigo para insertar los datos
                
                    $agregar = $con->prepare("INSERT INTO liquidacion( liquidacion_fecha, vehiculo_placa,  avaluo_codg , impuesto_total, estado_codg) VALUES (?, ?,  ?, ?,?)");
                    $agregar->execute([ $liquidacion_fecha, $vehiculo_placa , $avaluo_codg, $impuesto_total, $estado]);
                    echo "<script>alert('se registro de manera exitosa')</script>";
                    

            

    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    <title>Botón de Aceptar</title>
<style>
  /* Estilos CSS */
  .boton-contenedor {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50vh; /* La mitad de la altura de la pantalla */
    width: 100%; /* El ancho completo de la pantalla */
  }

  .boton-aceptar {
    padding: 10px 20px;
    font-size: 20px;
    cursor: pointer;
    border: none;
    background-color: #4CAF50; /* Color verde */
    color: white;
    border-radius: 5px;
  }
</style>
</head>
<body>
 <form action= "recibe.php">
<div class="boton-contenedor">
  <button type="submit" name="calculo" class="boton-aceptar">Aceptar</button>
</div>
</form>
        <?php }?>
        <?php }?>
    </body>
    </html>