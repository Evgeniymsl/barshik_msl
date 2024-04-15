<?php
require_once "connect.php";

$id = isset($_POST['id'])?$_POST['id']:false;
$name = isset($_POST['name'])?$_POST['name']:false;
$category = isset($_POST['category'])?$_POST['category']:false;
$price = isset($_POST['price'])?$_POST['price']:false;
$description = isset($_POST['desc'])?$_POST['desc']:false;
$new_info =mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `Product`
 inner join Category on Product.`Category_id` = Category.Category_id 
 where `Id_product` = $id"));
 var_dump($category);
$check_update = false;
$query_update = "UPDATE Product SET ";
if ($new_info["Name"] != $name) {
    $query_update .= "name = '$name', ";
    $check_update = true;
}
if ($new_info["Category_id"] != $category) {
    $query_update .= "Category_id = '$category', ";
    $check_update = true;
}
if ($new_info["Price"] != $price) {
    $query_update .= "price = '$price', ";
    $check_update = true;
}
if ($new_info["Description"] != $description) {
    $query_update .= "description = '$description', ";
    $check_update = true;
}


if ($check_update) {
    $query_update = substr($query_update, 0, -2);
    $query_update .= " WHERE Id_product = $id";
    $result = mysqli_query($connect, $query_update);
 if($result){
    
 }
}
header('location:product-control-panel.php');



// $result = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * from `Product` WHERE Id_product = '$id'"));

// if($result['name'] != $name ){

// }
// $update_request = mysqli_query($connect, "DELETE FROM `Product` WHERE Id_product = '$delete_product'");


    // if($id and $name and $price and $category and $description){
    //     $update_product = mysqli_query($connect, UPDATE `Product` SET `Id_product`='[value-1]',`Name`='[value-2]',`Description`='[value-3]',`Category_id`='[value-4]',`Price`='[value-5]',`Image`='[value-6]')
    // }
?>