<?php
require_once "connect.php";
$new_name = $_POST['new_name'];
$new_cat = $_POST['new_category'];
$new_price = $_POST['new_price'];
$new_desc = $_POST['new_desc'];

$add_product = mysqli_query($connect, "INSERT INTO `Product`(`Id_product`, `Name`, `Description`, `Category_id`, `Price`, `Image`) VALUES (null,'$new_name','$new_desc','$new_cat','$new_price','image')");
var_dump($add_product);
header('location:product-control-panel.php');

?>