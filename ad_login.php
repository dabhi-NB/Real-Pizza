<!DOCTYPE html>
<html lang="en">

<head>
  <title>Real Pizza Admin pannel</title>
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

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="ad_index.html"><span class="flaticon-pizza-1 mr-1"></span>
        <font size='+3'>Real</font><br><small>
          <font size='+1'>Pizza</font>
        </small>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
    </div>
  </nav>
  <script type="text/javascript">
    function validateForm() {
      var a = document.forms["login"]["username"].value;
      var b = document.forms["login"]["password"].value;

      if ((a == null || a == "") && (b == null || b == ""))
        if (a == null || a == "") {
          alert("username must be filled out");
          return false;
        }
      if (b == null || b == "") {
        alert("password must be filled out");
        return false;
      }

      if (b.length < 5) {
        alert("password should be atleast 5 characters.");
        return false;
      }
      if (!(b.match(/^[a-z,0-9][\w-]*$/i))) {
        alert("Password can not contain any special character or spaces except '_' or '-' . ");
        return false;
      }
    }
  </script>
  </head>

  <body>
    <script src="js/main.js"></script>
    <script src="js/jquery.ba-cond.min.js"></script>
    <script src="js/jquery.slitslider.js"></script>

    <br><br> <center>
      <h1 align="center"> <font size="+5" color=""><b><u>Admin LOGIN </u></b></font> </h1>
      <form action="checklogin.php" method="post" name="login" onSubmit="return validateForm()">
        <div class="border1" style="width: 750px;">
          <font size="+2">
            <table align="center" size="80%">
              <tr>
                <td><b> Username </b></td>
                <td><input type="text" name="username">
                </td>
              </tr>
              <tr>
                <td><b> Password </b></td>
                <td><input type="password" name="password"></td>
              </tr>
              <tr>
                <td align="center">
                  <input name="reset" type="reset" value="Clear">
                </td>
                <td align="center">
                  <input name="submit" type="submit" value="Login" class="btn1 btnhover">
                </td>
              </tr>
            </table>
        </div>
        </font>
        <?php include("footer.php"); ?>