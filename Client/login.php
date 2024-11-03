<?php
include('header.php');
if (isset($_SESSION['user_id'])) {
	header("location:index.php");
}
?>
<body>
	<script src="js/main.js"></script>
	<script src="js/jquery.ba-cond.min.js"></script>
	<script src="js/jquery.slitslider.js"></script>
	<br><br>
	<center>
		<h1 align="center">
			<font size="+5" color=""><b><u> LOGIN </u></b></font>
		</h1>
		<form action="checklogin.php" method="post" name="login" onSubmit="return validateForm()">
			<div class="border" style="width: 750px;">
				<font size="+2">
					<table align="center" size="80%">
						<tr>
							<td><input type="text" name="id" hidden></td>
						<tr>
							<td class="wcolor"><b> Username : </b></td>
							<td> <input type="text" name="username" required></td>
						</tr>
						<tr>
							<td class="wcolor"><b> Password : </b></td>
							<td><input type="password" name="password" required></td>
						</tr>
						<tr>
							<td align="center"><input name="reset" type="reset" value="Clear"></td>
							<td align="center"><input name="submit" type="submit" value="Login" class="btn1 btnhover"></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><br>
								<h3>Need an account? <a href="registration.php" class="">Sign up now!</a></h3>
							</td>
						</tr>
					</table>
			</div>
			</font>
			<?php include("footer.php"); ?>