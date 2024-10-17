 

<?php include("con1.php");
$id=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];
$userimg=$_POST['userimg'];
$name=$_POST['nm'];
$address=$_POST['address'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$state=$_POST['state'];
$country=$_POST['country'];
$gender=$_POST['gender'];
$mno=$_POST['mno'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$query="UPDATE `login` SET `user_image`='$userimg',`name` = '$name', `address` = '$address', `city` = '$city', `pincode` = '$pincode', `state` = '$state', `country` = '$country', `gender` = '$gender', `phone_no` = '$mno', `email` = '$email' WHERE `login`.`id` = $id";
mysqli_query($con,$query);
header("location:user.php");?>
 
