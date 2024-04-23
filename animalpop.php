<?php
    session_start();
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
                <!-- Panel (Sidebar) -->
                <section class="panel color3">
				<div class="span-1">
                            <ul class="contact-icons" style="margin-left: 20px; color: black;">
                                <li class="fa fa-user-tag"></li><a href="warden.php">Registry</a><br>
								<li class="fa fa-paw"></li><a href="animalpop.php">Animal</a><br>
                            </ul>					
                        </div>
                </section>

            <!-- Panel -->
            <section class="panel color0">

                <div class="inner columns aligned">
                    <div class="span-4-5">
 		<main>
			<div class="about-container">
                <h3 class="major">Animal Population Update</h3>
                <form action="logpopevent.php" method="GET">
                    <div>
                        <label for="animal_id">Animal</label>
                        <select name="animal_id" id="animal_id">
                            <option selected="selected" disabled="disabled">Select an animal</option>
                            <?php foreach ($animal_dropdown as $row): ?>
                                <option value=<?=$row["animal_id"]?>><?=$row["animal_name"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="state_id">State</label>
                        <select name="state_id" id="state_id">
                            <option selected="selected" disabled="disabled">Select a state</option>
                            <?php foreach ($state_dropdown as $row): ?>
                                <option><?=$row["state_id"]?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="New Population">Population</label>
                        <input name="population" id="population" required style="color: black;" >
                    </div>
                    <br>
                    <div>
                        <button>Log Population Event</button>
                    </div>
                </form>

            </div>
		</main>

                    </div>
                </div>
            </section>
	</body>
</html>
