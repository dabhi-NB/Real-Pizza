<?php
include("con1.php");
$id = $_POST['id'];
$itemname = $_POST['itemname'];
$company = $_POST['category'];
$size = $_POST['size'];
$price = $_POST['price'];
$image = $_FILES['im']['name'];
$desc = $_POST['desc'];
move_uploaded_file($_FILES['image']['tmp_name'], "img/" . $image);
$query = "UPDATE `items` SET `itemname` = '$itemname', `cname` = '$company', `price` = '$price', `image` = '$image',  `desc` = '$desc' WHERE `items`.`id` = $id";
mysqli_query($con, $query);
header("location:itemmaster.php");
if ($result == NULL) { ?>
	<script>
		alert("Record Not Updated");
		window.location = "Itemmaster.php";
	</script>
<?php
} else {
	header("location:Itemmaster.php");
}
?>