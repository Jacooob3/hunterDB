<?php
    require 'includes/database-connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <?php include 'includes/head.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="about-container">
        <h2>Sign Up</h2>
        <form action="signup-process.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" id="dob" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="state">State:</label>
                <select name="state" id="state" required>
                    <option value="MA">Massachusetts</option>
                    <option value="RI">Rhode Island</option>
                </select>
            </div>
            <div class="form-group">
                <label for="license_number">License Number:</label>
                <input type="text" name="license_number" id="license_number" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" name="street" id="street" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" required>
            </div>
            <div class="form-group">
                <label for="zip">Zip:</label>
                <input type="text" name="zip" id="zip" required>
            </div>
            
            

            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
