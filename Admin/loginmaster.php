<?php include("mainheader.php"); ?>
<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery.ba-cond.min.js"></script>
<script src="js/jquery.slitslider.js"></script>
<?php
require("con1.php");
if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $delete_admin = $conn->prepare("DELETE FROM `login` WHERE id = ?");
  $delete_admin->execute([$delete_id]);
}
$query = "select * from login";
$result = mysqli_query($con, $query);
echo "<table align='center' border='4' >
<h1 align='center'><font color='white' size='+4'><u> User Accounts </u></font></h1>
<th><font color='#fac564' size='2'><ul>Id</ul></font></th>
<th><font color='#fac564' size='+2'><ul>Username</font></ul></th>
<th><font color='#fac564' size='+2'><ul>Password</font></ul></th>
<th><font color='#fac564' size='+2'><ul>User Image</font></ul></th>
<th><font color='#fac564' size='+2'><ul>Name</font></ul></th>
<th><font color='#fac564' size='+2'><ul>Address</font></ul></th>
<th><font color='#fac564' size='+2'><ul>City</font></ul></th>
<th><font color='#fac564' size='+2'><ul>Pincode</font></ul></th>
<th><font color='#fac564' size='+2'><ul>State</font></ul></th>
<th><font color='#fac564' size='+2'><ul>Country</font></ul></th>
<th><font color='#fac564' size='+2'><ul>Gender</font></ul></th>
<th><font color='#fac564' size='+2'><ul>Phone no</font></ul></th>
<th><font color='#fac564' size='+2'><ul>Email</font></ul></th>
<th><font color='#fac564' size='+2'><ul>Delete</font></ul></th>";
while ($row = mysqli_fetch_array($result)) {
  echo "<tr><td>";
  echo $row["id"];
  echo "</td><td>";
  echo $row["username"];
  echo "</td><td>";
  echo $row["password"];
  echo "</td><td>";
  if ($row['user_image'] != "") {
    echo "<img src='../user_image/$row[user_image]' height=100 width=100 style='margin-left:5px' alt='not added'>";
  } else {
    if ($row['gender'] == "male") {
      echo "<img src='..\icon\men.svg' height=100 width=100 style='margin-left:5px' alt='not added'>";
    } else {
      echo "<img src='..\icon\women.svg' height=100 width=100 style='margin-left:5px' alt='not added'>";
    }
  }
  echo "</td><td>";
  echo $row["name"];
  echo "</td><td>";
  echo $row["address"];
  echo "</td><td>";
  echo $row["city"];
  echo "</td><td>";
  echo $row["pincode"];
  echo "</td><td>";
  echo $row["state"];
  echo "</td><td>";
  echo $row["country"];
  echo "</td><td>";
  echo $row["gender"];
  echo "</td><td>";
  echo $row["phone_no"];
  echo "</td><td>";
  echo $row["email"];
  echo "</td><td>";
  echo "<a href='loginmaster.php?delete=" . $row[0] . "'  onclick='return confirm(`delete this account?`);'><font color='#fac564'size='+3'><ul>X</ul></font></a></td>";
}
echo "</tr></table></div>";
include("footer.php"); ?>