<?php
session_start();
// variable declaration
$host = 'localhost';
$user = 'root';
$pass = '';
$username = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";
//Database creation and connection
$sql = "CREATE DATABASE registration";
$conn = new mysqli($host,$user,$pass);
// if($conn->query($sql))
	// echo "connected";
	// else 
	// {
		// echo "not connected";
	// }
if($conn->connect_error){
	die("Connection failed".$conn->connect_error);}
	
$conn->close();
// connect to database
$conn = mysqli_connect($host, $user, $pass, 'registration');
if($conn->connect_error)
	echo "not connected";
//DROP TABLE IF EXISTS `users`;
 $use="CREATE TABLE `users`(
	id			INTEGER(4)		NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username	VARCHAR(100)	NOT NULL ,
	password	VARCHAR(100)	NOT NULL ,
	email		VARCHAR(100)	NOT NULL )";
	$conn->query($use);
	
//DROP TABLE IF EXISTS `items`;
$ite = "CREATE TABLE `items`(
	iid			INTEGER(3)		NOT NULL PRIMARY KEY AUTO_INCREMENT,
	color		VARCHAR(100)	NOT NULL ,
	price		INTEGER(100)	NOT NULL )";
	$conn->query($ite);
	
//DROP TABLE IF EXISTS `phone`;
$pho = "CREATE TABLE `phone`(
	pid			INTEGER(4)		PRIMARY KEY PRIMARY KEY AUTO_INCREMENT,
	camera		VARCHAR(100)	NOT NULL ,
	brand		VARCHAR(100)	NOT NULL ,
	comment		TEXT(100)		NOT NULL , 
	name		VARCHAR(100)	NOT NULL )";
	$conn->query($pho);
	
//DROP TABLE IF EXISTS `car`;
$car ="CREATE TABLE `car`(
	cid			INTEGER(4)		PRIMARY KEY PRIMARY KEY AUTO_INCREMENT,
	brand		VARCHAR(100)	NOT NULL ,
	year		INTEGER(100)	NOT NULL ,
	horsepower	INTEGER(100)	NOT NULL ,
	comment		TEXT(100)		NOT NULL,
	name		VARCHAR(100)	NOT NULL 	)";
	$conn->query($car);
	
$com ="CREATE TABLE `com`(
	comid		INTEGER(4)		PRIMARY KEY PRIMARY KEY AUTO_INCREMENT,
	name		VARCHAR(100)	NOT NULL ,
	comment		TEXT(100)	NOT NULL	)";
	$conn->query($com);

if(isset($_POST['getComment'])){
//$finalcomment=$pcomment."by".$username;
$comm = mysqli_real_escape_string($conn, $_POST['comment']);
$u=$_SESSION['username'];
$qry = "INSERT INTO com(name,comment)
VALUES ('$u','$comm');";
mysqli_query($conn,$qry);

}
	
if(isset($_POST['savephone'])){
$pcomment = mysqli_real_escape_string($conn, $_POST['pcmt']);
//$finalcomment=$pcomment."by".$username;
$color = mysqli_real_escape_string($conn, $_POST['clr']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$camera = mysqli_real_escape_string($conn, $_POST['cam']);
$pbrand = mysqli_real_escape_string($conn, $_POST['pbrand']);
$u=$_SESSION['username'];
$qry = "INSERT INTO phone(camera, brand, comment,name)
VALUES ('$camera', '$pbrand', '$pcomment','$u');";
$qr = "INSERT INTO items(color, price)
VALUES ('$color', '$price');";
mysqli_query($conn,$qry);
mysqli_query($conn,$qr);
}
//$db = mysqli_connect('localhost', 'root', '', 'registration');
/////my code starts here
if(isset($_POST['savecar'])){
$color = mysqli_real_escape_string($conn, $_POST['clr']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$ccomment = mysqli_real_escape_string($conn, $_POST['ccmt']);
$hp = mysqli_real_escape_string($conn, $_POST['hp']);
$cbrand = mysqli_real_escape_string($conn, $_POST['cbrand']);
$year = mysqli_real_escape_string($conn, $_POST['year']);
$u=$_SESSION['username'];
$qry = "INSERT INTO car (brand, year,horsepower, comment,name)
		VALUES ('$cbrand', '$year', '$hp','$ccomment','$u')";
 $qr = "INSERT INTO items(color, price)
		 VALUES ('$color', '$price')";
mysqli_query($conn,$qry);
mysqli_query($conn,$qr);
}
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
  // form validation: ensure that the form is correctly filled
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($conn, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
 //upload image to database
// $imagename = $_FILES["myimage"]["name"];
// //get the content of the image and then add slashes to it
// $imagetmp = addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
// //insert the image name and image content in image_table
// $insert_image = "INSERT INTO items VALUES ('$imagetmp','$imagename')";
// mysql_query($insert_image);
?>