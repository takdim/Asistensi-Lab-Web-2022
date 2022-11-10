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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
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
			<input class="btn" id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>