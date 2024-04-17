<?php require 'includes/database-connection.php';?> 

<!DOCTYPE>
<html>
  
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        .top-text {
            color: #fff;
            text-align: right;
            padding: 10px;
        }
        .top-text a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
  
<body>
	<div class="top-text">
        <a href="login.php">LOG IN</a>
		&nbsp;
        <a href="signup.php">SIGN UP</a>
		&nbsp;
		<a href="warden.php">WARDEN ENTRY</a>
    </div>

	<div class="area">
		<main>
			<section>
				<div class="welcome">
					<h2>Welcome to the Hunting Database!</h2>
					<br>
					<p>Please login or sign up to access the database.</p>
					<div class="buttons">
						<a href="lookuphunter.php" class="button">Look Up Hunter   </a>
						<a href="lookupanimalpop.php" class="button">Look Up Animal Population   </a>

					</div>
				</div>
				<div class="check">
					<h2>Do it fart?</h2>
				</div>
			</section>
		</main>
</div>

<nav class="main-menu">
	<?php include 'includes/head.php';?>
	<ul>
		<li>
			<a href="index.php">
				<i class="fa fa-home fa-2x"></i>
				<span class="nav-text">
					Home
				</span>
			</a>
			
		</li>
		<li class="has-subnav">
			<a href="about.php">
				<i class="fa fa-globe fa-2x"></i>
				<span class="nav-text">
					About
				</span>
			</a>
			
		</li>
		<li>
			<a href="lookuphunter.php">
				<i class="fa fa-book fa-2x"></i>
				<span class="nav-text">
					Look Up Hunter
				</span>
			</a>
		</li>
		<li>
			<a href="lookupanimalpop.php">
				<i class="fa fa-cogs fa-2x"></i>
				<span class="nav-text">
					Look Up Animal Population
				</span>
			</a>
		</li>
	</ul>

	<ul class="logout">
		<li>
			<a href="#">
					<i class="fa fa-power-off fa-2x"></i>
				<span class="nav-text">
					Logout
				</span>
			</a>
		</li>  
	</ul>
	</nav>
</html>
