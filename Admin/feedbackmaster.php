 

<?php include("mainheader.php"); 
include("con1.php");
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_admin = $conn->prepare("DELETE FROM `feedback` WHERE id = ?");
    $delete_admin->execute([$delete_id]);
}
$query = "select * from feedback";
$result = mysqli_query($con, $query);
echo "<table border='5' align='center'>
<h1 align='center'><font color='white' size='+5'><u> Feedback  Management </u></font></h1>
<th><font color='#fac564' size='+2'><ul >Id </font></ul></th>
<th><font color='#fac564'  size='+2'><ul> Name </font></ul></th>
<th><font color='#fac564'  size='+2'><ul> Email </font></ul></th>
<th><font color='#fac564'  size='+2'><ul> Subjct </font></ul></th>
<th><font color='#fac564'  size='+2'><ul> Feedback </font></ul></th>
<th><font color='#fac564'  size='+2'><ul> Delete </font></ul></th>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>";
    echo $row["id"];
    echo "</td><td>";
    echo $row["name"];
    echo "</td><td>";
    echo $row["email"];
    echo "</td><td>";
    echo $row["subject"];
    echo "</td><td>";
    echo $row["feedback"];
    echo "</td>
<td><a href='feedbackmaster.php?delete=" . $row[0] . "'onclick='return confirm(`delete this feedback?`);'><font color='#fac564'><ul> X </ul></font></a></td>";
}
echo "</tr></table>";
include("footer.php"); ?>

	