<?php
   	require 'includes/database-connection.php';
 
    $warden_id=$_GET['warden_id'];
    $animal_id=$_GET['animal_id'];
    $state_id=$_GET['state_id'];
    $population = $_GET['population'];
    
	$sql = "    INSERT INTO animal_population
                (animal_id, state_id, population, date_updated)
                VALUES (:id1, :id2, :id3, CURDATE())
                ON DUPLICATE KEY UPDATE population = :id4;";
	$result = pdo($pdo, $sql, ['id1' => $animal_id,'id2' => $state_id, 'id3' => $population, 'id4' => $population])->fetchAll(PDO::FETCH_ASSOC);

?>

<html>
	<?php include 'includes/head.php';?>
    <body>
        <?php include 'includes/header.php';?>
 		<main>
             <div class="hunter-details-container">
				<div class="hunter-details">
                    <h3><?= $warden_id ?></h1>
			        <hr />
                    <h3><?= $animal_id ?></h1>
			        <hr />
                    <h3><?= $state_id ?></h1>
			        <hr />
                    <h3><?= $population ?></h1>
			        <hr />
                </div>
			</div>
        </main>
	</body>
</html>
