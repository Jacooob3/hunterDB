<?php
    session_start();
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

            <section class="panel color3">
                <div class="span-1">
                    <ul class="contact-icons" style="margin-left: 20px; color: black;">
                        <li class="fa fa-user-tag"></li><a href="warden.php">Registry</a><br>
                        <li class="fa fa-paw"></li><a href="animalpop.php">Animal</a><br>
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
                    <h3> Animal ID: <?= $animal_id ?></h3>
			        <hr />
                    <h3> State: <?= $state_id ?></h3>
			        <hr />
                    <h3>Population: <?= $population ?></h3>
			        <hr />
                </div>
			</div>
        </main>
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
