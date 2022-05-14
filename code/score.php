<?php

	session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//New score to save
			$score = $_POST['key'];
			$user_name = $user_data['user_name'];
			$user_id = $user_data['user_id'];
			$password =  $user_data['password'];
			
			// $sql = "SELECT score, user_id FROM users WHERE user_id = '$user_id'";
			$query = "UPDATE users SET score = '$score' WHERE $score > score AND user_id = '$user_id'";

			// if( $score > $sql ){

			// 	$query = "UPDATE users SET score = '$score' WHERE user_id='$user_id'";
			// 	mysqli_query($con, $query);
			// }

			// save to database
			// $query = "UPDATE users SET score = '$score' WHERE user_id='$user_id'";
			// mysqli_query($con, $query);

			mysqli_query($con, $query);
			header("Location: index.php");
			die;
		}
	?>