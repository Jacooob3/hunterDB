<?php
    // searchhunter.php
    // pages should be called with a url paramaeter as follows.  
    // http://localhost/toystore/searchhunter.php?searchtext=101
	require 'includes/database-connection.php';
    $searchtext=$_GET['searchtext'];  // seachtect is a url param from prior page it is used to find a hunter last name or number

    // function get_hunter_info
    // $pdo     connection object
    // $id      string to search for
    // returns array of hunter info 
	function get_hunter_info(PDO $pdo, string $id) {
		$sql = "    SELECT 
                            lname as name
                    FROM hunter
                    WHERE lname = :id1 OR hunter_id = :id2;";
        // substitute the variables 
		$hunter = pdo($pdo, $sql, ['id1' => $id,'id2' => $id ])->fetchAll(PDO::FETCH_ASSOC);
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
            <main>
            <h2>Search Results</h2>
            <table>
<?php 
    // if there is no hunter display a message other wise poplate a table with hunter info
    if ($hunter_info == null) { 
        echo ("<h3>No match Found</h3>"); 
    } else { 
?>
            <table border='1'>
                <tr>
                    <th>Name</td>
                </tr>    
<?php   
        // loop through the $hunter_info displaying information for each hunter
        // for now it will just display one hunere but if the select returned 
        // multiple rows it would produce a listing of all the hunters
        foreach ($hunter_info as $hunter_info) { 
                echo '<td>';    
                echo $hunter_info['name'];
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





