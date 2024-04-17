<?php
  	require 'includes/database-connection.php';

    $hunter_id = $_GET['hunter_id'];
    $weapon_id = $_GET['weapon_id'];
    $animal_id = $_GET['animal_id'];
    $warden_id = $_GET['warden_id'];
    $license_id = $_GET['license_id'];
    $state_id = $_GET['state_id'];
    $date_time = $_GET['date_time'];
    $weight = $_GET['weight'];
    $gender = $_GET['gender_id'];
    $zone = $_GET['zone'];
    
    $sql = "    INSERT INTO hunter_kill
                    (hunter_id, weapon_id, animal_id, warden_id, 
                     license_id, state_id, date_time, weight, gender, zone)
                VALUES (:hid1, :wid2, :aid3, :wid4, :lid5, :sid6, :did7, :wid8, :gid9, :zid10);";
	$result = pdo($pdo, $sql, ['hid1'=>$hunter_id,'wid2'=>$weapon_id,'aid3'=>$animal_id,'wid4'=>$warden_id,'lid5'=>$license_id,'sid6'=>$state_id,'did7'=>$date_time,'wid8'=>$weight,'gid9'=>$gender,'zid10'=>$zone])->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
	<?php include 'includes/head.php';?>
    <body>
        <?php include 'includes/header.php';?>
 		<main>
             <div class="hunter-details-container">
				<div class="hunter-details">
                <h3><?= $sql ?></h1>
                </div>
			</div>
        </main>
	</body>
</html>
