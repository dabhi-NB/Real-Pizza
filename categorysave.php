<?php
include("con1.php");
$categorynm=$_POST['cname'];
mysqli_query($con,"INSERT INTO `category` (`cid`, `cname`) VALUES (NULL, '$categorynm')"); 
header("location:categorymaster.php");
?>
 

	