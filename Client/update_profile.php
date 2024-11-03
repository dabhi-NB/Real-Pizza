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
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   if (!empty($name)) {
      $update_name = $conn->prepare("UPDATE `login` SET name = ? WHERE id = ?");
      $update_name->execute([$name, $user_id]);
      $message[] = 'name updated successfully!';
      header('location:checkout.php');
   }
   if (!empty($email)) {
      $select_email = $conn->prepare("SELECT * FROM `login` WHERE email = ?");
      $select_email->execute([$email]);
      if ($select_email->rowCount() > 0) {
         $message[] = 'email already taken!';
      } else {
         $update_email = $conn->prepare("UPDATE `login` SET email = ? WHERE id = ?");
         $update_email->execute([$email, $user_id]);
         $message[] = 'email updated successfully!';
         header('location:checkout.php');
      }
   }
   if (!empty($number)) {
      $select_number = $conn->prepare("SELECT * FROM `login` WHERE phone_no = ?");
      $select_number->execute([$number]);
      if ($select_number->rowCount() > 0) {
         $message[] = 'number already taken!';
      } else {
         $update_number = $conn->prepare("UPDATE `login` SET phone_no = ? WHERE id = ?");
         $update_number->execute([$number, $user_id]);
         $message[] = 'phone no updated successfully!';
         header('location:checkout.php');
      }
   }
} ?>
<section class="form-container update-form">
   <?php include("con1.php");
   $select_profile = $conn->prepare("SELECT * FROM `login` WHERE id = ?");
   $select_profile->execute([$user_id]);
   if ($select_profile->rowCount() > 0) {
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC); ?>
      <form action="" method="post">
         <h1 class="heading1">Update Profile</h1>
         <input type="text" name="name" placeholder="<?= $fetch_profile['name']; ?>" class="box" maxlength="50">
         <input type="email" name="email" placeholder="<?= $fetch_profile['email']; ?>" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="number" name="number" placeholder="<?= $fetch_profile['phone_no']; ?>" class="box" min="0" max="9999999999" maxlength="10">
         <input type="submit" value="update now" name="submit" class="btn1">
         <a href="checkout.php" class="btn1">Back</a>
      </form>
   <?php } ?>
</section>
<?php include 'footer.php'; ?>