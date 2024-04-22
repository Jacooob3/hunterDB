<?php
    // liststateanimalpop.php
    // pages should be called with a url paramaeter as follows.  
    // http://.../liststateanmalpop.php?state=ma 
	require 'includes/database-connection.php';
    $searchstate=$_GET['state'];  // seachtect is a url param from prior page it is used to find a hunter last name or number

    // function get_animal_info
    // $pdo     connection object
    // $id      string to search for
    // returns array of animals
	function get_animal_info(PDO $pdo, string $id) {
		$sql = "    SELECT  ap.population AS pop,
		                    a.animal_name AS name
                    FROM animal_population AS ap
                    JOIN animal AS a on (a.animal_id = ap.animal_id)
                    WHERE state_id = :id;";
        // substitute the variables 
		$animals = pdo($pdo, $sql, ['id' => $id])->fetchAll(PDO::FETCH_ASSOC);
        return $animals; 
    }

    // upon loading the page call the function to get the info
	$animal_info = get_animal_info($pdo, $searchstate);
?>

<html>
    <?php include 'includes/head.php';?>
        <body>
            <?php include 'includes/header.php';?>        
            <center>
                <main>
                <h2>Search Results for <?php echo $searchstate ?> </h2>
                <table>
<?php 
    // if there are no hunter display a message other wise poplate a table with hunter info
    if ($animal_info == null) { 
        echo ("<h3>No Match Found For "); 
        echo $searchstate;
        echo ("</h3>"); 
    } else { 
?>
            <table border='1'>
                <tr>
                <th>Animal</td>
                <th>Population</td>
                </tr>    
<?php   
        // loop through the $animal_info displaying information for each hunter
        // for now it will just display one hunere but if the select returned 
        // multiple rows it would produce a listing of all the hunters
        foreach ($animal_info as $animal_info) { 
            echo '<td>';    
            echo $animal_info['name'];
            echo '</td><td>';
            echo $animal_info['pop'];
            echo '</td></tr>';
        }
    } 
?>
                    </th>
            </table>
                </main>
        </center>

    </body>
</html>





