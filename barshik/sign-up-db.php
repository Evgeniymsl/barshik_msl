<?php
require_once "connect.php";

$email = $_POST['email'];
$pass = $_POST['pass'];
$pass_check = $_POST['pass_check'];

if($pass === $pass_check){
    $add = mysqli_query($connect, "INSERT INTO `Users`(`User_id`, `Email`, `Password_hash`, `Bonus_points`) VALUES (null,'$email','$pass','0')");
    var_dump($add);
}
?>