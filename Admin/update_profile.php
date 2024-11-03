<?php
include 'con1.php';
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query1 = "UPDATE `admin` SET `username` = '$username', `password` = '$password' WHERE `admin`.`id` = $id";
	$result = mysqli_query($con, $query1);
	header("location:admin_accounts.php");
	if ($result == NULL) { ?>
		<script>
			alert("Record Not Updated");
			window.location = "admin_accounts.php";
		</script>
<?php
	} else {
		header("location:admin_accounts.php");
	}
}
 include 'mainheader.php';
$id = $_GET['id'];
$query = "select * from admin where id=$id";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)) {
?><center>
		<div class="border1" style="width: 850px;">
			<form action="update_profile.php" method="post" enctype="multipart/form-data">
				<h1 align="center">
					<font color='WHITE' size='+5'><u> Profile Update </u></font>
				</h1>
				<table align="center">
					<tr>
						<td>
							<font color='#fac564' size='+3'> </font>
						</td>
						<td><input type="text" name="id" value="<?php echo $row['0']; ?>" hidden></td>
					</tr>
					<tr>
						<td>
							<font color='#fac564' size='+3'>Username
						</td>
						<td><input type="text" name="username" value="<?php echo $row['1']; ?>"></td>
					</tr>
					<tr>
						<td>
							<font color='#fac564' size='+3'>Password
						</td>
						<td><input type="text" name="password" value="<?php echo $row['2']; ?>"></td>
					</tr>
					<tr>
						<td align="center">
							<input name="submit" type="submit" value="update" class="btn1 btnhover">

						</td>
						<td align="center">
							<input name="reset" type="reset" value="Clear">
						</td>
					</tr>
				</table>
				<br><br>
	</center>
	</form>
<?php }  include 'footer.php' ?>