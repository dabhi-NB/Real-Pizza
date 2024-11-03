<?php include("mainheader.php"); ?>
<div class=" navbar-collapse collapse show" id="ftco-nav">
	<ul class="navbar-nav ml-auto">
		<li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
		<li class="nav-item"><a href="menu.php" class="nav-link">Our Menu</a></li>
		<li class="nav-item "><a href="services.php" class="nav-link">Services</a></li>
		<li class="nav-item active "><a href="#" class="nav-link">About Us</a></li>
		<li class="nav-item"><a href="contact.php" class="nav-link">Contect Us</a></li>
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
<li class="nav-item "><a href="cart.php" class="nav-link"><img class="icon" src="..\icon\atc.svg"> <span>(<?= $total_cart_items; ?>)</span> </a></li>
<li class="nav-item "><a href="logout.php" class="nav-link" onclick="return confirm('logout from this website?');"> <img class="icon" src="../icon/logout.png" style="width: 57px;"></a></li>
<?php } else { $user_id = ''; ?>
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
						<h1 class="mb-3 mt-5 bread">About</h1>
						<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>About</span></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-intro">
		<div class="container-wrap">
			<div class="wrap d-md-flex">
				<div class="info">
					<div class="row no-gutters">
						<div class="col-md-4 d-flex ftco-animate">
							<div class="icon"><span class="icon-phone"></span></div>
							<div class="text">
								<h3>+8866866907</h3>
								<p>Stay in Touch</p>
							</div>
						</div>
						<div class="col-md-4 d-flex ftco-animate">
							<div class="icon"><span class="icon-my_location"></span></div>
							<div class="text">
								<h3>Gujarat</h3>
								<p>Zanzarda Road, Junagadh-362001</p>
							</div>
						</div>
						<div class="col-md-4 d-flex ftco-animate">
							<div class="icon"><span class="icon-clock-o"></span></div>
							<div class="text">
								<h3>Open Monday-Friday</h3>
								<p>8:00am - 9:00pm</p>
							</div>
						</div>
					</div>
				</div>
				<div class="social d-md-flex pl-md-5 p-4 align-items-center">
					<ul class="social-icon">
						<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-about d-md-flex">
		<div class="one-half img" style="background-image: url(images/about.jpg);"></div>
		<div class="one-half ftco-animate">
			<div class="heading-section ftco-animate ">
				<h2 class="mb-4">Welcome to Real <span class="flaticon-pizza">Pizza</span><br> A Restaurant</h2>
			</div>
			<div>
				<font size="+2" color="#fac564">Unlimited Food for Unlimited Fun :</font>
				<p>
					With the concept of providing authentic Italian taste to the people of the city, Real Group started the venture of Real Pizza in Junagadh in the year 2017. Later we continued our Italian journey and opened our branch in Surat as well.<br>
					<br>Our sole motto at Real Pizza is to provide a real taste of pizza. With our ’Soup to Dessert’ unlimited meal, we try to serve different items to different people with different taste buds. Our large variety of food items and our affordability makes us people’s favourite Pizza Hub.
				</p>
			</div>
		</div>
	</section>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
				<div class="heading-section text-center ">
					<h2 class="mb-4 ">Awards & Achievements</h2>
					<div class="awards">
						<img src="../IMAGE_PROJECT\a1.jpg" alt="" class="award">
						<img src="../IMAGE_PROJECT\a2.jpg" alt="" class="award">
					</div>
				</div>
			</div>
	</section>
	<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
							<div class="block-18 text-center">
								<div class="text">
									<div class="icon"><span class="flaticon-pizza-1"></span></div>
									<strong class="number" data-number="100">0</strong>
									<span>Pizza Branches</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
							<div class="block-18 text-center">
								<div class="text">
									<div class="icon"><span class="flaticon-medal"></span></div>
									<strong class="number" data-number="85">0</strong>
									<span>Number of Awards</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
							<div class="block-18 text-center">
								<div class="text">
									<div class="icon"><span class="flaticon-laugh"></span></div>
									<strong class="number" data-number="10567">0</strong>
									<span>Happy Customer</span>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
							<div class="block-18 text-center">
								<div class="text">
									<div class="icon"><span class="flaticon-chef"></span></div>
									<strong class="number" data-number="900">0</strong>
									<span>Staff</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include("footer.php"); ?>