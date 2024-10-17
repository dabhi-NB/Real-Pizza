<?php include("mainheader.php"); ?>
<div class=" navbar-collapse collapse show" id="ftco-nav">
	<ul class="navbar-nav ml-auto">
		<li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
		<li class="nav-item"><a href="menu.php" class="nav-link">Our Menu</a></li>
		<li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
		<li class="nav-item "><a href="about.php" class="nav-link">About Us</a></li>
		<li class="nav-item"><a href="contact.php" class="nav-link">Contect Us</a></li>
		<br><br>
		<li class="nav-item iconleft">
			<?php
			require 'con1.php';
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
<?php  				 }
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
	<!-- END nav -->
	<section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">
		<div class="slider-item">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text align-items-center" data-scrollax-parent="true">
					<div class="col-md-6 col-sm-12 ftco-animate">
						<span class="subheading">Delicious</span>
						<h1 class="mb-4">Italian Cuizine</h1>
						<p><a href="contact.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Contact Now</a> <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
					</div>
					<div class="col-md-6 ftco-animate">
						<img src="images/bg_1.png" class="img-fluid" alt="">
					</div>
				</div>
			</div>
		</div>
		<div class="slider-item">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text align-items-center" data-scrollax-parent="true">
					<div class="col-md-6 col-sm-12 order-md-last ftco-animate">
						<span class="subheading">Crunchy</span>
						<h1 class="mb-4">Italian Pizza</h1>
						<p><a href="contact.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Contact Now</a> <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p></div>
					<div class="col-md-6 ftco-animate">
						<img src="images/bg_2.png" class="img-fluid" alt="">
					</div>
				</div>
			</div>
		</div>
		<div class="slider-item" style="background-image: url(images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<span class="subheading">Welcome</span>
						<h1 class="mb-4">We cooked your desired Pizza Recipe</h1>
						<p><a href="contact.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Contact Now</a> <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
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

	<section class="ftco-section ftco-services">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section ftco-animate text-center">
					<h2 class="mb-4">Our Services</h2>
					<p>Food is more than just a source of energy, it's also a source of information that can impact our health and wellbeing.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 ftco-animate">
					<div class="media d-block text-center block-6 services">
						<div class="icon d-flex justify-content-center align-items-center mb-5">
							<span class="flaticon-diet"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Healthy Foods</h3>
							<p>Turn your food into medicine and you won’t need medicines anymore.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="media d-block text-center block-6 services">
						<div class="icon d-flex justify-content-center align-items-center mb-5">
							<span class="flaticon-bicycle"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Fastest Delivery</h3>
							<p>Avoid the lines and have groceries delivered by us! Speedy food - good food , Come and get free delivery on all orders. </p>
						</div>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="media d-block text-center block-6 services">
						<div class="icon d-flex justify-content-center align-items-center mb-5"><span class="flaticon-pizza-1"></span></div>
						<div class="media-body">
							<h3 class="heading">Original Recipes</h3>
							<p>Original Recipes that make you feel good!</p>
							<p>Made with LOVE :)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2 class="mb-4">Unlimited Pizza Meal</h2><br>
					<p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
					<p class="mt-5">Enjoy Unlimited Pizza with Unlimited Fun. Ultimate Overload!</p>
					<p><font size="+2" color="#fac564">33 Varieties of Unlimited Meal</font></p>
					Lunch: RS.180* Per Person<br>Dinner: RS.220* Per Person
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(images/pizza-1.jpg);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span>Panipuri</span></h3>
							</div>
							<div class="d-block">
								<p>1 type of Cold PaniPuri</p>
							</div>
						</div>
					</div>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(images/pizza-2.jpg);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span>Salad & Soup</span></h3>
							</div>
							<div class="d-block">
								<p>6 type of Hot & Cold Salad, Soup</p>
							</div>
						</div>
					</div>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(images/pizza-3.jpg);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span>Chaat & Pasta</span></h3>
							</div>
							<div class="d-block">
								<p>18 types of Chaat & Pasta</p>
							</div>
						</div>
					</div>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(images/pizza-4.jpg);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span>Ice-Cream </span></h3>
							</div>
							<div class="d-block">
								<p>1 type of Brownie Ice-Cream (Single Serving)</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(images/pizza-5.jpg);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span>Pizza</span></h3>
							</div>
							<div class="d-block">
								<p>4 types of Pizzas</p>
							</div>
						</div>
					</div>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(images/pizza-6.jpg);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span>Bread</span></h3>
							</div>
							<div class="d-block">
								<p>1 type of Garlic Bread</p>
							</div>
						</div>
					</div>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(images/pizza-7.jpg);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span>Italian Volve</span></h3>
							</div>
							<div class="d-block">
								<p>1 type of Italian Volve</p>
							</div>
						</div>
					</div>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url(images/pizza-8.jpg);"></div>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span>Drinks</span></h3>
							</div>
							<div class="d-block">
								<p>3 types of Cold Drinks</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<h5 class="mb-4" align="center">Visit over Location and Enjoy it!</h5><br>
	<section class="ftco-gallery">
		<div class="container-wrap">
			<div class="row no-gutters">
				<div class="col-md-3 ftco-animate">
					<a href="contact.php" class="gallery img d-flex align-items-center" style="background-image: url(../IMAGE_PROJECT/loc1.jpg);">
						<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-search"></span>
						</div>
					</a>
				</div>
				<div class="col-md-3 ftco-animate">
					<a href="contact.php" class="gallery img d-flex align-items-center" style="background-image: url(../IMAGE_PROJECT/loc2.jpg);">
						<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-search"></span>
						</div>
					</a>
				</div>
				<div class="col-md-3 ftco-animate">
					<a href="contact.php" class="gallery img d-flex align-items-center" style="background-image: url(../IMAGE_PROJECT/loc3.jpg);">
						<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-search"></span>
						</div>
					</a>
				</div>
				<div class="col-md-3 ftco-animate">
					<a href="contact.php" class="gallery img d-flex align-items-center" style="background-image: url(../IMAGE_PROJECT/loc4.jpg);">
						<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-search"></span>
						</div>
					</a>
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

	<section class="ftco-menu">
		<div class="video-container">
			<video src="..\IMAGE_PROJECT\videos\realpizza.mp4" loop autoplay style="height: 570px;  width:440px;" muted></video>
			<video src="..\IMAGE_PROJECT\videos\realpizza1.mp4" loop autoplay style="height: 570px;  width:440px;" muted></video>
			<video src="..\IMAGE_PROJECT\videos\realpizza2.mp4" loop autoplay style="height: 570px;  width:440px;" muted></video>
		</div>
	</section>
	<?php include("footer.php"); ?>