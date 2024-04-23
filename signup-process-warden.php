<?php
require 'includes/database-connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $state = trim($_POST['state']); 
    $email = trim($_POST['email']);
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

        

        $stmt = $pdo->prepare("INSERT INTO game_warden (warden_id, state_id, fname, lname, email, pass) VALUES (?, ? , ?, ?, ?, ?)");
        $stmt->execute([$warden_id, $state, $firstname, $lastname,  $email, $hashed_password]);

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
