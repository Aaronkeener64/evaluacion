<?php
require '../config/config.php';
require '../config/database.php';

$db = new Database();
$con = $db->conectar();



$query_usuarios=$con->prepare ("SELECT * FROM user, tip_user WHERE document = '".$_SESSION['usuario']."' AND user.id_tip_user = tip_user.id_tip_user");
$query_usuarios->execute();
$row_user = $query_usuarios->fetch(PDO::FETCH_ASSOC);
$documento = $row_user['document'];
$fecha_pago = date("Y-m-d");
$fecha_venc = strtotime($fecha_pago."+ 1 years");
$fecha_venc = date("Y-m-d", $fecha_venc);
$json = file_get_contents('php://input');
$datos = json_decode($json, true);

// echo '<pre>';
// print_r($datos);
// echo '</pre>';
// echo $documento;
if(is_array($datos))
{

    //acceder a los datos de la compra que envia paypal

    $id_transaccion = $datos['detalles']['purchase_units']['0']['payments']['captures']['0']['id'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $status = $datos['detalles']['status'];
    $email = $datos['detalles']['payer']['email_address'];
    

    $id_cliente = $datos['detalles']['payer']['payer_id'];
    $nombre = $datos['detalles']['payer']['name']['given_name'];
    $ape = $datos['detalles']['payer']['name']['surname'];
    $val=  $datos['detalles']['purchase_units']['0']['amount']['value']; 

     
    if (!$id_transaccion ){
    
       
        echo '<pre>';
    
    
     echo $id_transaccion;
    
     echo $status;
     echo $fecha_nueva;
     echo $email;
     echo $id_cliente;
     echo $nombre;
     echo $ape;
     echo $val;
     echo '</pre>';
       

    }
    else
    {   
       
      //insertarmos estos datos obtenidos a la tabla
    
      $sql = $con->prepare("INSERT INTO pago_suscr (documento, fecha_pago, fecha_venc, id_transaccion, status, email, id_cliente, total) 
      VALUES (?,?,?,?,?,?,?,?)");
      $sql->execute([$documento, $fecha_pago, $fecha_venc, $id_transaccion,  $status, $email, $id_cliente, $val]);
      $id = $con->lastInsertId();
    
      // if ($id > 0) 
      // {
      //   $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
      //   if ($productos != null) 
      //   {
      //     foreach ($productos as $clave => $cantidad) {
      //       $sql = $con->prepare("SELECT id_cur, nom_cur, prec_cur, FROM curso WHERE id_cur=? ");
      //       $sql->execute([$clave]);
      //       $row_prod = $sql->fetch(PDO::FETCH_ASSOC);
      //       $precio = $row_prod['prec_cur'];

      //       $sql_compra = $con->prepare("INSERT INTO detalle_compra (id_compra, id_cur, nombre, precio, cantidad) VALUES (?,?,?,?,?)");

      //     }
      //   }
      // }
      unset($_SESSION['carrito']);
    }
    
}



?>




