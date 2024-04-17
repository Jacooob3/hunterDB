<?php   										// Opening PHP tag
	// Include the database connection script
	require 'includes/database-connection.php';
	
    function get_account(PDO $pdo, string $username, string $password) {
        $sql = "SELECT 
                    username,
                    password
                FROM account
                WHERE username = :username AND password = :password;";	
        return pdo($pdo, $sql, ['username' => $username, 'password' => $password])->fetchAll();
    }


	
// Closing PHP tag  ?> 

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
        <div class="container-login">
            <h2>Login</h2>
            <form action="login-process.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </body>
</html>