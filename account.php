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
									<div class="span-4-5">
										<h3 class="major">Profile</h3>
										<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
											<p>Welcome, <?= $_SESSION['name'] ?>!</p>
											<p>Username: <?= $_SESSION['username'] ?></p>
											<p>Email: <?= $_SESSION['email'] ?></p>
											<p>Date of Birth: <?= $_SESSION['date_of_birth'] ?></p>
											<p>Gender: <?= $_SESSION['gender'] ?></p>
											
									</div>
								</div>
							</section>
			
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
