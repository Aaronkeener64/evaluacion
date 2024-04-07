<?php
session_start();
define("KEY_TOKEN", "ABCsasd-/1*Q2");
define('moneda', '$');
define("CLIENTE_ID", "AcWizc4s7EhPZf1_lqqbj2smI0zCDF-bwaeTlwiuM6aUQxO6FL3zZ81NxrPZ9sC_HMH1qffjZWPeHRE7");
define("CURRENCY", "USD");
define('totalhoras', '');


$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}






?>