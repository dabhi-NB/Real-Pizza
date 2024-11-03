<?php
include("con1.php");
$category=$_POST['category'];
$itemnm=$_POST['itemnm'];
$price=$_POST['price'];
$image=$_FILES['im']['name'];
$desc=$_POST['desc'];
move_uploaded_file($_FILES['im']['tmp_name'],"./IMAGE_PROJECT/".$image);
mysqli_query($con,"INSERT INTO `items`( `itemname`,`cname`, `price`, `image`,`desc`) 
VALUES ('$itemnm','$category', '$price', '$image','$desc')"); 
header("location:itemmaster.php");
?>