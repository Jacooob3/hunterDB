<?php
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
	<?php include 'includes/head.php';?>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">
				<!-- Wrapper -->
					<div id="wrapper">

						<!-- Panel (Sidebar) -->
						<section class="panel color2">
								<div class="span-1">
									<ul class="contact-icons color2" style="margin-left: 20px;">
										<li class="fa fa-home"></li><a href="index.php">Home</a><br>
										<li class="fa fa-globe"></li><a href="about.php">About</a><br>
										<li class="fa fa-cogs"></li><a href="lookup.php">Lookup</a><br>
										<li class="fa fa-globe"></li><a href="account.php">Account</a><br>
									</ul>						
								</div>
							</section>
							
						<!-- Panel (Landing) -->
							<section class="panel banner right">
								<div class="content color0 span-3-75">
									<h1 class="major">huntDB</h1>
									<p>Welcome to <strong>huntDB</strong>, a free, comprehensive resource to catalog hunting data. Dive into the  insights and resources we have available for you to curate your next great hunt.</p>
									<div class="buttons">
										<a href="lookuphunter.php" class="button">Look Up Hunter   </a>
										<a href="lookupanimalpop.php" class="button">Look Up Animal Population   </a>
									</div>
								</div>
								<div class="image filtered tinted span-1-75" data-position="25% 25%">
									<img src="images/huntTall.png" alt="" />
								</div>
							</section>

						<!-- Panel (Spotlight) -->
						<section class="panel spotlight medium left">
								<div class="content span-7">
									<h2 class="major">Hunt Your Way</h2>
									<p>Take advantage of your in-site tools to plan your hunt--whether that be checking your weapon, your environment, or your bounty.</p>
								</div>
								<div class="image filtered tinted" data-position="top left">
									<img src="images/huntLook.png" alt="" />
								</div>
						</section>

						<!-- Panel (Navigation) -->
						<section class="panel spotlight medium left">
								<div class="intro joined">
									<h2 class="major">Database Resource</h2>
									<p>Cross reference our catalog of database information to ensure you abide by all state laws.</p>
								</div>
								<div class="inner">
									<ul class="grid-icons three connected" style="margin-left: 40px;">
										<li><span class="icon solid fa-tree"><span class="label">State</span></span></li>
										<li><span class="icon solid fa-paw"><span class="label">Animal</span></span></li>
										<li><span class="icon solid fa-bullseye"><span class="label">Weapon</span></span></li>
									</ul>
								</div>
								<div class="image filtered tinted" data-position="top left">
									<img src="images/huntStare.png" alt="" />
								</div>
							</section>

				</div>
			</div>
			
						<!-- Panel (Spotlight) -->
						<section class="panel spotlight medium left">
								<div class="content span-7">
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





		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
