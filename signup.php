<?php 
    session_start(); 
    require 'includes/database-connection.php';
?>

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
										<li class="fa fa-user-lock"></li><a href="login.php">Login</a><br>
										<li class="fa fa-user-plus"></li><a href="signup.php">Sign Up</a><br>
									</ul>					
								</div>
						</section>
						
						<!-- Panel -->
						<section class="panel color2-alt">
							<div class="inner columns aligned">
								<div class="span-6-25">
									<h3 class="major">Hunter Sign Up</h3>
									<form action="signup-process.php" method="POST">
										<div class="fields">
											<div class="field quarter">
												<label for="username">Username:</label>
												<input type="text" name="username" id="username" required>
											</div>
											<div class="field quarter">
												<label for="password">Password:</label>
												<input type="password" name="password" id="password" required>
											</div>
											<div class="field quarter">
												<label for="firstname">First Name:</label>
												<input type="text" name="firstname" id="firstname" required>
											</div>
											<div class="field quarter">
												<label for="lastname">Last Name:</label>
												<input type="text" name="lastname" id="lastname" required>
											</div>
											<div class="field quarter">
												<label for="dob">Date of Birth:</label>
												<input type="date" name="dob" id="dob" required style="color: black;">
											</div>
											<div class="field quarter">
												<label for="gender">Gender:</label>
												<select name="gender" id="gender" required>
													<option value="M">Male</option>
													<option value="F">Female</option>
													<option value="O">Other</option>
												</select>
											</div>
											<div class="field quarter">
												<label for="state">State:</label>
												<select name="state" id="state" required>
													<option value="MA">Massachusetts</option>
													<option value="RI">Rhode Island</option>
												</select>
											</div>
											<div class="field quarter">
												<label for="license_number">License Number:</label>
												<input type="text" name="license_number" id="license_number" required>
											</div>
											<div class="field quarter">
												<label for="email">Email:</label>
												<input type="email" name="email" id="email" required>
											</div>
											<div class="field quarter">
												<label for="street">Street:</label>
												<input type="text" name="street" id="street" required>
											</div>
											<div class="field quarter">
												<label for="city">City:</label>
												<input type="text" name="city" id="city" required>
											</div>
											<div class="field quarter">
												<label for="zip">Zip:</label>
												<input type="text" name="zip" id="zip" required>
											</div>
										</div>
										<ul class="actions">
											<li><input type="submit" value="Sign Up" class="primary color2" /></li>
										</ul>
									</form>
								</div>
							</div>
						</section>		

						<!-- Panel -->
						<section class="panel color1-alt">
							<div class="inner columns aligned">
								<div class="span-6-25">
									<h3 class="major">Warden Sign Up</h3>
									<form action="signup-process-warden.php" method="POST">
										<div class="fields">
                                            <div class="field quarter">
												<label for="email">Email:</label>
												<input type="email" name="email" id="email" required>
											</div>
											<div class="field quarter">
												<label for="password">Password:</label>
												<input type="password" name="password" id="password" required>
											</div>
											<div class="field quarter">
												<label for="firstname">First Name:</label>
												<input type="text" name="firstname" id="firstname" required>
											</div>
											<div class="field quarter">
												<label for="lastname">Last Name:</label>
												<input type="text" name="lastname" id="lastname" required>
											</div>
                                            <div class="field quarter">
												<label for="lastname">Phone Number:</label>
												<input type="tel" name="phonenum" id="phonenum" required>
											</div>
											<div class="field quarter">
												<label for="state">State:</label>
												<select name="state" id="state" required>
													<option value="MA">Massachusetts</option>
													<option value="RI">Rhode Island</option>
												</select>
											</div>
										</div>
										<ul class="actions">
											<li><input type="submit" value="Sign Up" class="primary color1" /></li>
										</ul>
									</form>
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
