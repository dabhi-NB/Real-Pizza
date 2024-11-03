<?php
include("con1.php");
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];
mysqli_query($con, "INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`) VALUES (NULL, '$name', '$email', '$subject', '$msg')");
header("location:index.php"); ?>
