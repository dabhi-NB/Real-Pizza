<?php include("mainheader.php"); ?>
<div class=" navbar-collapse collapse show" id="ftco-nav">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="menu.php" class="nav-link">Our Menu</a></li>
    <li class="nav-item active"><a href="#" class="nav-link">Services</a></li>
    <li class="nav-item "><a href="about.php" class="nav-link">About Us</a></li>
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
<?php } else {
        $user_id = ''; ?>
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
            <h1 class="mb-3 mt-5 bread">Services</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Services</span></p>
          </div>
        </div>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br><br>
  <section class="ftco-menu">
    <div class="video-container">
      <video src="..\IMAGE_PROJECT\videos\realpizza.mp4" loop autoplay style="height: 570px;  width:440px;" muted></video>
      <video src="..\IMAGE_PROJECT\videos\realpizza1.mp4" loop autoplay style="height: 570px;  width:440px;" muted></video>
    <video src="..\IMAGE_PROJECT\videos\realpizza2.mp4" loop autoplay style="height: 570px;  width:440px;" muted></video>
  </div>
  </section>
  <?php include("footer.php"); ?>