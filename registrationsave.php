 
<?php include("con1.php");
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
$q="INSERT INTO `login` (`id`, `username`, `password`,`user_image`, `name`, `address`, `city`, `pincode`, `state`, `country`, `gender`, `phone_no`, `email`) VALUES (NULL, '$username', '$password','$userimg', '$name', '$address', '$city', '$pincode', '$state', '$country', '$gender', '$mno', '$email')";
mysqli_query($con,$q);
header("location:login.php"); ?>


