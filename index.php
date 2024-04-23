<?php
	session_start(); 
    require 'includes/database-connection.php';
    
    // Fetch recent hunting activities
    try {
        $stmt = $pdo->query("SELECT CONCAT(h.fname, ' ', h.lname) AS hunterName, a.animal_name AS animalName, w.weapon_type AS weaponName, hk.date_time AS time, hk.state_id AS state, hk.weight, hk.gender FROM hunter_kill hk JOIN hunter h ON h.hunter_id = hk.hunter_id JOIN animal a ON a.animal_id = hk.animal_id JOIN weapon w ON w.weapon_id = hk.weapon_id ORDER BY hk.date_time DESC LIMIT 10");
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
						<section class="panel color6">
								<div class="span-1">
									<ul class="contact-icons" style="margin-left: 20px; color: black;">
										<li class="fa fa-home"></li><a href="index.php">Home</a><br>
										<li class="fa fa-address-card"></li><a href="about.php">About</a><br>
										<li class="fa fa-search"></li><a href="lookup.php">Lookup</a><br>
										<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
											<?php if ($_SESSION['role'] == 'warden'): ?>
												<li class="fa fa-tag"></li><a href="update.php">Warden</a><br>
											<?php endif; ?>
											<li class="fa fa-user"></li><a href="account.php">Account</a><br>
											<li class="fa fa-user-lock"></li><a href="logout.php">Logout</a><br>
										<?php else: ?>
											<li class="fa fa-user-lock"></li><a href="login.php">Login</a><br>
											<li class="fa fa-user-plus"></li><a href="signup.php">Sign Up</a><br>
										<?php endif; ?>
									</ul>  						
								</div>
						</section>
							
						<!-- Panel (Landing) -->
							<section class="panel banner right">
								<div class="content color0 span-3-75">
										<img src="images/HDBlogo.png" alt="hUNTDB" />
									<h1 class="major"></h1>
									<p>Welcome to <strong>huntDB</strong>, a free, comprehensive resource to catalog hunting data. Dive into the  insights and resources we have available for you to curate your next great hunt.
									<br><br>Group 4 | Alex Chow | Jacob Hyun | Kevin Lattuada | Summer Lizarda </p>
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
							<div class="inner columns divided">
								<div class="span-5">
									<h2 class="major">Database Resource</h2>
									<p>Cross reference our catalog of database information to ensure you abide by all state laws.</p>
								</div>

								<div class="span-50">
										<ul class="contact-icons color">
											<li class="icon solid fa-tree"><a href="#">Track local hunting zones</a></li>
											<li class="icon solid fa-paw"><a href="#">Register your quarry</a></li>
											<li class="icon solid fa-bullseye"><a href="#">Check weapon legality</a></li>
											<li class="icon solid fa-flag-usa"><a href="#">Compare state laws</a></li>
										</ul>
									</div>
								</div>

								<div class="image filtered tinted" data-position="top left">
									<img src="images/huntStare.png" alt="" />
								</div>

							</section>

							<!-- Panel (Live Hunt) -->
							<section class="panel spotlight medium left">
								<div class="inner columns">
								<div class="span-1">
									<h2 class="major">Recent Hunts</h2>
								</div>
									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>Hunter</th>
													<th>Animal</th>
													<th>Weapon</th>
													<th>Time</th>
													<th>State</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$count = 0;
												foreach ($recentHunts as $hunt): 
													if($count >= 8) break; // Only display the 8 most recent hunts
												?>
												<tr>
													<td><?= htmlspecialchars($hunt['hunterName']) ?></td>
													<td><?= htmlspecialchars($hunt['animalName']) ?></td>
													<td><?= htmlspecialchars($hunt['weaponName']) ?></td>
													<td><?= htmlspecialchars($hunt['time']) ?></td>
													<td><?= htmlspecialchars($hunt['state']) ?></td>
												</tr>
												<?php 
													$count++;
												endforeach; 
												?>
											</tbody>
										</table>
									</div>
								</div>

								<div class="image filtered tinted" data-position="top left">
									<img src="images/huntGreen.png" alt="" />
								</div>

							</section>

			</div>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
