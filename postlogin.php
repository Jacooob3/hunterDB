<?php
        //  alter table xhqxvqte_toystore.game_warden add column pass varchar(255);
        // 
        session_start();
        require 'includes/database-connection.php';
        
        // expects sessions to be set from calling page
        $email = $_SESSION['email'];
        $pass = $_SESSION['password'];

        // check for a valid combo
        $sql = "    SELECT warden_id
                    FROM game_warden
                    WHERE pass=:id1 and email=:id2;";

        $result = pdo($pdo, $sql, ['id1' => $pass,'id2' => $email])->fetch();

?>

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
                                <li class="fa fa-home"></li><a href="index.php">Home</a><br>
                                <li class="fa fa-globe"></li><a href="about.php">About</a><br>
                                <li class="fa fa-cogs"></li><a href="lookup.php">Lookup</a><br>
                                <li class="fa fa-cogs"></li><a href="update.php">Update</a><br>
                                <li class="fa fa-globe"></li><a href="account.php">Account</a><br>
                                <li class="fa fa-globe"></li><a href="login.php">Login</a><br>
                                <li class="fa fa-globe"></li><a href="signup.php">Sign Up</a><br>
                            </ul>					
                        </div>
                </section>

                <!-- Panel -->
                <section class="panel color1-alt">
                <div class="inner columns aligned">
                    <div class="span-4-5">
                    <h2>Warden POST Login</h2>
                    <?php echo $email; ?>
                    <hr>
                    <?php echo $pass; ?>
                    <hr>
                    <?php 
                        // if we have a resulte the login succeded 
                        if ($result != null) {
                            echo $result['warden_id']; 
                            echo ' logged in correctly'; 
                            // store the warden id in the session and 
                            // blank the password for security
                            $_SESSION['warden_id'] = $result['warden_id'];
                            $_SESSION['pass'] = ''; 
                            // login is successfull, redirecting to update page
                            // When account page is fixed, redirect to that
                            header( 'Location: ./update.php' );

                        } else {
                            echo 'username password not valid'; 
                        }
                    ?>
                    </div>
                </div>
            </section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>>
   