<?php include("mainheader.php");
include("con1.php");
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_admin = $conn->prepare("DELETE FROM `items` WHERE id = ?");
    $delete_admin->execute([$delete_id]);
}
$query = "select *from items";
$result = mysqli_query($con, $query);
echo "<table border='5' align='center'>
<h1 align='center'><font color='white' size='+5'><u>Item  Management</u></font></h1>
<th><font color='#fac564' size='+2'><ul>Id</font></ul></th>
<th><font color='#fac564' size='+2'><b><ul>Category</font></ul></th>
<th><font color='#fac564' size='+2'><b><ul>Item name</font></ul></th>
<th><font color='#fac564' size='+2'><b><ul>Price</font></ul></th>
<th><font color='#fac564' size='+2'><b><ul>Image</font></ul></th>
<th><font color='#fac564' size='+2'><b><ul>Edit</font></ul></th>
<th><font color='#fac564' size='+2'><b><ul>Delete</font></ul></th>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>";
    echo $row["id"];
    echo "</td><td>";
    echo $row["cname"];
    echo "</td><td>";
    echo $row["itemname"];
    echo "</td><td>";
    echo $row["price"];
    echo "</td><td>";
    echo "<img src='../IMAGE_PROJECT/$row[image]' height=100 width=100 style='margin-left:5px'>";
    echo "</td><td><a href='itemedit.php? id=" . $row[0] . "'><font color='#fac564'><ul> Edit </ul></font></a></td>
<td><a href='itemmaster.php?delete=" . $row[0] . "' onclick='return confirm(`delete this item?`);'><font color='#fac564'><ul> X </ul></font></a></td>";
}
echo "</tr>";
echo "<br>";
echo "<td colspan='10' align='center'><a href='item.php'><h1><font color='#fac564'><ul> Insert New Item </ul></font></h1></a></td>";
echo "</table>";
include("footer.php"); ?>
