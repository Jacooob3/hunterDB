<?php   										// Opening PHP tag
	// Include the database connection script
	require 'includes/database-connection.php';
	

?> 

<!DOCTYPE>
<html>
<?php include 'includes/head.php';?>
    <body>
        <?php include 'includes/header.php';?>
		<main>
			<section>
				<div class="welcome">
					<h2>Welcome to the Hunting Database!</h2>
					<p>Please login or sign up to access the database.</p>
					<div class="buttons">
						<a href="login.php" class="button">Login   </a>
						<a href="signup.php" class="button">Sign Up   </a>
						<a href="lookuphunter.php" class="button">Look Up Hunter   </a>
						<a href="lookupanimalpop.php" class="button">Look Up Animal Population   </a>
						
					</div>
				</div>
			</section>
		</main>
	</body>
</html>



