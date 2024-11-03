<?php include("header.php");
include("con1.php");
$id = $_GET['id'];
$query = "select * from login where id=$id";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result)) { ?>
    <form action="registrationeditsave.php" method="post">
        <h1 align="center">Update</h1>
        <font size="+2">
            <center>
                <div class="border" style="width: 850px;">
                    <table align="center" size="80%" class="wcolor">
                        <tr>
                            <td><input type="text" name="id" value="<?php echo $row['0']; ?>" hidden></td>
                        </tr>
                        <tr>
                            <td> Image </td>
                            <td><input type="file" name="userimg" value="<?php echo $row['3']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="nm" value="<?php echo $row['4']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="address" value="<?php echo $row['5']; ?>"></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><input type="text" name="city" value="<?php echo $row['6']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Pincode</td>
                            <td><input type="text" name="pincode" value="<?php echo $row['7']; ?>"></td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td><input type="text" name="state" value="<?php echo $row['8']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td><input type="text" name="country" value="<?php echo $row['9']; ?>"></td>
                        </tr>
                        <tr>
                            <td> Gender</td>
                            <td><input type="radio" name="gender" value="male" required>Male
                                <input type="radio" name="gender" value="female" required>Female
                            </td>
                        </tr>
                        <tr>
                            <td>Mno</td>
                            <td><input type="text" name="mno" value="<?php echo $row['11']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?php echo $row['12']; ?>"></td>
                        </tr>
                        <tr>
                            <td><br>
                                <center><input type="submit" name="registration" value="update" class="btn1 btnhover"></center>
                            </td>
                            <td><br>
                                <center><input type="reset" name="cancel" value="clear" class="btn1 btnhover"></center>
                            </td>
                        </tr>
                    </table>
            </center>
            </div>
    </form>
<?php }
 include("footer.php"); ?>