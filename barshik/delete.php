<?php
require_once "connect.php";

$delete_product = $_GET['id'];

$delete_request = mysqli_query($connect, "DELETE FROM `Product` WHERE Id_product = '$delete_product'");
header('location:product-control-panel.php');

?>