<?php
include('server.php');
$host = 'localhost';
$user = 'root';
$pass = '';
$u = $_SESSION['username'];
$sql = "SELECT * FROM phone,Items WHERE username=$u GROUP BY price";
$records = mysqli_query($conn,$sql);
?>

<html>
<head>
<title> Phone display </title>
<style>
</style>
</head>
<body>
<form>

<table width="600" border = "1" cellpadding="1" cellspacing="1">
	<tr>
	<th>Created By</th>
  <th>Color</th>
	<th>Price</th>
  <th>Brand</th>
  <th>camera</th>
  <th>Comments</th>

	</tr>

	<?php
	while ($row = mysqli_fetch_assoc($records))
	{
		echo "<tr>";
		echo "<td>".$row['username']."</td>";
		echo "<td>".$row['color']."</td>";
    echo "<td>".$row['price']."</td>";
    echo "<td>".$row['brand']."</td>";
    echo "<td>".$row['camera']."</td>";
    echo "<td>".$row['comment']."</td>";
		echo "</tr>";
	}?>
</table>
</form>
<body>