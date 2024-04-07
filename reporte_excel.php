<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<?php 
 

require 'conexion.php';

$db = new Database();
$con = $db->conectar();

header("Content-type:aplication/vnd.ms-excel");
header("Content-Disposition:attachment; filename=fecha.xls");
header('Cache-Control:max-age=0');


?>


<?php
$insert = $con->prepare("SELECT liquidacion.liquidacion_codg, liquidacion.liquidacion_fecha , liquidacion.vehiculo_placa, liquidacion.fecha_pago, avaluo.avaluo_valor, liquidacion.impuesto_total, estados.estado_nom FROM liquidacion JOIN vehiculo ON Liquidacion.vehiculo_placa = vehiculo.vehiculo_placa INNER JOIN estados ON liquidacion.estado_codg = estados.estado_codg INNER JOIN avaluo ON liquidacion.avaluo_codg = avaluo.avaluo_codg ;");
$insert->execute();
/***la variable $resultado1 es la que me va a guardar toda la informacion de la consulta */
$resultado1= $insert->fetchAll(PDO::FETCH_ASSOC);
$i=0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

        


      <table class="table table-hover">
  <thead>
  <tr class="table-light">
                    
                    <td>Año liquidacion</td>
                    <td>placa del vehiculo</td>
                    <td>fecha de pago</td>
                    <td>avaluo</td>
                    <td>impuesto total</td>
                    <td>estado</td>



                </tr>
  </thead>
  <tbody>
  <?php foreach ($resultado1 as $row)
                {
                $i++; ?>


                <tr class="table-active">
                    

                
                        <td><?php echo $row["liquidacion_fecha"]; ?></td>
                        <td><?php echo $row["vehiculo_placa"]; ?></td>
                        <td><?php echo $row["fecha_pago"]; ?></td>
                        <td><?php echo $row["avaluo_valor"]; ?></td>
                        <td><?php echo $row["impuesto_total"]; ?></td>
                        <td><?php echo $row["estado_nom"]; ?></td>
                        
                        
              

                </tr>


                <?php }?>

  </tbody>
</table>

      
      </div>
      

</body>
</html>