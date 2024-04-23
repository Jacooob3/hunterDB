<?php
   	require 'includes/database-connection.php';
 
    $warden_id=$_GET['warden_id'];
    $animal_id=$_GET['animal_id'];
    $state_id=$_GET['state_id'];
    $population = $_GET['population'];
    
	$sql = "    INSERT INTO animal_population
                (animal_id, state_id, population, date_updated)
                VALUES (:id1, :id2, :id3, CURDATE())
                ON DUPLICATE KEY UPDATE population = :id4;";
	$result = pdo($pdo, $sql, ['id1' => $animal_id,'id2' => $state_id, 'id3' => $population, 'id4' => $population])->fetchAll(PDO::FETCH_ASSOC);

?>

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
                        <li class="fa fa-cogs"></li><a href="update.php">Warden</a><br>
                        <li class="fa fa-globe"></li><a href="account.php">Account</a><br>
                        <li class="fa fa-globe"></li><a href="login.php">Login</a><br>
                        <li class="fa fa-globe"></li><a href="signup.php">Sign Up</a><br>
                    </ul>
                </div>
            </section>

            <!-- Panel -->
            <section class="panel color2-alt">
                <div class="inner columns aligned">
                    <div class="span-6-25">
 		<main>
             <div class="hunter-details-container">
				<div class="hunter-details">
                    <h3><?= $warden_id ?></h3>
			        <hr />
                    <h3><?= $animal_id ?></h3>
			        <hr />
                    <h3><?= $state_id ?></h3>
			        <hr />
                    <h3><?= $population ?></h3>
			        <hr />
                </div>
			</div>
        </main>
                    </div>
                </div>
            </section>
    </body>
</html>
