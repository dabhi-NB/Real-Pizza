<?php include("header.php");
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $username = $_SESSION["username"];
  $password = $_SESSION["password"];
  $query = "select * from login where username='$username' and password='$password'";
  $result = mysqli_query($con, $query);
  while ($row = mysqli_fetch_array($result)) {?>
    <h1 align="center">
      <font color='white' size='+5'>Your Profile
      </font>
    </h1>
    <div class=" user">
      <center>
        <div class="border">
          <font size="+2">
            <table align="center" size="80%">
              <tr>
                <td colspan="2" align="center">
                  <?php if ($row['user_image']) { ?>
                    <img src="../user_image/<?php echo $row['user_image'] ?>" class="img" alt="user image" style="width: 300px;">
                    <?php } else {
                    if ($row['gender'] == "male") { ?>
                      <img src="../user_image/men.svg" class="img" alt="user image" style="width: 300px;">
                    <?php } else { ?>
                      <img src="../user_image/women.svg" class="img" alt="user image" style="width: 300px;">
        </div>
    <?php  }
                  } ?>
    <br></td>
    </tr>
    <tr>
      <td class="wcolor"> Username : </td>
      <td><?php echo $row["username"] ?></td>
    </tr>
    <tr>
      <td class="wcolor"> password :</td>
      <td><?php echo $row["password"] ?></td>
    </tr>
    <tr>
      <td class="wcolor"> Name : </td>
      <td><?php echo $row["name"] ?></td>
    </tr>
    <tr>
      <td class="wcolor"> Address : </td>
      <td><?php echo $row["address"] ?></td>
    </tr>
    <tr>
      <td class="wcolor"> City :</td>
      <td><?php echo $row["city"] ?></td>
    </tr>
    <tr>
      <td class="wcolor"> Pincode : </td>
      <td><?php echo $row["pincode"] ?></td>
    </tr>
    <tr>
      <td class="wcolor"> state :</td>
      <td><?php echo $row["state"] ?></td>
    </tr>
    <tr>
      <td class="wcolor"> Country :</td>
      <td><?php echo $row["country"] ?></td>
    </tr>
    <tr>
      <td class="wcolor"> Gender : </td>
      <td><?php echo $row["gender"] ?></td>
    </tr>
    <tr>
      <td class="wcolor"> Mobileno : </td>
      <td><?php echo $row["phone_no"] ?></td>
    </tr>
    <tr>
      <td class="wcolor"> Email : </td>
      <td><?php echo $row["email"] ?></td>
    </tr>
    <tr>
      <td colspan="2"><br>
        <center><a href="registrationedit.php?id=<?php echo $row['id'] ?>" class="btn1 btnhover">Update</a></center>
      </td>
    </tr>
    </table>
      </center>
    </div>
    </div>
<?php }
}
include("footer.php"); ?>