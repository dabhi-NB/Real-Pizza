<?php include("mainheader.php");
include("con1.php");
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_admin = $conn->prepare("DELETE FROM `category` WHERE cid = ?");
    $delete_admin->execute([$delete_id]);
}
$query = "select *from category";
$result = mysqli_query($con, $query);
echo "<table border='5' align='center'>
<h1 align='center'><font color='white' size='+5'><u>Categories Management </u></font></h1>
<th><font color='#fac564' size='+2'><ul>Id</font></ul></th>
<th><font color='#fac564' size='+2'><b><ul>Category Name</font></ul></th>
<th><font color='#fac564' size='+2'><b><ul>Edit</font></ul></th>
<th><font color='#fac564' size='+2'><b><ul>Delete</font></ul></th>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>";
    echo $row["cid"];
    echo "</td><td>";
    echo $row["cname"];
    echo "</td><td><a href='categoryedit.php? id=" . $row[0] . "'><font color='#fac564'><ul> Edit </ul></font></a></td>
<td><a href='categorymaster.php?delete=" . $row[0] . "' onclick='return confirm(`delete this category?`);'><font color='#fac564'><ul> X </ul></font></a></td>";
}
echo "</tr>";
echo "<br>";
echo "<td colspan='10' align='center'><a href='category.php'><h1><font color='#fac564'><ul> Insert New Category </ul></font></h1></a></td>";
echo "</table>";
include("footer.php"); ?>
