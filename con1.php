<?php
$con=mysqli_connect("localhost:8080","root","");
mysqli_select_db($con,"pizza");
$db_name = 'mysql:host=localhost:8080;dbname=pizza';
$user_name = 'root';
$user_password = '';
$conn = new PDO($db_name, $user_name, $user_password);
?>
