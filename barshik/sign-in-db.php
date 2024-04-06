<?php
require_once "connect.php";

// $email = $_POST['email'];
// $pass = $_POST['pass'];

// $passed = mysqli_query($connect, " INSERT INTO `Users`(`User_id`, `Email`, `Password_hash`, `Bonus_points`) VALUES (NULL,'$email','$pass','0'");
// $passed_check = mysqli_fetch_assoc($passed);


$email = $_POST['email'];
$pass = $_POST['pass'];

$querryUser = mysqli_query($connect, "SELECT * FROM `Users` WHERE Email = '$email' and Password_hash = '$pass'");
$querryUser = mysqli_fetch_assoc($querryUser);
if($email != 'admin@mail.com' and $pass != 'admin'){
    header("Location: profile.html");
} else{
    header("Location: admin-page.html");
}

?>