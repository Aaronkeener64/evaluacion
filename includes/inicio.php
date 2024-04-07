<?php 
require '../config/database.php';
require '../config/config.php';
$db = new Database();
$con = $db->conectar();

if($_POST["inicio"])
{
    
    $usuario = $_POST["usuario"];
	$clave = $_POST["clave"];
    if ($usuario == "" || $clave == "")
    {
        echo"<script>alert('Datos Vacios')</script>";
	    echo"<script>window.location='../login.php'</script>";
    }
    else
    {
        $sql = $con->prepare("SELECT * FROM user WHERE user.doc = $usuario AND user.contra = '$clave' AND user.id_estado = '1' ");
        $sql->execute();
        $fila = $sql->fetch();
        
        if ($fila) {
            $_SESSION['usuario'] = $fila['doc'];
            $_SESSION['tipo'] = $fila['id_tip_user'];
            $_SESSION['estado'] = $fila['id_estado'];
            if ($_SESSION['tipo'] == 2) {
                header("Location: ../instructor/projects/index.php");
                exit();
            }
            if ($_SESSION['tipo'] == 1) {
                header("Location: ../sesion_admin/projects/index.php");
                exit();
            }
        }
        else
        {
            echo"<script>alert('Credenciales invalidas o usuario inactivo.')</script>";
            echo"<script>window.location='../index.php'</script>";
            exit();
        }
}
}	
?>