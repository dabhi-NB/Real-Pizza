<?php include("header.php"); ?>
<script type="text/javascript">
    function validateForm() {
        var a = document.forms["regi"]["nm"].value;
        var b = document.forms["regi"]["address"].value;
        var c = document.forms["regi"]["city"].value;
        var d = document.forms["regi"]["pincode"].value;
        var e = document.forms["regi"]["state"].value;
        var f = document.forms["regi"]["country"].value;
        var g = document.forms["regi"]["username"].value;
        var i = document.forms["regi"]["password"].value;
        var k = document.forms["regi"]["gender"].value;
        var l = document.forms["regi"]["mno"].value;
        var m = document.forms["regi"]["email"].value;
        var n = document.forms["regi"]["dob"].value;
        if ((a == null || a == "") && (b == null || b == "") && (c == null || c == "") && (d == null || d == "") && (e == null || e == "") && (f == null || f == "") && (g == null || g == "") && (i == null || i == "") &&
            (k == null || k == "") && (l == null || l == "") && (m == null || m == "") && (n == null || n == "")) {
            alert("All Field must be filled out");
            return false;
        }
        if (a == null || a == "") {
            alert("name must be filled out");
            return false;
        }
        if (b == null || b == "") {
            alert("adderss must be filled out");
            return false;
        }
        if (c == null || c == "") {
            alert("city must be filled out");
            return false;
        }
        if (d == null || d == "") {
            alert("pincode must be filled out");
            return false;
        }
        if (d.length < 6) {
            alert("pincode should be atleast 6 characters.");
            return false;
        }
        if (!(d.match(/^[a-z,0-9][\w-]*$/i))) {
            alert("Pincode can not contain any special character or spaces except '_' or '-' . ");
            return false;
        }
        if (e == null || e == "") {
            alert("state must be filled out");
            return false;
        }
        if (f == null || f == "") {
            alert("country must be filled out");
            return false;
        }
        if (g == null || g == "") {
            alert("username must be filled out");
            return false;
        }
        if (i == null || i == "") {
            alert("password must be filled out");
            return false;
        }
        if (i.length < 5) {
            alert("password should be atleast 5 characters.");
            return false;
        }
        if (!(i.match(/^[a-z,0-9][\w-]*$/i))) {
            alert("Password can not contain any special character or spaces except '_' or '-' . ");
            return false;
        }
        if (k == null || k == "") {
            alert("gender must be filled out");
            return false;
        }
        if (l == null || l == "") {
            alert("mobile number must be filled out");
            return false;
        }
        if (!(l.match(/^\d{10}$/))) {
            alert("invalid mobile number");
            return false;
        }
        if (m == null || m == "") {
            alert("email must be filled out");
            return false;
        }
        if (!(m.match(/^[\w]+([_|\.-][\w]{1,})*@[\w]{2,}([_|\.-][\w]{1,})*\.([a-z]{2,4})$/))) {
            alert("enter valid email id");
            return false;
        }
        if (n == null || n == "") {
            alert("dob must be filled out");
            return false;
        }
    }
</script>
    <br><br><center>
        <h1 align="center"><font color='white' size='+5'><u> REGISTRATION </u> </font></h1>
        <form action="registrationsave.php" method="post" name="regi" onSubmit="return validateForm()">
            <div class="border" style="width: 750px;">
                <font size="+2">
                    <table align="center" size="80%">
                        <tr>
                            <td class="btnhover">Username:</td>
                            <td><input type="text" name="username" required></td>
                        </tr>
                        <tr>
                            <td class="btnhover">password:</td>
                            <td><input type="text" name="password" required></td>
                        </tr>
                        <tr>
                            <td class="btnhover"> image : </td>
                            <td><input type="file" name="userimg"></td>
                        </tr>
                        <tr>
                            <td class="btnhover"> Name : </td>
                            <td><input type="text" name="nm"></td>
                        </tr>
                        <tr>
                            <td class="btnhover"> Address : </td>
                            <td><textarea name="address"></textarea></td>
                        </tr>
                        <tr>
                            <td class="btnhover"> City : </td>
                            <td><input type="text" name="city"></td>
                        </tr>
                        <tr>
                            <td class="btnhover"> Pincode : </td>
                            <td><input type="text" name="pincode"></td>
                        </tr>
                        <tr>
                            <td class="btnhover"> state : </td>
                            <td><input type="text" name="state"></td>
                        </tr>
                        <tr>
                            <td class="btnhover"> Country : </td>
                            <td><input type="text" name="country"></td>
                        </tr>

                        <tr>
                            <td class="btnhover"> Gender : </td>
                            <td><input type="radio" name="gender" value="male" required>Male
                                <input type="radio" name="gender" value="female" required>Female
                            </td>
                        </tr>
                        <tr>
                            <td class="btnhover"> Mobileno : </td>
                            <td><input type="text" name="mno"></td>
                        </tr>
                        <tr>
                            <td class="btnhover"> Email : </td>
                            <td><input type="text" name="email"></td>
                        </tr>

                        <tr>
                            <td align="center">
                                <input name="reset" type="reset" value="Clear">
                            </td>
                            <td>
                                <input name="submit" type="submit" value="registration" class="btn1 btnhover">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><br>
                                <center>
                                    <h3>Already have an account? <a href="login.php">Login now</a></h3>
                                </center>
                            </td>
                        </tr>
                    </table>
            </div>
            </font>
            <?php include("footer.php"); ?>