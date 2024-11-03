<?php include("mainheader.php"); ?>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<div class=" navbar-collapse collapse show" id="ftco-nav">
	<ul class="navbar-nav ml-auto">
		<li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
		<li class="nav-item active"><a href="#" class="nav-link">Our Menu</a></li>
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
<?php
				$count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
				$count_cart_items->execute([$user_id]);
				$total_cart_items = $count_cart_items->rowCount();
?>
<li class="nav-item "><a href="cart.php" class="nav-link"><img class="icon" src="..\icon\atc.svg"> <span>(<?= $total_cart_items; ?>)</span> </a></li>
<li class="nav-item "><a href="logout.php" class="nav-link" onclick="return confirm('logout from this website?');"> <img class="icon" src="../icon/logout.png" style="width: 57px;"></a></li>
<?php } else { $user_id = ''; ?>
	<li class="nav-item"><a href="#" class="nav-link"><img class="icon" src="..\icon\lockuser.svg"></a></li>
	<li class="nav-item"><a href="login.php" class="nav-link">Login </a></li>
	<li class="nav-item"><a href="registration.php" class="nav-link"> Sign Up</a></li>
<?php } ?>
	</ul>
	</nav>
	<?php include("add_cart.php"); ?>
	<section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">
		<div class="slider-item" style="background-image: url(images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">
					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread">Food we serve...</h1>
						<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Menu</span></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section ftco-animate text-center">
					<h2 class="mb-4">our menu</h2>
					<p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
				</div>
			</div>
		</div>

		<section class="ftco-menu">
			<div class="container-fluid mb-5" style="display: block ruby;">
				<div class="row px-xl-5">
					<div class="col-lg-3 d-none d-lg-block">
						<a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
							<h6 class="m-0"> Categories </h6>
							<i class="fa fa-angle-down text-dark" style="padding-left: 50px;"></i>
						</a>
						<nav class="collapse  navbar navbar-vertical navbar-light align-items-start p-0 border1 border-top-0 border-bottom-0" id="navbar-vertical">
							<div class="navbar-nav w-100 overflow-hidden" style="height: auto; border:2px">
								<?php
								$query = "select *from category";
								$result = mysqli_query($con, $query);
								while ($row = mysqli_fetch_array($result)) {
								?><section class="ftco-menu ">
										<div class=" dropdown nav ftco-animate nav-pills leftd-flex wbox">
											<li class="side-menu" id="cat"><a class="nav-link" style="width: 272px; padding-left:25px;" href="menu.php?cname=<?php echo $row['cname']; ?>"><?php echo $row['cname']; ?></a></li>
										</div>
									</section><?php } ?>
						</nav>
					</div>
				</div>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search for items" id="mySearch" onkeyup="myFunction()" style="background-color: #4f483c6e;
    color: white; ">
					<div class="input-group-append" style="width:700px; "> <span class="input-group-text bg-transparent text-primary">
							<i class="fa fa-search"></i> </span>
						<a href="allitems.php" class="btn1 btnall">All Items</a>
					</div>
				</div>
			</div>
</div>
</div>
</div>
<?php
if (isset($_GET["cname"])) {
	$cname = $_GET["cname"];
	$result = mysqli_query($con, "SELECT * FROM `items` WHERE `cname`='$cname'"); ?>
	<section id="menu" class="menu1">
		<h1 class="heading1"><?php echo $cname ?></h1>
		<div class="box-container1">
			<?php while ($row = mysqli_fetch_array($result)) { ?>
				<div class="box">
					<div class="price"><span><?php echo $row['price']; ?></span>/-</div>
					<img src="../IMAGE_PROJECT/<?php echo $row['image']; ?>" alt="" height="250px" width="350px" style="object-fit: cover;">
					<div class="name"><?php echo $row['itemname']; ?></div>
					<form action="" method="post" class="box">
						<input type="hidden" name="pid" value="<?= $row['id']; ?>">
						<input type="hidden" name="name" value="<?= $row['itemname']; ?>">
						<input type="hidden" name="price" value="<?= $row['price']; ?>">
						<input type="hidden" name="image" value="<?= $row['image']; ?>">
						<input type="hidden" name="desc" value="<?= $row['desc']; ?>">
						<input type="number" min="1" max="100" value="1" class="qty" name="qty">
						<button type="submit" class="btn btn-white btn-outline-white btn1" name="add_to_cart"><a herf="" onclick="return confirm('added to cart!');">Add to cart</a></button>
					</form>
				</div>
			<?php } ?>
		</div>
		</div>
	</section>
<?php } else { ?>
	<img src="images/about.jpg" class="img-fluid" alt="" style="padding: 25px; margin-left: 222px;" width="1000px">
<?php	} ?>
</div>
</div>
</div>
</section>
</div>
</div>
<div class="container">
	<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
		<div class="col-md-7 heading-section text-center ftco-animate">
			<h2 class="mb-4">Unlimited Pizza Meal</h2><br>
			<p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
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
<center>
	<p class="mt-5">Enjoy Unlimited Pizza with Unlimited Fun. Ultimate Overload!</p>
</center>
</section><br>
<h5 class="mb-4" align="center">Visit over Location and Enjoy it!</h5><br>
<?php include("footer.php"); ?>