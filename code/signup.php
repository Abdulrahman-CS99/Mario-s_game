<?php 
	session_start();

	// connect to database
	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			//Insert into to database
			$user_id = random_num(5);
			$query = "INSERT INTO users (user_id, user_name, password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo '<script> alert("Please fill all fields!") </script>';
		}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<title> Register </title>

		<style type="text/css">
		
			body{

				margin: 0 auto;
				background-color: rgb(28, 24, 66);
				text-align: center;
				font-family: 'Courier New', Courier, monospace;
				color: white;
			}

			#text{

				margin: 15px;
				padding: 10px;
				border-radius: 10px;
				color: white;

				border-style: none;
				border: 0px;
				border-bottom: 1px solid rgb(135, 219, 110);

				box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
				text-align: center;
				background-color: rgb(7, 9, 37);
			}

			#button{

				padding: 10px;
				margin: 20px;
				border: 0px;
				width: 120px;
				border-radius: 8px;
			}

			#button:hover{

				color: white;
				background-color: rgb(135, 219, 110);
				box-shadow: 0px 0px;
				transition: all 0.8s;
			}

			#box{

				margin: auto;
				margin-top: 5%;
				border-radius: 10px;
				height: 480px;
				width: 400px;

				box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
				background-color: rgb(7, 9, 37);
				padding: 10px;
			}
			
			a{
				text-decoration:none;
				color:white;
			}
			
			a:hover{
				opacity: 0.5;
			}

		</style>
	</head>
	<body>

		<div id="box" ALIGN="center">
			
			<form method="post" id="signupstyle">
				<div style="font-size: 40px; margin: 30px; color: white;">Register</div>

				<input id="text" type="text" name="user_name" placeholder="UserName"><br><br>
				<input id="text" type="password" name="password" placeholder="Password"><br><br>

				<input id="button" type="submit" value="Register" ><br><br>

				<a href="login.php">Click to Login</a><br><br>
			</form>
		</div>

	</body>
</html>
