<?php include("mainheader.php"); ?>
<div class=" navbar-collapse collapse show" id="ftco-nav">
	<ul class="navbar-nav ml-auto">
		<li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
		<li class="nav-item"><a href="menu.php" class="nav-link">Our Menu</a></li>
		<li class="nav-item "><a href="services.php" class="nav-link">Services</a></li>
		<li class="nav-item  "><a href="about.php" class="nav-link">About Us</a></li>
		<li class="nav-item active"><a href="#" class="nav-link">Contect Us</a></li>
		<br><br>
		<li class="nav-item iconleft">
			<?php require 'con1.php';
			session_start();
			if (isset($_SESSION['user_id'])) {
				$user_id = $_SESSION['user_id'];
				$count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
				$count_cart_items->execute([$user_id]);
				$total_cart_items = $count_cart_items->rowCount();
				$username = $_SESSION["username"];
				$password = $_SESSION["password"];
				$query = "select * from login where username='$username' and password='$password'";
				$result = mysqli_query($con, $query);
				while ($row = mysqli_fetch_array($result)) {	
					 if ($row['user_image']) { ?>
						<a href="user.php" class="nav-link"> <img src="../user_image/<?php echo $row['user_image'] ?>" alt="user" class="icon userimg" object-fit></a></li>
		<?php } else {
					if ($row['gender'] == "male") { ?>
			<a href="user.php" class="nav-link"><img class="icon" src="..\icon\men.svg"></a></li>
		<?php } else { ?>
			<a href="user.php" class="nav-link"><img class="icon" src="..\icon\women.svg"></a></li>
<?php  }
					}
				} ?>
<li class="nav-item"><a href="orders.php" class="nav-link"> <img class="icon" src="..\icon\order.svg"> </a></li>
<li class="nav-item "><a href="cart.php" class="nav-link"><img class="icon" src="..\icon\atc.svg"> <span>(<?= $total_cart_items; ?>)</span> </a></li>
<li class="nav-item "><a href="logout.php" class="nav-link" onclick="return confirm('logout from this website?');"> <img class="icon" src="../icon/logout.png" style="width: 57px;"></a></li>
<?php } else {	$user_id = ''; ?>
	<li class="nav-item"><a href="#" class="nav-link"><img class="icon" src="..\icon\lockuser.svg"></a></li>
	<li class="nav-item"><a href="login.php" class="nav-link">Login </a></li>
	<li class="nav-item"><a href="registration.php" class="nav-link"> Sign Up</a></li>
<?php } ?>
	</ul>
	</nav>
	<section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">
		<div class="slider-item" style="background-image: url(images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">
					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread">Stay in Touch...</h1>
						<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span>| | <span>Contact</span></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section contact-section">
		<div class="container mt-5">
			<div class="row block-9">
				<div class="col-md-4 contact-info ftco-animate">
					<div class="row">
						<div class="col-md-12 mb-4">
							<h2 class="h4">Contact Information</h2>
						</div>
						<div class="col-md-12 mb-3">
							<p><span>Address:</span> First Floor, Krishna Capital, Near Yamuna Wadi, Zanzarda Road, Junagadh-362001</p>
						</div>
						<div class="col-md-12 mb-3">
							<p><span>Phone:</span> <a href="tel://8866866907">+8866 8669 07</a></p>
						</div>
						<div class="col-md-12 mb-3">
							<p><span>Email:</span> <a href="mailto:realpizzajnd@gmail.com">realpizzajnd@gmail.com</a></p>
						</div>
						<div class="col-md-12 mb-3">
							<p><span>Website:</span> <a href="index.php">Real-pizza.com</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-6 ftco-animate">
					<form action="feedback.php" class="contact-form" method="post" enctype="multipart/form-data" name="feedback">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Your Name" name="name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Your Email" name="email">
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Subject" name="subject">
						</div>
						<div class="form-group">
							<textarea cols="30" rows="7" class="form-control" placeholder="Message" name="msg"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<div id="map"></div>
	<?php include("footer.php"); ?>