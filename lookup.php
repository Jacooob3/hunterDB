<?php require 'includes/database-connection.php';?> 

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
										<li class="fa fa-home"></li><a href="index.php" style="color: black;">Home</a><br>
										<li class="fa fa-globe"></li><a href="about.php" style="color: black;">About</a><br>
										<li class="fa fa-cogs"></li><a href="lookup.php" style="color: black;">Lookup</a><br>
										<li class="fa fa-cogs"></li><a href="update.php" style="color: black;">Update</a><br>
										<li class="fa fa-globe"></li><a href="account.php" style="color: black;">Account</a><br>
									</ul>					
								</div>
						</section>

						<!-- Panel -->
						<section class="panel color2-alt">
								<div class="intro color2">
									<h2 class="major">asdsadas</h2>
                                    <a href="listanimalpop.php" class="button">Animal Pop</a>
                                    <a href="displayhunter.php" class="button">Display Hunter</a>
									<a href="lookupanimalpop.php" class="button">Look Up Animal Pop</a>
                                    <a href="lookuphunter.php" class="button">Look Up Hunter</a>
								</div>
								<div class="inner columns aligned">
									<div class="span-4-5">
										<h3 class="major">Form</h3>
										<form method="post" action="#">
											<div class="fields">
												<div class="field third">
													<label for="demo-name">Name</label>
													<input type="text" name="demo-name" id="demo-name" value="" placeholder="Jane Doe" />
												</div>
												<div class="field third">
													<label for="demo-email">Email</label>
													<input type="email" name="demo-email" id="demo-email" value="" placeholder="jane@untitled.tld" />
												</div>
												<div class="field third">
													<label for="demo-category">Category</label>
													<div class="select-wrapper">
														<select name="demo-category" id="demo-category">
															<option value="">-</option>
															<option value="1">Manufacturing</option>
															<option value="1">Shipping</option>
															<option value="1">Administration</option>
															<option value="1">Human Resources</option>
														</select>
													</div>
												</div>
												<div class="field quarter">
													<input type="radio" id="demo-priority-low" name="demo-priority" class="color2" checked />
													<label for="demo-priority-low">Low Priority</label>
												</div>
												<div class="field quarter">
													<input type="radio" id="demo-priority-high" name="demo-priority" class="color2" />
													<label for="demo-priority-high">High Priority</label>
												</div>
												<div class="field quarter">
													<input type="checkbox" id="demo-copy" name="demo-copy" class="color2" />
													<label for="demo-copy">Email a copy</label>
												</div>
												<div class="field quarter">
													<input type="checkbox" id="demo-human" name="demo-human" class="color2" checked />
													<label for="demo-human">Not a robot</label>
												</div>
												<div class="field">
													<label for="demo-message">Message</label>
													<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="2"></textarea>
												</div>
											</div>
											<ul class="actions">
												<li><input type="submit" value="Send Message" class="primary color2" /></li>
												<li><input type="reset" value="Reset" /></li>
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
