<?php
include('server.php');
$host = 'localhost';
$user = 'root';
$pass = '';
$u = $_SESSION['username'];
//$sql = "SELECT * FROM phone,items GROUP BY name";
$sql = "SELECT * FROM items INNER JOIN phone ON iid=pid";
$records = mysqli_query($conn,$sql);
$temp = "";
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

<table id="tbl"width="600" border = "1" cellpadding="1" cellspacing="1">
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
		Comment: <input type="text" name="comm">
		<button>Post</button>
    <button onclick = "sort_price" class="btn">Sort By Price</button>
  <script>
  function sort_price()
  {
  document.getElementById('tbl').innerHTML = "<?php
  $qry="SELECT * FROM items INNER JOIN phone ON iid=pid ORDER BY price";
  $result=mysqli_query($conn,$qry);
  $temp = "<tr><th>name</th><th>color</th><th>price</th><th>brand</th><th>camera</th><th>comment</th>";
  while($row = (mysqli_fetch_assoc($result))){
    $temp=$temp."<tr>".
    "<td>".$row['name']."</td>"
    ."<td>".$row['color']."</td>"
    . "<td>".$row['price']."</td>"
    . "<td>".$row['brand']."</td>"
    . "<td>".$row['camera']."</td>"
    . "<td>".$row['comment']."</td>"
    . "</tr>";
    //  $temp = $temp."<td>".$row['name'] .
    //   "</td><td>" . $row['color'] . "</td><td>".$row['price']."</td><td>".$row['brand']. "</td><td>".$row['year']. "</td><td>"."$row['horsepower']"."</tr>";  //$row['index'] the index here is a field name
    }
    $temp = $temp."</tr>";
    echo $temp?>";}
  </script>
</body>
</html>
