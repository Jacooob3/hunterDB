<?php
	// displayhunter.php
    // pages should be called with a url paramaeter as follows.  
	// http://...displayhunter.php?hunterid=101

	
	// load connection items
	require 'includes/database-connection.php';
	
	$hunter_id = $_GET['searchtext']; // get info from url param


	function get_hunter_info(PDO $pdo, string $id) {
		$sql = "SELECT 
					CONCAT (h.lname, ', ', h.fname) AS name,
					CASE
						WHEN h.gender = 'F' THEN 'Female'
						WHEN h.gender = 'M' THEN 'Male'
						ELSE 'Unknown'
						END AS gender,
					h.email AS email,
					date_of_birth AS dob,
					CONCAT (a.street, ' ', a.city, ', ', a.state_id, ' ', a.zip) AS addr
				FROM hunter h
				JOIN address a ON (a.address_id = h.address_id)				
				WHERE h.lname = :id1 OR h.hunter_id = :id2;";
		$hunter = pdo($pdo, $sql, ['id1' => $id,'id2' => $id ])->fetch();		
		return $hunter;
	}

	// call the method on page load
	$hunter_info = get_hunter_info($pdo, $hunter_id);
?> 

<!DOCTYPE>
<html>
<?php include 'includes/head.php';?>
    <body>
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
					<li class="fa fa-tag"></li><a href="update.php">Warden</a><br>
					<li class="fa fa-user"></li><a href="account.php">Account</a><br>
					<li class="fa fa-user-lock"></li><a href="login.php">Login</a><br>
					<li class="fa fa-user-plus"></li><a href="signup.php">Sign Up</a><br>
				</ul>					
			</div>
	</section>

				<!-- Panel (Sidebar) -->
				<section class="panel color3">
						<div class="span-1">
							<ul class="contact-icons" style="margin-left: 20px; color: black;">
								<li class="fa fa-paw"></li><a href="lookupanimalpop.php">Animal</a><br>
								<li class="fa fa-user"></li><a href="lookuphunter.php">Hunter</a><br>
							</ul>					
						</div>
				</section>


			<!-- Panel -->
                <section class="panel color2-alt">
                    <div class="inner columns aligned">
                        <div class="span-4-5">
							<main>
								<div class="hunter-details-container">
									<div class="hunter-details">
										<h3 class="major"><?= $hunter_info['name'] ?></h3>
										<h3>Information</h3>
										<p><strong>Gender:</strong> <?= $hunter_info['gender']  ?></p>
										<p><strong>Email:</strong> <?= $hunter_info['email']  ?></p>
										<p><strong>Date of Brith:</strong> <?= $hunter_info['dob']  ?></p>
										<p><strong>Address:</strong> <?= $hunter_info['addr']  ?></p>						
										<br />
									</div>
								</div>
							</main>
                        </div>
                </section>
        </div>
    </div>
	</body>
</html>
