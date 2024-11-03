<?php include("header.php");
include("con1.php");
    $id = $_GET['id'];
    $query = "select * from items where id=$id";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
    ?><center>
            <div class="border1" style="width: 850px;">
                <form action="itemeditsave.php" method="post" enctype="multipart/form-data">
                    <h1 align="center">
                        <font color='WHITE' size='+5'><u> ITEMS EDIT </u></font>
                    </h1>
                    <table align="center">
                        <tr>
                            <td>
                                <font color='#fac564' size='+3'> </font>
                            </td>
                            <td><input type="text" name="id" value="<?php echo $row['0']; ?>" hidden></td>
                        </tr>
                        <tr>
                            <td>
                                <font color='#fac564' size='+3'>Old Categories</font>
                            </td>
                            <td><input type="text" value="<?php echo $row['cname']; ?>"> </td>
                        </tr>
                        <tr>
                            <td>
                                <font color='#fac564' size='+3'>Select New Categories</font>
                            </td>
                            <td><select name="category">
                                    <?php
                                    $category = mysqli_query($con, "SELECT * FROM category");
                                    while ($c = mysqli_fetch_array($category)) {
                                    ?>
                                        <option><?php
                                                echo $c['cname'];

                                                ?></option>
                                    <?php } ?>
                                </select>
                        </tr>
                        <tr>
                            <td>
                                <font color='#fac564' size='+3'> Item Name </font>
                            </td>
                            <td><input type="text" name="itemname" value="<?php echo $row['itemname']; ?>"> </td>
                        </tr>
                        <tr>
                            <td>
                                <font color='#fac564' size='+3'> Price </font>
                            </td>
                            <td><input type="text" name="price" value="<?php echo $row['price']; ?>"></td>
                        </tr>
                        <tr>
                            <td>
                                <font color='#fac564' size='+3'> Image </font>
                            </td>
                            <td><input type="file" name="im" value="<?php echo $row['image']; ?>"></td>
                        </tr>
                        <tr>
                            <td>
                                <font color='#fac564' size='+3'> Description </font>
                            </td>
                            <td><input type="text" name="desc" value="<?php echo $row['desc']; ?>"></td>
                        </tr>
                        <tr>
                            <td align="center">
                                <input name="submit" type="submit" value="update" class="btn1 btnhover">

                            </td>
                            <td align="center">
                                <input name="reset" type="reset" value="Clear">
                            </td>
                        </tr>
                    </table>
            </div>
            <br><br>
        </center>
        </form>
    <?php } include("footer.php"); ?>
