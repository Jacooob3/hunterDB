<?php   										// Opening PHP tag
	// Include the database connection script
	require 'includes/database-connection.php';
	
	// Fetch recent hunting activities
	try {
		$stmt = $pdo->query("SELECT CONCAT(h.fname, ' ', h.lname) AS hunterName, a.animal_name AS animalName, w.weapon_type AS weaponName, hk.date_time, hk.weight, hk.gender FROM hunter_kill hk JOIN hunter h ON h.hunter_id = hk.hunter_id JOIN animal a ON a.animal_id = hk.animal_id JOIN weapon w ON w.weapon_id = hk.weapon_id ORDER BY hk.date_time DESC LIMIT 10");
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



