<?php 

	session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// Someone logged in
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			// Read from database
			$query = "SELECT * FROM users WHERE user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0) // check if applicable
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password) // check password
					{
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php"); // to the game
						die;
					}
				}
			}
			echo '<script> alert("Wrong username or password!") </script>';
		}else
		{
			echo '<script> alert("Please fill all fields!") </script>';
		}
	}
	/*if($_SERVER['REQUEST_METHOD'] == "POST"){
		//part1
		$score = $_POST['score'];
		if(!empty($user_name)){
			$user_id = random_num(20);
			$query = "insert into users (score) values ('$score')";
	
			mysqli_query($con, $query);
		}
		//part2
		if(iseset($_POST['score']))
		 $score=$_POST['score'];*/
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>

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
			
			<form method="post">
				<div style="font-size: 40px;margin: 30px;color: white;" ALIGN="center">Login</div>

				<input id="text" type="text" name="user_name" placeholder="UserName"><br><br>
				<input id="text" type="password" name="password" placeholder="Password"><br><br>

				<input id="button" type="submit" value="Login" ><br><br>

				<a href="signup.php" ALIGN="center">Click to Register</a><br><br>
			</form>
			
		</div>
	</body>
</html>
