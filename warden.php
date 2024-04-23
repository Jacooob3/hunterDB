<?php
	require 'includes/database-connection.php';
    
    function get_state_dropdown(PDO $pdo) {
        $sql = "SELECT 
                    state_id
                FROM state;";	
        return  pdo($pdo, $sql)->fetchAll();
    }

    function get_warden_dropdown(PDO $pdo) {
        $sql = "SELECT 
                    CONCAT (lname, ',', fname) AS warden_name,
                    warden_id
                FROM game_warden;";	
        return pdo($pdo, $sql)->fetchAll();
    }

    function get_weapon_dropdown(PDO $pdo) {
        $sql = "SELECT 
                weapon_type,
                weapon_id
            FROM weapon;";	
        return pdo($pdo, $sql)->fetchAll();
    }
        
    function get_animal_dropdown(PDO $pdo) {
        $sql = "SELECT 
                animal_name,
                animal_id
            FROM animal;";	
        return pdo($pdo, $sql)->fetchAll();
    }

    function get_hunter_dropdown(PDO $pdo) {
        $sql = "SELECT 
                CONCAT (lname, ', ', fname, ' -> ', hunter_id ) AS hunter_name,
                hunter_id
            FROM hunter;";	
        return pdo($pdo, $sql)->fetchAll();
    }

    function get_license_dropdown(PDO $pdo) {
        $sql = "SELECT 
                license_id,
                CONCAT (license_id, '->',  state_id) AS license_idstate
            FROM license;";	
        return pdo($pdo, $sql)->fetchAll();
    }

    $state_dropdown = get_state_dropdown($pdo);
    $warden_dropdown = get_warden_dropdown($pdo);
    $weapon_dropdown = get_weapon_dropdown($pdo);
    $animal_dropdown = get_animal_dropdown($pdo);
    $hunter_dropdown = get_hunter_dropdown($pdo);
    $license_dropdown = get_license_dropdown($pdo);

?> 

<html>
    <?php include 'includes/head.php';?>
    <body >
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
                                <li class="fa fa-globe"></li><a href="warden.php">Registry</a><br>
								<li class="fa fa-globe"></li><a href="animalpop.php">Animal</a><br>
                            </ul>					
                        </div>
                </section>

<!-- Panel -->
<section class="panel color2-alt">
    <div class="inner columns aligned">
        <div class="span-6-25">
            <h3 class="major">Warden Registry</h3>
            <form action="logkillevent.php" method="GET">
                <div class="fields">
                    <div class="field quarter">
                        <label for="warden_ID">Warden</label>
                        <select name="warden_id" id="warden_id">
                            <option selected="selected" disabled="disabled">Select a warden</option>
                            <?php foreach ($warden_dropdown as $row): ?>
                                <option value=<?=$row["warden_id"]?>><?=$row["warden_name"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="field quarter">
                        <label for="hunter_id">Hunter ID</label>                        
                        <select name="hunter_id" id="hunter_id">
                            <option selected="selected" disabled="disabled">Select a hunter</option>
                            <?php foreach ($hunter_dropdown as $row): ?>
                                <option value=<?=$row["hunter_id"]?>><?=$row["hunter_name"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="field quarter">
                        <label for="weapon_id">Weapon Type</label>
                        <select name="weapon_id" id="weapon_id">
                            <option selected="selected" disabled="disabled">Select a weapon type</option>
                            <?php foreach ($weapon_dropdown as $row): ?>
                                <option value=<?=$row["weapon_id"]?>><?=$row["weapon_type"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="field quarter">
                        <label for="animal_id">Animal</label>
                        <select name="animal_id" id="animal_id">
                            <option selected="selected" disabled="disabled">Select an Animal</option>
                            <?php foreach ($animal_dropdown as $row): ?>
                                <option value=<?=$row["animal_id"]?>><?=$row["animal_name"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="field quarter">
                        <label for="license_id">License ID</label>
                        <select name="license_id" id="license_id">
                            <option selected="selected" disabled="disabled">Select an License</option>
                            <?php foreach ($license_dropdown as $row): ?>
                                <option value=<?=$row["license_id"]?>><?=$row["license_idstate"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="field quarter">
                        <label for="state_id">State</label>
                        <select name="state_id" id="state_id">
                            <option selected="selected" disabled="disabled">Select a state</option>
                            <?php foreach ($state_dropdown as $row): ?>
                                <option><?=$row["state_id"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="field quarter">
                        <label for="date_time">Date Time</label>
                        <input type = "datetime-local"  name="date_time" id="date_time" style="color: black;"/>
                    </div>
                    <div class="field quarter">
                        <label for="weight">Weight</label>
                        <input type = "number" name="weight" id="weight" style="color: black;"/>
                    </div>
                    <div class="field quarter">
                        <label for="gender">Gender</label>
                        <select name="gender_id" id="gender_id">
                            <option selected="selected" disabled="disabled">Select a gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="U">Unknown</option>
                        </select>
                    </div>
                    <div class="field quarter">
                        <label for="zone">Zone</label>
                        <input name="zone" id="zone" style="color: black;"/>
                    </div>
                </div>
                <ul class="actions">
                    <li><input type="submit" value="Log Hunting Event" class="primary color2" /></li>
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
