<?php 
    
    session_start();

	include("connection.php");
	include("functions.php");
    
    $user_data = check_login($con); 

    $mysqli = mysqli_connect('localhost', 'root', '', 'project',0);

    // For extra protection these are the columns of which the user can sort by (in your database table).
    $columns = array('score','user_name');
        
    // Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
    $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
        
    // Get the sort order for the column, ascending or descending, default is ascending.
    $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'DESC';
        
    // Get the result...
    if ($result = $mysqli->query('SELECT * FROM users ORDER BY ' .  $column . ' ' . $sort_order)) {
        // Some variables we need for the table.
        $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
        $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'desc';
        $add_class = ' class="highlight"';
    }
        
?>

</tr>
<br>

</table>

<!DOCTYPE html>
<html>
    <head>
        <title>Scores</title>

        <style type="text/css">

            table, th, td
            {
                border: 1px solid gray;
                border-collapse: collapse;
            }

            th, td
            {
                padding: 10px;
            }
            
            th
            {
                background-color: lightblue;
            }

            td
            {
                background-color: white;
            }

            colgroup
            {
                width: 250px;
            }

            body 
            {       
                background-image: url(backg.jpg);
                background-position: center;
                background-size: cover;
            }
            
            #box
            {
				background-color: rgb(28, 24, 66);
                margin: auto;
                width: 300px;
                padding: 20px;
                color:white;
                border-radius:10px;
            }

            a{
                text-decoration:none;
                color:white;
            }

            a:hover
            {
                opacity: 0.5;
            }
	    </style>
    </head>
    <body>
        
        <div id="box" ALIGN="center">
			<table>

				<tr>
					<th>Players</th>
					<th>Scores</th>			
				</tr>
				
                <?php while ($row = $result->fetch_assoc()): ?>
				
                <tr>
					<td<?php echo $column == 'user_name' ? $add_class : ''; ?>><?php echo $row['user_name']; ?></td>
					<td<?php echo $column == 'score' ? $add_class : ''; ?>><?php echo $row['score']; ?></td>
				</tr>
				
                <?php endwhile; ?>

			</table>
            <br>
        
            <?php
        
                $result =mysqli_query($mysqli, "SELECT  MAX( score) as max , MIN(score) as min FROM users");
                while($res = mysqli_fetch_array($result))
                { 
                    $min=$res['min'].'<br>'; 
                    echo 'Lowest score :'.$min; 
                    $max = $res['max']; 
                    echo 'Highest score :'.$max.'<br>'; 
                }

            ?>   

            <a href="index.php">Click to return to the game! </a>
        </div>
    </body>
</html>
	
<?php
	$result->free();
?>
