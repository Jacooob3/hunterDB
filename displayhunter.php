<?php
	// displayhunter.php
    // pages should be called with a url paramaeter as follows.  
	// http://...displayhunter.php?hunterid=101

	
	// load connection items
	require 'includes/database-connection.php';
	
	$hunter_id = $_GET['searchtext']; // get info from url param


	function get_hunter_info(PDO $pdo, string $id) {
		$sql = "SELECT 
					CONCAT (lname, ', ', fname) AS name,
					CASE
						WHEN gender = 'F' THEN 'Female'
						WHEN gender = 'M' THEN 'Male'
						ELSE 'Unknown'
						END AS gender
				FROM hunter
				WHERE hunter_id = :id;";	
		$hunter = pdo($pdo, $sql, ['id' => $id])->fetch();
		return $hunter;
	}

	// call the method on page load
	$hunter_info = get_hunter_info($pdo, $hunter_id);
?> 

<!DOCTYPE>
<html>
<?php include 'includes/head.php';?>
    <body>
        <?php include 'includes/header.php';?>
		<main>
			<div class="hunter-details-container">
				<div class="hunter-details">
			        <h1><?= $hunter_info['name'] ?></h1>
			        <hr />
			        <h3>Hunter Information</h3>
			        <p><strong>Gender:</strong> <?= $hunter_info['gender']  ?></p>
			        <br />
			    </div>
			</div>
		</main>
	</body>
</html>
