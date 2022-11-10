<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Poppins:ital@1&family=Silkscreen&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css"/>
</head>
<body>

	

	<div id="box">
		<br>
		<img src="logo.png">
		</br>
		<h1> ADMINISTRASI MAHASISWA </h1><br>
		<br>
		<form method="post">
			
			<label for="user_name">Username</label>
			<br>
			<input id="text" type="text" name="user_name">
			<br>
			<br>
			<label for="password">Password</label>
			<br>
			<input id="text" type="password" name="password">
			<br>
			<br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>