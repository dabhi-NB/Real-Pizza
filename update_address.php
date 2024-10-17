<?php include("header.php"); 
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:index.php');
};
if(isset($_POST['submit'])){
   $address = $_POST['flat'] .', '.$_POST['building'].', '.$_POST['area'].', '.$_POST['town'] .', '. $_POST['city'] .', '. $_POST['state'] .', '. $_POST['country'] .' - '. $_POST['pin_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $update_address = $conn->prepare("UPDATE `login` set address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);
   $message[] = 'address saved!';
   header('location:checkout.php');
} ?>  
<section class="form-container">
   <form action="" method="post">
      <h3>your address</h3>
      <input type="text" class="box" placeholder="flat no." required maxlength="50" name="flat">
      <input type="text" class="box" placeholder="building no." required maxlength="50" name="building">
      <input type="text" class="box" placeholder="area name" required maxlength="50" name="area">
      <input type="text" class="box" placeholder="town name" required maxlength="50" name="town">
      <input type="text" class="box" placeholder="city name" required maxlength="50" name="city">
      <input type="text" class="box" placeholder="state name" required maxlength="50" name="state">
      <input type="text" class="box" placeholder="country name" required maxlength="50" name="country">
      <input type="number" class="box" placeholder="pin code" required max="999999" min="0" maxlength="6" name="pin_code">
      <input type="submit" value="save address" name="submit" class="btn1">
      <a href="checkout.php" class="btn1">Back</a>
   </form>
</section>
<?php include 'footer.php' ?>






