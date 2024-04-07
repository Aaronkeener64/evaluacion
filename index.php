
<?php

require 'conexion.php';
$db = new Database();
$con = $db->conectar();


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

</head>

<body>
    
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

 <!-- Navbar Start -->
 <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0 pe-5">
        <a href="index.php" class="navbar-brand ps-5 me-0">
        <img src="img/logo3.png">
        </a>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
           
               
                
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">REPORTES</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="report.php" class="dropdown-item ">Reportes liquidacion</a>
                        
                    </div>
                </div>
                
                
                </div>
            </div>
            
    </nav>
    <div class="container" align="center">
    <fieldset class="mb-4">

        <form class="dashboard-container FormularioAjax" method="post" action="calculo.php" data-form="save" data-lang="es" autocomplete="off" >
            <input type="hidden" name="modulo_producto" value="registro">
            <fieldset class="mb-4">
                <legend><i class="fas fa-user"></i> &nbsp;liquidacion</legend>
                <div class="container-fluid"><br>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="col-12 col-md-9">
                                <div class="form-outline mb-4">
                                <input type="hidden" class="form-control" name="liquidacion_codg" >
                                <input type="hidden" class="form-control" name="fecha_pago" >
                                    <label for="" class="nav-link"><i class="fas fa-id-card"></i> &nbsp;<strong>Año de la liquidacion </strong></label>
                                    <select class="form-control" name="liquidacion_fecha" id="liquidacion_fecha" type="submit" required>
                                        <option value="" select="">Año</option>
                                            <option value="2000" select="">2000</option>
                                            <option value="2001" select="">2001</option>
                                            <option value="2002" select="">2002</option>
                                            <option value="2003" select="">2003</option>
                                            <option value="2004" select="">2004</option>
                                            <option value="2005" select="">2005</option>
                                            <option value="2006" select="">2006</option>
                                            <option value="2007" select="">2007</option>
                                            <option value="2008" select="">2008</option>
                                            <option value="2009" select="">2009</option>
                                            <option value="2010" select="">2010</option>
                                            <option value="2011" select="">2011</option>
                                            <option value="2012" select="">2012</option>
                                            <option value="2013" select="">2013</option>
                                            <option value="2014" select="">2014</option>
                                            <option value="2015" select="">2015</option>
                                            <option value="2016" select="">2016</option>
                                            <option value="2017" select="">2017</option>
                                            <option value="2018" select="">2018</option>
                                            <option value="2019" select="">2019</option>
                                            <option value="2020" select="">2020</option>
                                            <option value="2021" select="">2021</option>
                                            <option value="2022" select="">2022</option>
                                            <option value="2023" select="">2023</option>
                                            <option value="2024" select="">2024</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="col-12 col-md-9">
                                <div class="form-outline mb-4">
                                    <div class="mb-4">
                                        <div class="form-outline mb-4">
                                        <label for="" class="nav-link"><i class="fas fa-map-marker"></i> &nbsp;<strong>Placa del vehiculo</strong></label>
                                        <select class="form-control" name="vehiculo_placa" id="vehiculo_placa" type="submit" required>
                    <option value="" select="">Placa</option>
                    <?php
                    $statement = $con->prepare('SELECT * FROM vehiculo');
                    $statement->execute();
                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=" . $row['vehiculo_placa'] . ">" . $row['vehiculo_placa'] . "</option>";
                    }
                    ?>
                </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </fieldset>
            
                                

                        <p class="text-center" style="margin-top: 40px;">
                            <button type="submit" class="btn btn-primary" name="liquidar"><i class="far fa-save"></i> &nbsp; Liquidar</button>
                        </p>
                        
                        <p class="text-center">
                            <small>Los campos marcados con son obligatorios</small>
                        </p>
    </fieldset>
    </form>
    

                

    
   

    <!-- JavaScript Libraries -->
    
</body>

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
</html>
