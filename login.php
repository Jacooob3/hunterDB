<?php   										// Opening PHP tag
	// Include the database connection script
	require 'includes/database-connection.php';
	// Check if the request method is POST (i.e, form submitted)
		
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// Check if the form was submitted for signup
		if (isset($_POST['signup'])) {
			// Get the username and password from the form
			$username = $_POST['username'];
			$password = $_POST['password'];
			// Hash the password
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			// Insert the user into the database
			$sql = "INSERT INTO user (username, password) VALUES (?, ?)";
			pdo($pdo, $sql, [$username, $hashed_password]);
		}
		// Check if the form was submitted for login
		elseif (isset($_POST['login'])) {
			// Get the username and password from the form
			$username = $_POST['username'];
			$password = $_POST['password'];
			// Get the user from the database
			$sql = "SELECT * FROM user WHERE username = ?";
			$user = pdo($pdo, $sql, [$username])->fetch();
			// Check if the user exists and the password is correct
			if ($user && password_verify($password, $user['password'])) {
				// Start the session
				session_start();
				// Set the user ID in the session
				$_SESSION['user_id'] = $user['user_id'];
				// Redirect to the index page
				header('Location: index.php');
				exit;
			}
		}
	}
// Closing PHP tag  ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1><?php echo isset($_POST['signup']) ? 'Signup' : 'Login'; ?></h1>
        <form action="login.php" method="POST">
            <?php if (isset($_POST['signup'])): ?>
                <input type="hidden" name="login" value="1">
            <?php endif; ?>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="<?php echo isset($_POST['signup']) ? 'Signup' : 'Login'; ?>">
        </form>
        <br>
        <?php if (isset($_POST['signup'])): ?>
            <h3>Switch to Login</h3>
            <form action="login.php" method="POST">
                <input type="hidden" name="login" value="1">
                <input type="submit" value="Switch to Login">
            </form>
        <?php else: ?>
            <h3>Switch to Signup</h3>
            <form action="login.php" method="POST">
                <input type="hidden" name="signup" value="1">
                <input type="submit" value="Switch to Signup">
            </form>
        <?php endif; ?>
    </div>
</body>
</html>