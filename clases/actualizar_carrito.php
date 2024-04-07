<?php
require '../config/config.php';
require '../config/database.php';
//funcion para que al seleccionar mas articulos se actualice el precio
if(isset($_POST['action']))
{
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;
    
    if($action == 'agregar')
    {
        $cantidad = isset($_POST['cantidad']) ? ($_POST['cantidad']) : 0;
        $respuesta = agregar($id, $cantidad);
        if ($respuesta > 0)
        {
            $datos['ok'] = true;
        }
        else
        {
            $datos['ok'] = false;
        }
        $datos['sub'] = moneda . number_format($respuesta, 2, '.', ',');
    }
    else if($action == 'eliminar')
    {

        $datos['ok'] = eliminar($id);
    }
    
    else
    {
        $datos['ok'] = false;
    }
    
}else
{
    $datos['ok'] = false;
}

echo json_encode($datos);
function agregar($id, $cantidad){
    $res = 0;
    if ($id > 0 && $cantidad > 0 && is_numeric(($cantidad))){
        if(isset($_SESSION['carrito']['productos'][$id])){
            $_SESSION['carrito']['productos'][$id] = $cantidad;

            $db = new Database();
            $con = $db->conectar();
            $sql = $con->prepare("SELECT prec_cur FROM curso WHERE id_cur=? limit 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $precio = $row['prec_cur'];
            
            
            $res = $cantidad * $precio;

            return $res;
        }
    }
    else{
        return $res;
    }
}


// funcionPara eliminar el articulo de la compra

function eliminar($id){
    if($id > 0){
        if(isset($_SESSION['carrito']['productos'][$id])){
            unset($_SESSION['carrito']['productos'][$id]);
            return true;
        }
    }
    else{
        return false;
    }
}

?>