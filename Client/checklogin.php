<?php
include("con1.php");
$username = $_POST['username'];
$password = $_POST['password'];
if ($username == " " || $password == " ") {
    header("location:login.php");
} else {
    $query = "select * from login where username='$username' and password='$password'";
    $result = mysqli_query($con, $query);
    $res = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if ($count == 0) { ?>
        <script type="text/javascript">
            alert("In valid username or password");
            window.location = "login.php";
        </script>
    <?php } else {
        session_start();
        $_SESSION["login"] = true;
        $_SESSION['user_id'] = $res['id'];
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password; ?>
        <script type="text/javascript">
            alert("Login Successfully");
            window.location = "index.php"
        </script>
<?php }
} ?>