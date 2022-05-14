
<?php

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "project";
	$dbscore=0;

	if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $dbscore))
	{

		die("failed to connect!");
	}