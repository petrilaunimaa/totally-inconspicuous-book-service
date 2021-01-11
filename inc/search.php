<?php
$productid=filter_input(INPUT_GET,'productid',FILTER_SANITIZE_SPECIAL_CHARS);
$kategoria=filter_input(INPUT_GET,'kategoria',FILTER_SANITIZE_SPECIAL_CHARS);
$hakusana=filter_input(INPUT_GET,'query',FILTER_SANITIZE_SPECIAL_CHARS);
if ($hakusana) {
    $sql = "SELECT * FROM books WHERE lower(name) LIKE lower('%$hakusana%') OR lower(author) LIKE lower('%$hakusana%')";
    //require_once 'inc/kirjahaku.php';
    require_once 'inc/kirjahakuV2.php';
} elseif  ($kategoria){
    $sql = "SELECT * FROM books WHERE category LIKE '%$kategoria%'";
    require_once 'inc/kirjahakuV2.php';
} elseif  ($productid){
    $sql = "SELECT * FROM products WHERE productid LIKE '%$productid%'";
    require_once 'inc/tuotehaku.php';
} else {
    $sql="SELECT * FROM books";
}
?>