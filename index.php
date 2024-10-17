<?php include 'con1.php'; ?>
<?php include("mainheader.php"); ?>
<br><br>
<center>
   <h1><u>Dashbord</u></h1>
</center>
<br>
<div class="box-containerad">
   <div class="box">
      <?php
      $select_admins = $conn->prepare("SELECT * FROM `admin`");
      $select_admins->execute();
      $numbers_of_admins = $select_admins->rowCount();
      ?>
      <p>Admins Accounts</p>
      <h3><?= $numbers_of_admins; ?></h3>
      <center><a href="admin_accounts.php" class="btn">see admins</a></center>
   </div>

   <div class="box">
      <?php
      $select_users = $conn->prepare("SELECT * FROM `login`");
      $select_users->execute();
      $numbers_of_users = $select_users->rowCount();
      ?>
      <p>Users Accounts</p>
      <h3><?= $numbers_of_users; ?></h3>
      <center><a href="loginmaster.php" class="btn">see users</a></center>
   </div>

   <div class="box">
      <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders`");
      $select_orders->execute();
      $numbers_of_orders = $select_orders->rowCount();
      ?>
      <p>Total Orders</p>
      <h3><?= $numbers_of_orders; ?></h3>
      <center><a href="placed_orders.php" class="btn">see orders</a> </center>
   </div>


   <div class="box">
      <?php
      $select_messages = $conn->prepare("SELECT * FROM `feedback`");
      $select_messages->execute();
      $numbers_of_messages = $select_messages->rowCount();
      ?>
      <p> Messages</p>
      <h3><?= $numbers_of_messages; ?></h3>
      <center> <a href="feedbackmaster.php" class="btn">see messages</a> </center>
   </div>

   <div class="box">
      <?php
      $total_pendings = 0;
      $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
      $select_pendings->execute(['pending']);
      $numbers_of_orderpending = $select_pendings->rowCount();
      ?>
      <p>Pendings Orders</p>
      <h3><?= $numbers_of_orderpending; ?></h3>
      <center><a href="opending.php" class="btn">see orders</a> </center>
   </div>

   <div class="box">
      <?php
      $total_completes = 0;
      $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
      $select_completes->execute(['completed']);
      $numbers_of_ordercomplet = $select_completes->rowCount();
      ?>
      <p>Completes Orders</p>
      <h3><?= $numbers_of_ordercomplet; ?></h3>

      <center> <a href="ocomplete.php" class="btn">see orders</a> </center>
   </div>

   <div class="box">
      <?php
      $select_products = $conn->prepare("SELECT * FROM `category`");
      $select_products->execute();
      $numbers_of_products = $select_products->rowCount();
      ?>
      <p>Categories Added</p>
      <h3><?= $numbers_of_products; ?></h3>
      <center><a href="categorymaster.php" class="btn">see categories</a> </center>
   </div>

   <div class="box">
      <?php
      $select_products = $conn->prepare("SELECT * FROM `items`");
      $select_products->execute();
      $numbers_of_products = $select_products->rowCount();
      ?>
      <p>Items Added</p>
      <h3><?= $numbers_of_products; ?></h3>
      <center> <a href="itemmaster.php" class="btn">see items</a> </center>
   </div>

   <?php
   $sql4 = "SELECT sum(total_price) as total_price from `orders` ";
   $qry4 = mysqli_query($con, $sql4);
   $count4 = mysqli_fetch_assoc($qry4);
   $totalr = $count4['total_price'];
   ?>
</div>
<br>
<hr>
<center>
   <h1> <a href="placed_orders.php"> Grand Total: <font color="white"><?php echo $totalr ?><span>/-</span></a></font>
   </h1>
</center>
<?php include("footer.php"); ?>