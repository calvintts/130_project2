<?php
$host = 'localhost';
$user = 'root';
$pass = '';

$db = mysqli_connect($host,$user,$pass,'registration');

$sql = "SELECT * FROM users";
$records = mysqli_query($db,$sql);



?>

<html>
<head>
<title> something </title>
<style>
</style>
</head>
<body>
<form>
	
<table width="600" border = "1" cellpadding="1" cellspacing="1">
	<tr>
	<th>username</th>
	<th>email</th>

	</tr>
	
	<?php
	while ($employee = mysqli_fetch_assoc($records))
	{
		echo "<tr>";
		echo "<td>".$employee['username']."</td>";
		echo "<td>".$employee['email']."</td>";
		// echo "<td>".$employee['position']."</td>";
		// echo "<td>".$employee['salary']."</td>";
		echo "</tr>";
	}?>
</table>
</form>
<body>
