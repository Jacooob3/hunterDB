<?php
require 'includes/database-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $state = trim($_POST['state']); 
    $email = trim($_POST['email']);
    $phone = trim($_POST['phonenum']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($username) || empty($password) || empty($email) || empty($firstname) || empty($lastname)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Assign Hunter ID
    $warden_id = $pdo->query("SELECT MAX(warden_id) + 1 AS next_id FROM game_warden")->fetch()['next_id'];

    // Insert the new user into the hunter table
    try {
        $pdo->beginTransaction();

        
        $stmt = $pdo->prepare("INSERT INTO game_warden (warden_id, state_id, fname, lname, email, phonenum, pass) VALUES (?, ? , ?, ?, ?, ?, ?)");
        $stmt->execute([$warden_id, $state, $firstname, $lastname,  $email, $phone, $hashed_password]);

        $pdo->commit();
        // Successful login
        $redirectUrl = 'login.php';
        $message = "Signup successful. Redirecting to update page...";
    } catch (PDOException $e) {
        $pdo->rollBack();
        // Invalid credentials
        $redirectUrl = 'signup.php';
        $message = $e;    }
} else {
    // Not a POST request
    echo "Invalid request.";
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