<?php
require 'conexion.php';
$db = new Database();
$con = $db->conectar();
#conexion a base de datos

if (isset($_POST['calculo'])) {
    if (empty($_POST['vehiculo_placa']) || empty($_POST['liquidacion_fecha'])) {
        echo "<script>alert('Datos no completos.')</script>";
        echo "<script>window.location='index.php'</script>";
    } else {
#taer los datos y asignarlos
        $impuesto_total = $_POST['impuesto_total'] ;
        $avaluo = $_POST['avaluo_codg'];
        $liquidacion_codg = $_POST['liquidacion_codg'];
        $liquidacion_fecha = $_POST['liquidacion_fecha'];
        $vehiculo_placa = $_POST['vehiculo_placa'];
        

    
        
            
            
                
        }
       
    

}
if(isset($_POST['pagar'])) {
    // Correct retrieval from $_POST
    $liquidacion_codg = $_POST['liquidacion_codg'];
    
    // Assuming $con is already connected and is a PDO instance
    $editar = $con->prepare("UPDATE liquidacion SET estado_codg = 2 WHERE liquidacion_codg = ?");
    $editar->execute([$liquidacion_codg]);

    // Redirect to avoid form re-submission
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;

echo "<script>alert('Datos .')</script>";
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Menu Administador</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/logo3.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="carpeta1/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="carpeta1/style.css" rel="stylesheet">
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="carpeta2/main.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body onload="document.getElementById('doc').focus()">

<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0 pe-5">
        <a href="index.php" class="navbar-brand ps-5 me-0">
        <img src="img/logo3.png">
        </a>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
           
               
                
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Liquidacion</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="index.php" class="dropdown-item ">calculo de liquidacion</a>
                        
                    </div>
                </div>
                
                
                </div>
            </div>
            
    </nav>

<div class="container" align="center">
    <fieldset class="mb-4">
    <legend><i class="fas fa-user"></i> &nbsp;Registro de liquidaciones</legend>
    <div class="container">
    <?php
        $insert = $con->prepare ('SELECT * FROM liquidacion, avaluo where estado_codg = 1 and liquidacion.avaluo_codg = avaluo.avaluo_codg');
        $insert->execute();
        $resul = $insert->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
        <div class="row"><br>
            <div class="col">
               <strong>Año liquidacion</strong>
            </div>
            <div class="col">
                <strong>Placa del vehiculo</strong>
            </div>
            <div class="col">
                <strong>Fecha pago</strong>
            </div>
            <div class="col">
                <strong>avaluo del vehiculo</strong>
            </div>
            <div class="col">
                <strong>impuesto a pagar</strong>
            </div>
            <div class="col">
                <strong>acciones</strong>
            </div>
             
            
        </div>
        <div class="row">
            
        <table>
            
            <div class="card shadow-sm">
            <?php foreach ($resul as $row) {  ?>

                <tr>
                    <td><?php echo $row["liquidacion_fecha"]; ?></td>
                    <td><?php echo $row["vehiculo_placa"]; ?></td>
                    <td><?php echo $row["fecha_pago"]; ?></td>
                    <td><?php echo $row["avaluo_valor"]; ?></td>
                    <td><?php echo $row["impuesto_total"]; ?></td>
                    <td>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" class="form-control" name="liquidacion_codg" value="<?php echo $row["liquidacion_codg"]; ?>" placeholder="codigo" required>
                        <button type="submit" class="btn btn-primary"  name="pagar">pagar</button>
                    </form>
                </td>
            </tr>
            <?php }?>

    </div>
     </table>
                    
        </div>
    </div>
            
    <br><br>

</div>
<script>
        function mayus(e) {
        e.value = e.value.toUpperCase();
        }

        function minus(e) {
        e.value = e.value.toLowerCase();
        }
    </script>
</body>

</html>
