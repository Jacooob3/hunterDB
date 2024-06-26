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
						<section class="panel color1-alt">
								<div class="inner columns aligned">
									<div class="span-3">
										<h3 class="major">Introducing HuntDB</h3>
										<p>The modern day hunting companion designed with the avid outdoorsman in mind, huntDB is a comprehensive toolkit for maximizing your hunting experience while ensuring compliance with local regulations. Whether you're a seasoned hunter or just starting out, huntDB equips you with everything you need to make your next hunt great.</p>
										<h3 class="major">Protect Animals</h3>
										<p>Use huntDB to track local hunting zones, ensuring you always know where you can legally pursue your quarry. Work with wardens on the website to ensure your kill is properly tracked, bagged, and logged to keep populations in the region healthy, so anyone and everyone can hunt to their hearts' content.</p>
									</div>
									<div class="span-3">
										<h3 class="major">More Than a Tool</h3>
										<p>An app designed with only the best in mind, huntDB gives you the confidence to focus on what you love most: the thrill of the chase. With features like comparing state laws, you can easily stay up-to-date with the latest regulations no matter where your hunting adventures take you. Use it anywhere for everywhere.</p>
										<p>HuntDB is a comprehensive database that covers every aspect of the hunting experience, including what comes after. From registering your quarry to checking weapon legality, huntDB provides all the information you need to ensure a safe and legal hunt for yourself and others. No more guessing games or last-minute surprises.</p>
									</div>
								</section>
	
						<!-- Panel (Spotlight) -->
						<section class="panel color2-alt">
								<div class="image filtered tinted span-1-75" data-position="25% 25%">
									<img src="images/huntLake.png" alt="" />
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
