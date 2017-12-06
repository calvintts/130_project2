<?php
include('server.php');
$host = 'localhost';
$user = 'root';
$pass = '';
$u = $_SESSION['username'];
//$sql = "SELECT * FROM car,items";
$sql = "SELECT * FROM items JOIN car WHERE iid=cid";
$records = mysqli_query($conn,$sql);
$temp = "";
?>
<html>
<head>
<title> Display </title>
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

<table id="tbl" width="600" border = "1" cellpadding="1" cellspacing="1">
	<tr>
	<th>Created By</th>
    <th>Color</th>
	<th>Price</th>
   <th>Brand</th>
   <th>Year</th>
  <th>Horsepower</th>
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
    echo "<td>".$row['year']."</td>";
    echo "<td>".$row['horsepower']."</td>";
    echo "<td>".$row['comment']."</td>";
		echo "</tr>";
	}
	?>

</table>
</form>
		Comment: <input type="text" name="comm">
    <div><button class="btn">Submit</button></div>
		<div><button onclick="sort_price()">Sort By Price</button></div>
    <script>
    function sort_price()
  {  document.getElementById('tbl').innerHTML = "<?php
    $qry="SELECT * FROM items JOIN car WHERE iid=cid ORDER BY price";
    $result=mysqli_query($conn,$qry);
    $temp = "<tr><th>name</th><th>color</th><th>price</th><th>brand</th><th>year</th><th>horsepower</th><th>comment</th>";
    while($row = (mysqli_fetch_assoc($result))){
      $temp=$temp."<tr>".
      "<td>".$row['name']."</td>"
      ."<td>".$row['color']."</td>"
      . "<td>".$row['price']."</td>"
      . "<td>".$row['brand']."</td>"
      . "<td>".$row['year']."</td>"
      . "<td>".$row['horsepower']."</td>"
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
