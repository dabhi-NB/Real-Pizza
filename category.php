<?php include("header.php");
include("con1.php"); ?>
    <center>
        <div class="border1" style="width: 750px;">
            <h1 align='center'>
                <font color='white' size='+5'><u> Add New Category </u></font>
            </h1>
            <form action="categorysave.php" method="post" enctype="multipart/form-data" name="itm"
                onSubmit="return validateForm()">
                <table align="center" size="80%">
                    <tr>
                        <td>
                            <font color='#fac564' size='+3'> All Categories</font>
                        </td>
                        <td><select name="category">
                                <?php
                                $category = mysqli_query($con, "SELECT * FROM category");

                                while ($c = mysqli_fetch_array($category)) {
                                ?>
                                    <option><?php
                                            echo $c['cname']; ?></option>
                                <?php } ?>
                            </select>
                    </tr>
                    <tr>
                        <td>
                            <font color='#fac564' size='+3'> Add New Name </font>
                        </td>
                        <td><input type="text" name="cname" required> </td>
                    <tr>
                        <td align="center">
                            <input name="submit" type="submit" value="Add" class="btn1 btnhover">
                        </td>
                        <td align="center">
                            <input name="reset" type="reset" value="Clear">
                        </td>
                    </tr>
                </table>
        </div>
    </center></form>
    <?php include("footer.php"); ?>
    
