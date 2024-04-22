<?php   										// Opening PHP tag
	// Include the database connection script
	require 'includes/database-connection.php';
	
	// Fetch recent hunting activities
	try {
		$stmt = $pdo->query("SELECT hunter.name AS hunterName, animal.name AS animalName, weapon.name AS weaponName, hunt_info.additional_info FROM hunt_info JOIN hunter ON hunter.id = hunt_info.hunter_id JOIN animal ON animal.id = hunt_info.animal_id JOIN weapon ON weapon.id = hunt_info.weapon_id ORDER BY hunt_info.date DESC LIMIT 10");
		$recentHunts = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}

?> 

<!DOCTYPE>
<html>
	<head>
		<title>Hunting Database</title>
	</head>
	<?php include 'includes/head.php';?>
    <body>
        <?php include 'includes/header.php';?>
		<main>
			<section>


				<div class="welcome">
					<h2>Welcome to the Hunting Database!</h2>
                    <br>

					<p>Please login or sign up to access the database.</p>
					<div class="buttons">
						<a href="lookuphunter.php" class="button">Look Up Hunter   </a>
						<a href="lookupanimalpop.php" class="button">Look Up Animal Population   </a>
						
					</div>
				</div>
				<div class="content">
					<!-- Your existing content -->
					<aside class="recent-hunts">
						<h3>Recent Hunts</h3>
						<ul>
							<?php foreach ($recentHunts as $hunt): ?>
								<li>
									<strong>Hunter:</strong> <?= htmlspecialchars($hunt['hunterName']) ?><br>
									<strong>Animal:</strong> <?= htmlspecialchars($hunt['animalName']) ?><br>
									<strong>Weapon:</strong> <?= htmlspecialchars($hunt['weaponName']) ?><br>
									<strong>Info:</strong> <?= htmlspecialchars($hunt['additional_info']) ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</aside>
				</div>

			</section>
		</main>
	</body>
</html>



