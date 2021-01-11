<?php
session_start();
session_regenerate_id();
$tietokanta = new PDO('mysql:host=localhost;dbname=bookservice;charset=utf8','testuser','testpass');
$tietokanta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$tietokanta = null; 
$rekuesti=substr($_SERVER['REQUEST_URI'],1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tuote_id = filter_input(INPUT_POST,'bookid',FILTER_SANITIZE_NUMBER_INT);
    $product_id = filter_input(INPUT_POST,'productid',FILTER_SANITIZE_NUMBER_INT);
    if ($tuote_id) {
        array_push($_SESSION['kori'],$tuote_id);
    } else if ($product_id) {
        array_push($_SESSION['tuotekori'],$product_id);
    }
}


require 'inc/top.php';
?>

<main class="container-fluid bg-light text-dark">
<?php require_once 'inc/main.php';?>
    
</main>
<?php require_once 'inc/bottom.php';?>


