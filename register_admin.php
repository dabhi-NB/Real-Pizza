<?php
include 'con1.php';
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query1 = "INSERT INTO `admin` (`username`, `password`) VALUES ( '$username', '$password');";
	$result = mysqli_query($con, $query1);
	header("location:admin_accounts.php");
	if ($result == NULL) { ?>
		<script>
			alert("Record Not inserted");
			window.location = "admin_accounts.php";
		</script>
<?php
	} else {
		header("location:admin_accounts.php");
	}
}
include 'mainheader.php' ?>
<center>
	<div class="border1" style="width: 750px;">
		<form action="" method="post" enctype="multipart/form-data">
			<h1 align="center">
				<font color='WHITE' size='+5'><u>Add New Admin </u></font>
			</h1>
			<table align="center">
				<tr>
					<td>
						<font color='#fac564' size='+3'> </font>
					</td>
					<td><input type="text" name="id" hidden></td>
				</tr>
				<tr>
					<td>
						<font color='#fac564' size='+3'>Username
					</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>
						<font color='#fac564' size='+3'>Password
					</td>
					<td><input type="text" name="password"></td>
				</tr>
				<tr>
					<td align="center">
					<input name="submit" type="submit" value="Add" class="btn1 btnhover">
					</td>
					<td align="center">
						<input name="reset" type="reset" value="Clear">
					</td>
				</tr>
			</table>
			<br><br>
</center>
</form>
<?php include 'footer.php' ?>