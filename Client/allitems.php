<?php include("mainheader.php"); ?>
<div class=" navbar-collapse collapse show" id="ftco-nav">
	<ul class="navbar-nav ml-auto">
		<li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
		<li class="nav-item "><a href="menu.php" class="nav-link">Our Menu</a></li>
		<li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
		<li class="nav-item "><a href="about.php" class="nav-link">About Us</a></li>
		<li class="nav-item"><a href="contact.php" class="nav-link">Contect Us</a></li>
		<br><br>
		<li class="nav-item iconleft">
			<?php require 'con1.php';
			session_start();
			if (isset($_SESSION['user_id'])) {
				$user_id = $_SESSION['user_id'];
				$username = $_SESSION["username"];
				$password = $_SESSION["password"];
				$query = "select * from login where username='$username' and password='$password'";
				$result = mysqli_query($con, $query);
				while ($row = mysqli_fetch_array($result)) {
					if ($row['user_image']) { ?>
						<a href="user.php" class="nav-link"> <img src="../user_image/<?php echo $row['user_image'] ?>" alt="user" class="icon userimg" object-fit></a>
		</li>
		<?php } else {
						if ($row['gender'] == "male") { ?>
			<a href="user.php" class="nav-link"><img class="icon" src="..\icon\men.svg"></a></li>
		<?php } else { ?>
			<a href="user.php" class="nav-link"><img class="icon" src="..\icon\women.svg"></a></li>
<?php  }
					}
				} ?>
<li class="nav-item"><a href="orders.php" class="nav-link"> <img class="icon" src="..\icon\order.svg"> </a></li>
<?php $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
				$count_cart_items->execute([$user_id]);
				$total_cart_items = $count_cart_items->rowCount();
?>
<li class="nav-item "><a href="cart.php" class="nav-link"><img class="icon" src="..\icon\atc.svg"> <span>(<?= $total_cart_items; ?>)</span> </a></li>
<li class="nav-item "><a href="logout.php" class="nav-link" onclick="return confirm('logout from this website?');"> <img class="icon" src="../icon/logout.png" style="width: 57px;"></a></li>
<?php } else {
				$user_id = ''; ?>
	<li class="nav-item"><a href="#" class="nav-link"><img class="icon" src="..\icon\lockuser.svg"></a></li>
	<li class="nav-item"><a href="login.php" class="nav-link">Login </a></li>
	<li class="nav-item"><a href="registration.php" class="nav-link"> Sign Up</a></li>
<?php } ?>
	</ul>
	</nav>
	<?php include("add_cart.php"); ?>
	<section id="menu" class="menu1 ">
		<h1 class="heading1">All Items</h1>
		<div class="box-container1">
			<?php
			$query = "select *from items";
			$result = mysqli_query($con, $query);
			while ($row = mysqli_fetch_array($result)) { ?>
				<div class="box">
				<div class="price"><span><?php echo $row['price']; ?></span>/-</div>
					<img src="../IMAGE_PROJECT/<?php echo $row['image']; ?>" alt="" height="250px" width="350px" style="object-fit: cover;">
					<div class="name"><?php echo $row['itemname']; ?></div>
					<div>
						<h5><?php echo $row['cname']; ?></h5>
					</div>
					<form action="" method="post" class="box">
						<input type="hidden" name="pid" value="<?= $row['id']; ?>">
						<input type="hidden" name="name" value="<?= $row['itemname']; ?>">
						<input type="hidden" name="price" value="<?= $row['price']; ?>">
						<input type="hidden" name="image" value="<?= $row['image']; ?>">
						<input type="hidden" name="desc" value="<?= $row['desc']; ?>">
						<input type="number" min="1" max="100" value="1" class="qty" name="qty">
						<button type="submit" class="btn btn-white btn-outline-white btn1" name="add_to_cart" style="margin-left: -18px; height:60px;">Add to cart</button>
					</form>
				</div>
			<?php } ?>
		</div>
</div>
</section>
<?php include("footer.php"); ?>