<?php
include('server.php');
$host = 'localhost';
$user = 'root';
$pass = '';
$u = $_SESSION['username'];
//$sql = "SELECT * FROM phone,items GROUP BY name";
$sql = "SELECT * FROM items INNER JOIN phone ON iid=pid";
$records = mysqli_query($conn,$sql);
?>

<html>
<head>
<title> Phone display </title>
<style>
</style>
</head>
<body>
<section>
  <button><a href="display.php">Display Car</a></button>
  <button><a href="displayphone.php">Display Phone</a></button>
  <button><a href="index.php">HOME page</a></button>
  <div id="form_input"></div>
  </section>
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
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['color']."</td>";
		echo "<td>".$row['price']."</td>";
		echo "<td>".$row['brand']."</td>";
		echo "<td>".$row['camera']."</td>";
		echo "<td>".$row['comment']."</td>";
		echo "</tr>";
	}?>
</table>
</form>
<section>
		Comment: <input type="text" name="comm">
		<button>post</button>
	</section>
</body>
</html>