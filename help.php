<?php 
session_start();
require 'includes/database-connection.php';
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
										<li class="fa fa-file"></li><a href="help.php">Laws</a><br>
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
							
					<!-- Panel -->
						<section class="panel color2-alt">
							<div class="inner columns aligned">
								<div class="span-3">
									<h3 class="major">Weapon Legality in RI</h3>
									<p>It may be hard to keep track of laws and rules that are constantly changing. You can check the link below to check RI weapon rules!</p>
									<a href="https://www.eregulations.com/rhodeisland/hunting/deer-hunting#:~:text=Shotguns%20of%2010%2C%2012%2C%2016,deer%20tag%20immediately%20after%20taking." target="_blank" class="button">Check RI Weapon Rules</a>
								</div>
							</div>
						</section>
										<!-- Panel (Spotlight) -->
						<section class="panel color2-alt">
								<div class="image filtered tinted span-1-75" data-position="25% 25%">
									<img src="images/huntLaw1.png" alt="" />
								</div>
							</section>						
						<section class="panel color1-alt">
							<div class="inner columns aligned">
								<div class="span-3">
									<h3 class="major">Weapon Legality in MA</h3>
									<p>Here are Massachusetts weapon laws.</p>
									<a href="https://www.mass.gov/info-details/general-hunting-regulations#:~:text=22%20caliber%20long%20rifle%2C%20and,1%2F2%20hour%20before%20sunrise." target="_blank" class="button">Check MA Weapon Rules</a>
								</div>
							</div>
						</section>
				<!-- Panel (Spotlight) -->
						<section class="panel color2-alt">
								<div class="image filtered tinted span-1-75" data-position="25% 25%">
									<img src="images/huntLaw2.png" alt="" />
								</div>
							</section>
						<section class="panel color4-alt">
							<div class="inner columns aligned">
								<div class="span-3">
									<h3 class="major">Hunting Laws in RI</h3>
									<p>Here are RI's hunting laws and regulations.</p>
									<a href="https://rules.sos.ri.gov/regulations/part/250-60-00-9" target="_blank" class="button">Check RI Hunting Regulations</a>
								</div>
							</div>
						</section>
				<!-- Panel (Spotlight) -->
						<section class="panel color2-alt">
								<div class="image filtered tinted span-1-75" data-position="25% 25%">
									<img src="images/huntLaw3.png" alt="" />
								</div>
							</section>
						<section class="panel color1-alt">
							<div class="inner columns aligned">
								<div class="span-3">
									<h3 class="major">Hunting Laws in MA</h3>
									<p>Here are MA's hunting laws and regulations</p>
									<a href="https://www.mass.gov/hunting-regulations" target="_blank" class="button">Check MA Hunting Regulations</a>
								</div>
							</div>
						</section>
						<!-- Panel (Spotlight) -->
						<section class="panel color2-alt">
								<div class="image filtered tinted span-1-75" data-position="25% 25%">
									<img src="images/huntLaw4.png" alt="" />
								</div>
							</section>

			</div>
			
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
