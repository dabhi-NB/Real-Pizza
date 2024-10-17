<?php
include("con1.php");
$id = $_POST['id'];
$categoryname = $_POST['cname'];
$query = "UPDATE `category` SET `cname` = '$categoryname' WHERE `category`.`cid` = $id";
if (mysqli_query($con, $query)) {
	$qc = "select * from category where cid=$id";
	$rc = mysqli_query($con, $qc);
	$row = mysqli_fetch_array($rc);
	$cname = $row['cname'];
	$qi = "select * from `items` where `cname` = '$cname'";
	$ri = mysqli_query($con, $qi);
	$rowi = mysqli_fetch_array($ri);
	if ($rowi) {
		$qry = "UPDATE `items` SET `cname` = '$categoryname' WHERE `items`.`cname` = $rowi[2]";
		mysqli_query($con, $qry);
	}
}
header("location:categorymaster.php");
if ($result == NULL) { ?>
	<script>
		alert("Record Not Updated");
		window.location = "categorymaster.php";
	</script>
<?php
} else {
	header("location:categorymaster.php");
} ?>