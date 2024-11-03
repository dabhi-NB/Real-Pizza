<?php include("header.php");
    include("con1.php");
    $id = $_GET['id'];
    $query = "select * from category where cid=$id";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <center>
            <div class="border1" style="width: 750px;">
                <form action="categoryeditsave.php" method="post" enctype="multipart/form-data">
                    <h1 align="center">
                        <font color='WHITE' size='+5'><u> CATEGORY EDIT </u></font>
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
                                <font color='#fac564' size='+3'> Category Name
                            </td>
                            <td><input type="text" name="cname" value="<?php echo $row['1']; ?>"></td>
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
    <?php }   include("footer.php"); ?>
