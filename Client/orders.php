<?php
require 'con1.php';
session_start();
if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
include("mainheader.php"); ?>
   <div class=" navbar-collapse collapse show" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
         <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
         <li class="nav-item"><a href="menu.php" class="nav-link">Our Menu</a></li>
         <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
         <li class="nav-item "><a href="about.php" class="nav-link">About Us</a></li>
         <li class="nav-item"><a href="contact.php" class="nav-link">Contect Us</a></li>
         <br><br>
         <li class="nav-item iconleft">
            <?php
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
<?php
} else {  $user_id = ''; ?>
   <li class="nav-item"><a href="#" class="nav-link"><img class="icon" src="..\icon\lockuser.svg"></a></li>
   <li class="nav-item"><a href="login.php" class="nav-link">Login </a></li>
   <li class="nav-item"><a href="registration.php" class="nav-link"> Sign Up</a></li>
<?php } ?>
      </ul>
      </nav>
      <section class="orders menu1">
         <h1 class="heading1">Your Orders</h1>
         <div class="box-order">
            <?php
            if ($user_id == '') {
               echo '<p class="empty">please login to see your orders</p>';
            } else {
               $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
               $select_orders->execute([$user_id]);
               if ($select_orders->rowCount() > 0) {
                  while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) { ?>
                     <div class="box">
                        <p>placed on : <span><?= $fetch_orders['placed_on']; ?></span></p>
                        <p>name : <span><?= $fetch_orders['name']; ?></span></p>
                        <p>email : <span><?= $fetch_orders['email']; ?></span></p>
                        <p>number : <span><?= $fetch_orders['number']; ?></span></p>
                        <p>address : <span><?= $fetch_orders['address']; ?></span></p>
                        <p>payment method : <span><?= $fetch_orders['method']; ?></span></p>
                        <p>your orders : <span><?= $fetch_orders['total_products']; ?></span></p>
                        <p>total price : <span>$<?= $fetch_orders['total_price']; ?>/-</span></p>
                        <p> payment status : <span style="color:<?php if ($fetch_orders['payment_status'] == 'pending') {
                                                                     echo 'red';
                                                                  } else {
                                                                     echo 'green';
                                                                  }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
                     </div>
            <?php }
               } else {
                  echo '<p class="empty">no orders placed yet!</p>';
               }
            } ?>
         </div>
      </section>
      <?php include 'footer.php'; ?>