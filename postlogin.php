<?php
session_start();
require 'includes/database-connection.php';

// Check login credentials directly from POST data, not from session
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    $_SESSION['error'] = 'Please enter email and password';
    header('Location: login.php');
    exit;
}

$email = $_POST['email'];
$pass = $_POST['password'];

// Prepare a statement for execution
$stmt = $pdo->prepare("SELECT warden_id, pass FROM game_warden WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($pass, $user['pass'])) {
    // Successful login
    $_SESSION['warden_id'] = $user['warden_id'];

    // Redirect to update page or dashboard
    echo("Login successful")
    exit;
} else {
    // Invalid credentials
    $_SESSION['error'] = 'Invalid username or password';
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'includes/head.php';?>
</head>
<body class="is-preload">
    <div id="page-wrapper">
        <div id="wrapper">
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

            <section class="panel color1-alt">
                <div class="inner columns aligned">
                    <div class="span-4-5">
                        <h2>Warden POST Login</h2>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
