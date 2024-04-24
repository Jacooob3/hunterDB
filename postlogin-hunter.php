<?php
session_start();
require 'includes/database-connection.php';

$email = trim($_POST['hunteremail']);
$pass = trim($_POST['hunterpassword']);

$stmt = $pdo->prepare("SELECT hunter_id, pass FROM hunter WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($pass, $user['pass'])) {
    $_SESSION['logged_in'] = true;
    $_SESSION['role'] = 'hunter';
    $_SESSION['id'] = $user['hunter_id'];
    header('Location: account.php');
    exit;
} else {
    $_SESSION['error'] = 'Invalid username or password';
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include 'includes/head.php';?>
    <meta http-equiv="refresh" content="3;url=<?= $redirectUrl ?>">
</head>
<body class="is-preload">
    <div id="page-wrapper">
        <div id="wrapper">
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

            <section class="panel color1-alt">
                <div class="inner columns aligned">
                    <div class="span-4-5">
                        <h2><?= $message ?></h2>
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
