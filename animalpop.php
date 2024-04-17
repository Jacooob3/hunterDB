<?php
	require 'includes/database-connection.php';
    
    function get_state_dropdown(PDO $pdo) {
        $sql = "SELECT 
                    state_id
                FROM state;";	
        return  pdo($pdo, $sql)->fetchAll();
    }

    
    function get_animal_dropdown(PDO $pdo) {
        $sql = "SELECT 
                animal_name,
                animal_id
            FROM animal;";	
        return pdo($pdo, $sql)->fetchAll();
    }

    
    $state_dropdown = get_state_dropdown($pdo);
    $animal_dropdown = get_animal_dropdown($pdo);
    
?> 

<html>
    <?php include 'includes/head.php';?>
    <body>
        <?php include 'includes/header.php';?>
 		<main>
			<div class="about-container">
				<h1>WARDEN POPULATION UPDATE</h1>
				<hr />
                <form action="logpopevent.php" method="GET">
                    <div>
                        <label for="animal_id">Animal</label>
                        <select name="animal_id" id="animal_id">
                            <option selected="selected" disabled="disabled">Select a animal</option>
                            <?php foreach ($animal_dropdown as $row): ?>
                                <option value=<?=$row["animal_id"]?>><?=$row["animal_name"]?></option>
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
                        <label for="New Population">population</label>
                        <input name="population" id="population"/>
                    </div>
                    <div>
                        <button>Log Population Event</button>
                    </div>
                </form>

            </div>
		</main>
	</body>
</html>