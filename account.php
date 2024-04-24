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
									<div class="span-4-5">
										<h3 class="major">Profile</h3>
										<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && ($_SESSION['role'] == 'hunter')): ?>
											<p>Welcome, <?= isset($_SESSION['name']) ? $_SESSION['name'] : 'No name set'; ?></p>
											<p>Username: <?= isset($_SESSION['username']) ? $_SESSION['username'] : 'No username set'; ?></p>
											<p>Email: <?= isset($_SESSION['email']) ? $_SESSION['email'] : 'No email set'; ?></p>
											<p>Date of Birth: <?= isset($_SESSION['date_of_birth']) ? $_SESSION['date_of_birth'] : 'No date of birth set'; ?></p>
											<p>Gender: <?= isset($_SESSION['gender']) ? $_SESSION['gender'] : 'No gender set'; ?></p>
										<?php elseif (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && $_SESSION['role'] == 'warden'): ?>
											<p>Welcome, <?= isset($_SESSION['name']) ? $_SESSION['name'] : 'No name set'; ?></p>
											<p>State: <?= isset($_SESSION['state_id']) ? $_SESSION['state_id'] : 'No state set'; ?></p>
											<p>Email: <?= isset($_SESSION['email']) ? $_SESSION['email'] : 'No email set'; ?></p>
											<p>Phone Number: <?= isset($_SESSION['phone']) ? $_SESSION['phone'] : 'No date of birth set'; ?></p>
										<?php else: ?>
											<p>You are not logged in.</p>
											
										<?php endif; ?>
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
