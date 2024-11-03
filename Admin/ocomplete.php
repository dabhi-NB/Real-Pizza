<?php
include 'con1.php';
if (isset($_POST['update_payment'])) {
   $order_id = $_POST['order_id'];
   $payment_status = $_POST['payment_status'];
   $update_status = $conn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
   $update_status->execute([$payment_status, $order_id]);
   $message[] = 'payment status updated!';
}
if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
   $delete_order->execute([$delete_id]);
   header('location:placed_orders.php');
}
 include 'mainheader.php' ?>
<section class="placed-orders">
   <center>
      <h1 class="heading">Order Complete</h1>
   </center>
 <div class="box-container">
 <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
      $select_orders->execute(['completed']);
      if ($select_orders->rowCount() > 0) {
         while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="box">
               <p> user id : <span><?= $fetch_orders['user_id']; ?></span> </p>
               <p> placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>
               <p> name : <span><?= $fetch_orders['name']; ?></span> </p>
               <p> email : <span><?= $fetch_orders['email']; ?></span> </p>
               <p> number : <span><?= $fetch_orders['number']; ?></span> </p>
               <p> address : <span><?= $fetch_orders['address']; ?></span> </p>
               <p> total products : <span><?= $fetch_orders['total_products']; ?></span> </p>
               <p> total price : <span>$<?= $fetch_orders['total_price']; ?>/-</span> </p>
               <p> payment method : <span><?= $fetch_orders['method']; ?></span> </p>
               <form action="" method="POST">
                  <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
                  <select name="payment_status" class="drop-down">
                     <option value="" selected disabled><?= $fetch_orders['payment_status']; ?></option>
                     <option value="pending">pending</option>
                     <option value="completed">completed</option>
                  </select>
                  <div class="flex-btn">
                     <center> <input type="submit" value="update" class="btn1" name="update_payment"></center>
                     <center><a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="btn1" onclick="return confirm('delete this order?');">delete</a></center>
                  </div>
               </form>
            </div>
      <?php }
      } else {
         echo '<p class="empty">no orders Completed yet!</p>';
      } ?>
   </div>
</section>
<?php include("footer.php") ?>