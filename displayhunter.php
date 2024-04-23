<?php
	// displayhunter.php
    // pages should be called with a url paramaeter as follows.  
	// http://...displayhunter.php?hunterid=101

	
	// load connection items
	require 'includes/database-connection.php';
	
	$hunter_id = $_GET['searchtext']; // get info from url param


	function get_hunter_info(PDO $pdo, string $id) {
		$sql = "SELECT 
					CONCAT (lname, ', ', fname) AS name,
					CASE
						WHEN gender = 'F' THEN 'Female'
						WHEN gender = 'M' THEN 'Male'
						ELSE 'Unknown'
						END AS gender
				FROM hunter
				WHERE hunter_id = :id;";	
		$hunter = pdo($pdo, $sql, ['id' => $id])->fetch();
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
                        <li class="fa fa-globe"></li><a href="about.php">About</a><br>
                        <li class="fa fa-cogs"></li><a href="lookup.php">Lookup</a><br>
                        <li class="fa fa-cogs"></li><a href="update.php">Update</a><br>
                        <li class="fa fa-globe"></li><a href="login.php">Login</a><br>
                        <li class="fa fa-globe"></li><a href="signup.php">Sign Up</a><br>
                        <li class="fa fa-globe"></li><a href="warden.php">Warden</a><br>
                    </ul>
                </div>
            </section>

			<!-- Panel (Sidebar) -->
				<section class="panel color3">
					<div class="span-1">
						<ul class="contact-icons" style="margin-left: 20px; color: black;">
							<li class="fa fa-home"></li><a href="lookupanimalpop.php">Look Up Animal Population</a><br>
							<li class="fa fa-globe"></li><a href="lookuphunter.php">Look Up Hunter</a><br>
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
