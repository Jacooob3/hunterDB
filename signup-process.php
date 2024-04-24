<?php
require 'includes/database-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gender']);
    $state = trim($_POST['state']); 
    $license_number = trim($_POST['license_number']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $street = trim($_POST['street']);
    $city = trim($_POST['city']);
    $zip = trim($_POST['zip']);

    // Validate input
    if (empty($username) || empty($password) || empty($email) || empty($firstname) || empty($lastname) || empty($dob) || empty($gender) || empty($license_number)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Check if username already exists in the hunter table
    $stmt = $pdo->prepare("SELECT * FROM hunter WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->rowCount() > 0) {
        echo "Username already taken.";
        exit;
    }

    // Check if license number already exists in the license table
    $stmt = $pdo->prepare("SELECT * FROM license WHERE license_id = ?");
    $stmt->execute([$license_number]);
    if ($stmt->rowCount() > 0) {
        echo "License Number already taken.";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Assign Hunter ID
    $hunter_id = $pdo->query("SELECT MAX(hunter_id) + 1 AS next_id FROM hunter")->fetch()['next_id'];

    // Address ID
    $address_id = $pdo->query("SELECT MAX(address_id) + 1 AS next_id FROM address")->fetch()['next_id'];

    // Insert the new user into the hunter table
    try {
        $pdo->beginTransaction();
        // Insert the address into the address table
        $stmt = $pdo->prepare("INSERT INTO address (address_id, street, state_id, city, zip) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$address_id, $street, $state, $city, $zip]);

        $stmt = $pdo->prepare("INSERT INTO hunter (hunter_id, fname, lname, address_id, date_of_birth, gender, email, username, pass) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$hunter_id, $firstname, $lastname, $address_id , $dob, $gender, $email, $username, $hashed_password]);

        // Insert the license number into the license table
        $stmt = $pdo->prepare("INSERT INTO license (license_id, state_id, hunter_id) VALUES (?, ?, ?)");
        $stmt->execute([$license_number, $state, $hunter_id,]);

        $pdo->commit();
        $redirectUrl = 'login.php';
        $message = "Signup successful. Redirecting to Login page...";
    } catch (PDOException $e) {
        $pdo->rollBack();
        $message = $e;   ;
    }
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