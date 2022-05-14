<?php 

session_start();

	include("connection.php");
	include("functions.php");
  
	$user_data = check_login($con);
  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Home</title>

    <script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/p5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/addons/p5.sound.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bmoren/p5.collide2D/p5.collide2d.min.js"></script>
    <script src="https://unpkg.com/ml5@0.3.1/dist/ml5.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>

      .style
      { 
        position: relative;
        margin: 10%;
        width: 300px;
        height: 200px;
        float: left;
        color: white;

        background-color: rgb(7, 9, 37);
        border-radius: 10px;
        border-width: medium;
        padding: 40px;
        margin-left: 5%;
        margin-top: 20%;
        opacity: 0.8;
      }

      #button
      {
        color: black;
        font-weight: bold;
        background-color: white;
        padding: 10px;
        border: 0px;
        width: 120px;
        border-radius: 8px;
      }

      #button:hover
      {
        color: white;
        background-color: rgb(135, 219, 110);
        box-shadow: 0px 0px;
        transition: all 0.8s;
      }

      .score
      { 
        font-size: large;
        padding: 1px;
        border-radius:10px;
        margin-top:2px
      }

      a:hover
      {
        opacity: 0.5;
      }
    </style>

  </head>
  <body>

    <div class="style">

      <table>

      <p id="welcome" style="color:white">Good luck <?php echo $user_data['user_name']; ?> </p>

      <form method="post" action="score.php">

        <tb>
          <p class = "score" style="color:white"> Your score counter : 
            <input class="score" id="key" type="text" name="key" size="3">
          </p>
        </td>
        <input  type="submit" id="button" value="Save score"><br> 

      </form>
      
      <br>

        <a href="show.php" style="color:white">Highest Score </a>	  &mdash;
        <a href="logout.php" style="color:white">Logout</a>

      </table>
    </div>

    <script src="mario.js"></script>
    <script src="enemie.js"></script>
    <script src="draw.js?id=101"></script>
  </body>

</html>
