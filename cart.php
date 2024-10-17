<?php require 'con1.php';
session_start();
if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
   if (isset($_POST['delete'])) {
      $cart_id = $_POST['cart_id'];
      $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
      $delete_cart_item->execute([$cart_id]);
      $message[] = 'cart item deleted!';
   }
   if (isset($_POST['delete_all'])) {
      $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
      $delete_cart_item->execute([$user_id]);
      $message[] = 'deleted all from cart!';
   }
   if (isset($_POST['update_qty'])) {
      $cart_id = $_POST['cart_id'];
      $qty = $_POST['qty'];
      $qty = filter_var($qty, FILTER_SANITIZE_STRING);
      $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
      $update_qty->execute([$qty, $cart_id]);
      $message[] = 'cart quantity updated';
   }
   $grand_total = 0;
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
   <section id="menu" class="menu1 ">
      <h1 class="heading1">All Carts</h1>
      <div class="box-container1">
         <?php
         $grand_total = 0;
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if ($select_cart->rowCount() > 0) {
            while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {  ?>
               <form action="" method="post" class="box">
                  <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
                  <button type="submit" class="fas fa-times" name="delete" onclick="return confirm('delete this item?');">X</button>
                  <img src="../IMAGE_PROJECT/<?= $fetch_cart['image']; ?>" alt="" height="250px" width="350px" style="object-fit: cover;">
                  <div class="name"><?= $fetch_cart['name']; ?></div>
                  <div class="flex">
                     <div class="price"><span><?= $fetch_cart['price']; ?></span>/-</div>
                     <input type="number" min="1" max="100" value="<?= $fetch_cart['quantity']; ?>" class="qty" name="qty">
                     <button type="submit" class="fas fa-edit" name="update_qty">edit</button>
                  </div>
                  <div class="sub-total"> sub total : <span><?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span> </div>
               </form>
         <?php  $grand_total += $sub_total;
            }
         } else {
            echo '<p class="empty">your cart is empty</p>';
         } ?>
      </div>
      <div class="cart-total">
         <p>Cart Total : <span><?= $grand_total; ?></span></p>
         <a href="checkout.php" class="btn1 <?= ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a>
      </div>
      <div class="more-btn">
         <form action="" method="post">
            <button type="submit" class="delete-btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>" name="delete_all" onclick="return confirm('delete all from cart?');">delete all</button>
         </form>
         <?php  ?>
         <a href="menu.php" class="btn1">continue shopping</a>
      </div>
   </section>
   <?php include 'footer.php'; ?>