<?php
  	require 'includes/database-connection.php';

    $hunter_id = $_GET['hunter_id'];
    $weapon_id = $_GET['weapon_id'];
    $animal_id = $_GET['animal_id'];
    $warden_id = $_GET['warden_id'];
    $license_id = $_GET['license_id'];
    $state_id = $_GET['state_id'];
    $date_time = $_GET['date_time'];
    $weight = $_GET['weight'];
    $gender = $_GET['gender_id'];
    $zone = $_GET['zone'];
    
    $sql = "    INSERT INTO hunter_kill
                    (hunter_id, weapon_id, animal_id, warden_id, 
                     license_id, state_id, date_time, weight, gender, zone)
                VALUES (:hid1, :wid2, :aid3, :wid4, :lid5, :sid6, :did7, :wid8, :gid9, :zid10);";
	$result = pdo($pdo, $sql, ['hid1'=>$hunter_id,'wid2'=>$weapon_id,'aid3'=>$animal_id,'wid4'=>$warden_id,'lid5'=>$license_id,'sid6'=>$state_id,'did7'=>$date_time,'wid8'=>$weight,'gid9'=>$gender,'zid10'=>$zone])->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = "   SELECT 
                        CONCAT (h.lname, ', ', h.fname) AS name,
                        weapon_type AS weapon,
                        animal_name AS animal
                FROM hunter_kill hk
                JOIN hunter h on (hk.hunter_id = h.hunter_id)
                JOIN animal a on (a.animal_id = hk.animal_id)
                JOIN weapon w on (w.weapon_id = hk.weapon_id)
                WHERE hk.hunter_id = :hid1
                AND   hk.animal_id = :aid3
                AND   hk.date_time = :did7
                AND   hk.weapon_id = :wid2";

    $result2 = pdo($pdo, $sql2, ['hid1'=>$hunter_id,'wid2'=>$weapon_id,'aid3'=>$animal_id,'did7'=>$date_time])->fetch();

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
                    <h3> Warden ID: <?= $warden_id ?></h3>
			        <hr />
                    <h3> Hunter ID: <?= $hunter_id ?></h3>
                    <h3> Hunter Name: <?= $result2['name'] ?></h3>
                    <hr />
                    <h3> Animal: <?= $result2['animal'] ?></h3>
			        <hr />
                    <h3> State ID: <?= $state_id ?></h3>
			        <hr />
                    <h3> Kill Event Registered</h3>
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
