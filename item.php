<?php include("header.php");
include("con1.php"); ?>
    <center>
        <div class="border1" style="width: 750px;">
            <h1 align='center'>
                <font color='white' size='+5'><u> ITEM </u></font>
            </h1>
            <form action="itemsave.php" method="post" enctype="multipart/form-data" name="itm" onSubmit="return validateForm()">
                <table align="center">
                     <tr>
                        <td>
                            <font color='#fac564' size='+3'>Categories</font>
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
                        <td><input type="text" name="itemnm" required></td>
                    </tr>
                    <tr>
                        <td>
                            <font color='#fac564' size='+3' >Item Price </font>
                        </td>
                        <td><input type="text" name="price" required> </td>
                    </tr>
                    <tr>
                        <td>
                            <font color='#fac564' size='+3' >Item Image </font>
                        </td>
                        <td><input type="file" name="im" required></td>
                    </tr>
                    <tr>
                        <td>
                            <font color='#fac564' size='+3'>Item Description </font>
                        </td>
                        <td><input type="text" name="desc"></td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input name="submit" type="submit" value="Add" class="btn1 btnhover">
                        </td>
                        <td align="center">
                            <input name="reset" type="reset" value="Clear">
                        </td>
                    </tr>
                </table>
        </div>   </form>
 <?php include("footer.php"); ?>
