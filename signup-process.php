<?php
require 'includes/database-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gender']);
    $license_number = trim($_POST['license_number']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

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

    // Insert the new user into the hunter table
    try {
        $pdo->beginTransaction();
        $stmt = $pdo->prepare("INSERT INTO hunter (hunter_id, firstname, lastname, dob, gender, email, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$hunter_id, $firstname, $lastname, $dob, $gender, $email, $username, $hashed_password]);

        // Insert the license number into the license table
        $stmt = $pdo->prepare("INSERT INTO license (hunter_id, license_id) VALUES (?, ?)");
        $stmt->execute([$hunter_id, $license_number]);

        $pdo->commit();

        echo "Signup successful. <a href='login.php'>Login here</a>";
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
} else {
    // Not a POST request
    echo "Invalid request.";
}
?>
