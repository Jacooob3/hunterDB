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
						



                <!-- Panel (Sidebar) -->
                <section class="panel color3">
				<div class="span-1">
                            <ul class="contact-icons" style="margin-left: 20px; color: black;">
                                <li class="fa fa-user-tag"></li><a href="warden.php">Registry</a><br>
				<li class="fa fa-paw"></li><a href="animalpop.php">Animal</a><br>
                            </ul>					
                        </div>
                </section>	

			<!-- Panel (Spotlight) -->
			<section class="panel spotlight medium left">
					<div class="content span-7">
						<h2 class="major">Warden Registry</h2>
						<p>As a warden, work with hunters to update and track kills and ensure your local animal population remains healthy.</p>
					</div>
					<div class="image filtered tinted" data-position="top left">
						<img src="images/huntSunrise.png" alt="" />
					</div>
			</section>
						

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
