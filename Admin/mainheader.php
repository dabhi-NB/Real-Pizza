<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();">  X</i>
      </div>
      ';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Real Pizza Admin</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
   <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
   <link rel="stylesheet" href="css/animate.css">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="css/magnific-popup.css">
   <link rel="stylesheet" href="css/aos.css">
   <link rel="stylesheet" href="css/ionicons.min.css">
   <link rel="stylesheet" href="css/bootstrap-datepicker.css">
   <link rel="stylesheet" href="css/jquery.timepicker.css">
   <link rel="stylesheet" href="css/flaticon.css">
   <link rel="stylesheet" href="css/icomoon.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/mystyle.css">
   <style>
      .icon {
         width: 60px;
      }
   </style>
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container" style="position: sticky;">
         <a class="navbar-brand" href="#"><span class="flaticon-pizza-1 mr-1"></span>
            <font size='+3'>Real</font><br><small>
               <font size='+1'>Pizza</font>
            </small>
         </a>
         <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="oi oi-menu"></span> Menu
               </button>
               <div class="collapse navbar-collapse" id="ftco-nav">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item active"> <a href="index.php" class="nav-link">
                           <font size='+1'>Home</font>
                        </a></li>
                     <li class="nav-item "><a href="loginmaster.php" class="nav-link">
                           <font size='+1'>User Accounts</font>
                        </a></li>
                     <li class="nav-item"><a href="categorymaster.php" class="nav-link">
                           <font size='+1'>Category</font>
                        </a></li>
                     <li class="nav-item"><a href="itemmaster.php" class="nav-link">
                           <font size='+1'>Items</font>
                        </a></li>
                     <li class="nav-item"><a href="placed_orders.php" class="nav-link">
                           <font size='+1'>Order</font>
                        </a></li>
                     <li class="nav-item"><a href="feedbackmaster.php" class="nav-link">
                           <font size='+1'>Feedback</font>
                        </a></li>
                     <li class="nav-item"><a href="#" class="nav-link">
                           <font size='+1'>
                              <div id="user-btn" class="fas fa-user"><img class="icon" src="..\icon\user.jpg"></div>
                           </font>
                        </a></li>
                     <li class="nav-item "><a href="logout.php" class="nav-link" onclick="return confirm('logout from this website?');"> <img class="icon" src="../icon/logout.png" style="width: 60px;"></a></li>
                     <div class="profile">
                        <?php
                        include("con1.php");
                        session_start();
                        $admin_id = $_SESSION['admin_id'];
                        if (!isset($admin_id)) {
                           header('location:ad_login.php');
                        }
                        $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
                        $select_profile->execute([$admin_id]);
                        $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <p><?= $fetch_profile['username']; ?></p>
                        <center>
                           <a href="update_profile.php?id=<?= $fetch_profile['id']; ?>" class="btn">update profile</a>
                           <br>
                           <div class="flex-btn">
                              <a href="ad_login.php" class="btn1">login another </a>
                              <a href="register_admin.php" class="btn1">register new </a>
                           </div>
                           <br>
                        </center>
                     </div>
                     <script>
                        let profile = document.querySelector(' .profile');
                        document.querySelector('#user-btn').onclick = () => {
                           profile.classList.toggle('active')
                           navbar.classList.remove('active');
                        }
                     </script>
                  </ul>
               </div>
         </div>
   </nav>
   <!-- END nav -->