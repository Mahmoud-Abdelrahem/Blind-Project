<?php
include '../shared/header.php';
include '../shared/navbar.php';
include '../general/env.php';
include '../general/functions.php';


if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$Select ="SELECT * FROM `users` WHERE username = '$username' and password ='$password' ";
	$quer=mysqli_query($conn, $Select);
	$num_rows=mysqli_num_rows($quer);
	$row=mysqli_fetch_assoc($quer);

	if($num_rows==1)
	{
		$_SESSION['user']=['username'=> $username , 'id' => $row['id'] ,'statues_id' => $row['statues_id']];
		header("location: /Projects/BlindProject/index.php");
	}
	else
	{
		echo "False User";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h2>Login Page</h2>
	<form class="loginForm" method="post">
		<label>Username:</label><br>
		<input type="text" placeholder="Enter Your Username"  name="username"><br>
		<label>Password:</label><br>
		<input type="password"  placeholder="Enter Your Password"  name="password"><br><br>
		<input  name= "login" type="submit" value="Login">
	</form>
</body>
</html>
