<?php
    // searchhunter.php
    // pages should be called with a url paramaeter as follows.  
    // http://.../searchhunter.php?searchtext=101  an id or a name
	require 'includes/database-connection.php';
    $searchtext=$_GET['searchtext'];  // seachtect is a url param from prior page it is used to find a hunter last name or number

    // function get_hunter_info
    // $pdo     connection object
    // $id      string to search for
    // returns array of hunter info 
	function get_hunter_info(PDO $pdo, string $id) {
		$sql = "    SELECT 
                            h.lname AS huntername,
                            hk.gender AS gender,
                            hk.weight AS weight,
                            hk.zone AS zone,
                            hk.date_time AS date,
                            a.animal_name AS animalname
                    FROM hunter_kill hk
                    JOIN animal a ON (hk.animal_id = a.animal_id)
                    JOIN hunter h ON (hk.hunter_id = h.hunter_id)
                    WHERE hk.hunter_id = :id1;";
        // substitute the variables 
		$hunter = pdo($pdo, $sql, ['id1' => $id])->fetchAll(PDO::FETCH_ASSOC);
        return $hunter; 
    }

    // upon loading the page call the function to get the info
	$hunter_info = get_hunter_info($pdo, $searchtext);
?>

<html>
<?php include 'includes/head.php';?>
    <body>
        <?php include 'includes/header.php';?>
        <center>
            <h2>Search Results</h2>
            <table>
<?php 
    // if there is no hunter kill info display a message other wise poplate a table with hunter info
    if ($hunter_info == null) { 
        echo ("<h3>Hunter has no kill info</h3>"); 
    } else { 
?>
            <table border='1'>
                <tr>
                    <th>Name</td>
                    <th>Animal</td>
                    <th>Gender</td>
                    <th>Weight</td>
                    <th>Zone</td>
                    <th>Date Time</td>



                </tr>    
<?php   
        // loop through the $hunter_info displaying information for each hunter
        // for now it will just display one hunere but if the select returned 
        // multiple rows it would produce a listing of all the hunters
        foreach ($hunter_info as $hunter_info) { 
                echo '<td>';    
                echo $hunter_info['huntername'];
                echo '</td><td>';    
                echo $hunter_info['animalname'];
                echo '</td><td>';    
                echo $hunter_info['gender'];
                echo '</td><td>';    
                echo $hunter_info['weight'];
                echo '</td><td>';    
                echo $hunter_info['zone'];
                echo '</td><td>';    
                echo $hunter_info['date'];
                echo '</td></tr>';
        }
    } 
?>
                    </th>
            </table>
        </center>
    </body>
</html>





