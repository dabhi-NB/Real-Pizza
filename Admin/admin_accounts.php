<?php
include 'con1.php';
if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_admin = $conn->prepare("DELETE FROM `admin` WHERE id = ?");
   $delete_admin->execute([$delete_id]);
   header('location:admin_accounts.php');
}
 include 'mainheader.php';
$query="select * from admin";
$result=mysqli_query($con,$query);
echo"<table align='center' border='4' >
<h1 align='center'><font color='white' size='+4'><u> Admin Accounts </u></font></h1>
<th><font color='#fac564' size='+2'><ul>Admin id </ul></font></th>
<th><font color='#fac564' size='+2'><ul>Username</font></ul></th>
<th><font color='#fac564' size='+2'><ul>Password</font></ul></th>
<th><font color='#fac564' size='+2'><ul>Update</font></ul></th>
<th><font color='#fac564' size='+2'><ul>Delete</font></ul></th>";
while($row=mysqli_fetch_array($result))
{
echo"<tr><td>";
echo $row["id"];
echo "</td><td>";
echo $row["username"];
echo "</td><td>";
echo $row["password"];
echo "</td><td>";
echo"<a href='update_profile.php?id=".$row[0]."'><font color='#fac564'size='+2'><ul>update</ul></font></a></td>";
echo "</td><td>";
echo"<a href='admin_accounts.php?delete=".$row[0]."'  onclick='return confirm(`delete this account?`);'><font color='#fac564'size='+2'><ul>X</ul></font></a></td>";
}
echo"</tr><tr>
<td colspan='4' align='center'><a href='register_admin.php'><h1><font color='#fac564'><ul> Insert New Admin </ul></font></h1></a>
</td></tr></table></div>";
 include("footer.php"); ?>
                                        




