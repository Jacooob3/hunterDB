<?php
    require 'includes/database-connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include 'includes/head.php';?>
    <body>
        <?php include 'includes/header.php';?>
        <div class="container">
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
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </body>
</html>