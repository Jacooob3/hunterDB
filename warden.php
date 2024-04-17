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
    <body>
        <?php include 'includes/header.php';?>
 		<main>
			<div class="about-container">
				<h1>WARDEN REGISTER EVENT</h1>
				<hr />
                <form action="logkillevent.php" method="GET">
                    <div>
                        <label for="warden_ID">Warden</label>
                        <select name="warden_id" id="warden_id">
                            <option selected="selected" disabled="disabled">Select a warden</option>
                            <?php foreach ($warden_dropdown as $row): ?>
                                <option value=<?=$row["warden_id"]?>><?=$row["warden_name"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label for="hunter_id">Hunter ID</label>                        
                        <select name="hunter_id" id="hunter_id"/>
                            <option selected="selected" disabled="disabled">Select a hunter</option>
                            <?php foreach ($hunter_dropdown as $row): ?>
                                <option value=<?=$row["hunter_id"]?>><?=$row["hunter_name"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label for="weapon_id">Weapon Type</label>
                        <select name="weapon_id" id="weapon_id">
                            <option selected="selected" disabled="disabled">Select a weapon type</option>
                            <?php foreach ($weapon_dropdown as $row): ?>
                                <option value=<?=$row["weapon_id"]?>><?=$row["weapon_type"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                    <label for="animal_id">Animal</label>
                        <select name="animal_id" id="animal_id">
                            <option selected="selected" disabled="disabled">Select an Animal</option>
                            <?php foreach ($animal_dropdown as $row): ?>
                                <option value=<?=$row["animal_id"]?>><?=$row["animal_name"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label for="license_id">License ID</label>
                        <select name="license_id" id="license_id">
                            <option selected="selected" disabled="disabled">Select an License</option>
                            <?php foreach ($license_dropdown as $row): ?>
                                <option value=<?=$row["license_id"]?>><?=$row["license_idstate"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label for="state_id">State</label>
                        <select name="state_id" id="state_id">
                            <option selected="selected" disabled="disabled">Select a state</option>
                            <?php foreach ($state_dropdown as $row): ?>
                                <option><?=$row["state_id"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div>
                        <label for="date_time">Date Time</label>
                        <input type = "datetime-local"  name="date_time" id="date_time"/>
                    </div>
                    <div>
                        <label for="weight">Weight</label>
                        <input type = "number" name="weight" id="weight"/>
                    </div>
                    <div>
                        <label for="gender">Gender</label>
                        <select name="gender_id" id="gender_id">
                            <option selected="selected" disabled="disabled">Select a gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="U">Unknown</option>
                        </select>
                    </div>
                    <div>
                        <label for="zone">Zone</label>
                        <input name="zone" id="zone"/>
                    </div>
                    <div>
                        <button>Log Hunting Event</button>
                    </div>
                </form>

            </div>
		</main>
	</body>
</html>