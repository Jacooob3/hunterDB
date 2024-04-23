<?php 
    session_start(); 
    require 'includes/database-connection.php';
?>

<html>
	<?php include 'includes/head.php';?>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">
				<!-- Wrapper -->
					<div id="wrapper">

                <!-- Panel (Sidebar) -->
                <section class="panel color6">
                        <div class="span-1">
                            <ul class="contact-icons" style="margin-left: 20px; color: black;">
                                <li class="fa fa-home"></li><a href="index.php">Home</a><br>
                                <li class="fa fa-globe"></li><a href="about.php">About</a><br>
                                <li class="fa fa-cogs"></li><a href="lookup.php">Lookup</a><br>
                                <li class="fa fa-cogs"></li><a href="update.php">Update</a><br>
                                <li class="fa fa-globe"></li><a href="account.php">Account</a><br>
                                <li class="fa fa-globe"></li><a href="login.php">Login</a><br>
                                <li class="fa fa-globe"></li><a href="signup.php">Sign Up</a><br>
                            </ul>					
                        </div>
                </section>
						
                

                <!-- Panel -->
                <section class="panel color1-alt">
                <div class="inner columns aligned">
                    <div class="span-4-5">
                        <h3 class="major">Warden Log-In</h3>
                        <form method="post" action="">
                            <div class="fields">
                                <div class="field">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="" placeholder="jane@untitled.tld" />
                                </div>
                                <div class="field">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" value="" />
                                </div>
                            </div>
                            <ul class="actions">
                                <li><input type="submit" value="Log In" name="Login" class="primary color2" /></li>
                            </ul>
                        </form>
                        <?php
                            if (isset($_POST['Login'])) {
                                $_SESSION['email'] = $_POST['email'];
                                $_SESSION['password'] = $_POST['password'];
                                echo $_SESSION['email'];
				header( 'Location:postlogin.php' );
				exit();
                            }
                        ?>
                    </div>
                </div>
            </section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
