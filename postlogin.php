<?php
session_start();
require 'includes/database-connection.php';

// Redirect if the sessions are not set (this should be handled on the login page)
if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    header('Location: login.php');
    exit;
}

$email = $_SESSION['email'];
$pass = $_SESSION['password']; // This should not be stored in session ideally

// Prepare a statement for execution
$stmt = $pdo->prepare("SELECT warden_id, pass FROM game_warden WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($pass, $user['pass'])) {
    // Successful login
    $_SESSION['warden_id'] = $user['warden_id'];
    unset($_SESSION['password']); // It's a good practice to not store password in session

    // Redirect to update page or dashboard
    header('Location: ./update.php');
    exit;
} else {
    // Invalid credentials
    $_SESSION['error'] = 'Invalid username or password';
    header('Location: login.php');
    exit;
}
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
   