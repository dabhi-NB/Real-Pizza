<?php include("header.php");
if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
   header('location:index.php');
};
if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = $_POST['address'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];
   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);
   if ($check_cart->rowCount() > 0) {
      if ($address == '') {
         $message[] = 'please add your address!';
      } else {
         $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
         $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $total_price]);
         $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
         $delete_cart->execute([$user_id]);
         $message[] = 'order placed successfully!';
         header("location:index.php");
      }
   } else {
      $message[] = 'your cart is empty';
   }
} ?>
<section class="checkout menu1">
   <h1 class="heading1">order summary</h1>
   <form action="" method="post">
      <div class="cart-items">
         <h3>cart items</h3>
         <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if ($select_cart->rowCount() > 0) {
            while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
               $cart_items[] = $fetch_cart['name'] . ' (' . $fetch_cart['price'] . ' x ' . $fetch_cart['quantity'] . ') - ';
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']); ?>
               <p><span class="name"><?= $fetch_cart['name']; ?></span><span class="price"><?= $fetch_cart['price']; ?> x <?= $fetch_cart['quantity']; ?></span></p>
         <?php }
         } else {
            echo '<p class="empty">your cart is empty!</p>';
         } ?>
         <p class="grand-total"><span class="name">grand total :</span><span class="price"><?= $grand_total; ?></span></p>
         <a href="cart.php" class="btn1">veiw cart</a>
      </div>
      <?php include("con1.php");
      $select_profile = $conn->prepare("SELECT * FROM `login` WHERE id = ?");
      $select_profile->execute([$user_id]);
      if ($select_profile->rowCount() > 0) {
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC); ?>
         <input type="hidden" name="total_products" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
         <input type="hidden" name="name" value="<?= $fetch_profile['name'] ?>">
         <input type="hidden" name="number" value="<?= $fetch_profile['phone_no'] ?>">
         <input type="hidden" name="email" value="<?= $fetch_profile['email'] ?>">
         <input type="hidden" name="address" value="<?= $fetch_profile['address'] ?>">
         <div class="user-info">
            <h3>your info</h3>
            <p><i class="fas fa-user"></i><span><?= $fetch_profile['name'] ?></span></p>
            <p><i class="fas fa-phone"></i><span><?= $fetch_profile['phone_no'] ?></span></p>
            <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email'] ?></span></p>
            <a href="update_profile.php" class="btn1">update info</a>
            <h3>delivery address</h3>
            <p><i class="fas fa-map-marker-alt"></i><span>
                  <?php if ($fetch_profile['address'] == '') {
                     echo 'please enter your address';
                  } else {
                     echo $fetch_profile['address'];
                  } ?></span></p>
            <a href="update_address.php" class="btn1">update address</a>
            <select name="method" class="box" required>
               <option value="" disabled selected>select payment method --</option>
               <option value="cash on delivery">cash on delivery</option>
               <option value="credit card">credit card</option>
               <option value="paytm">paytm</option>
               <option value="paypal">paypal</option>
            </select>
            <input type="submit" value="place order" class="btn1 <?php if ($fetch_profile['address'] == '') { echo 'disabled';  } ?>" style="width:100%; background:var(--red); color:var(--white);" name="submit">
         </div>
   </form>
</section>
<?php } include 'footer.php'; ?>
