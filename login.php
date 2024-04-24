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
                            <li class="fa fa-address-card"></li><a href="about.php">About</a><br>
                            <li class="fa fa-search"></li><a href="lookup.php">Lookup</a><br>
                            <li class="fa fa-file"></li><a href="help.php">Laws</a><br>
                            <li class="fa fa-user-lock"></li><a href="login.php">Login</a><br>
                            <li class="fa fa-user-plus"></li><a href="signup.php">Sign Up</a><br>
                        </ul>					
                    </div>
            </section>
            
            <!-- Panel -->
            <section class="panel color1-alt">
                <div class="inner columns aligned">
                    <div class="span-4-5">
                        <h3 class="major">Warden Log-In</h3>
                        <form action="postlogin.php" method="POST" >
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
                        
                    </div>
                </div>
            </section>
            <!-- Panel -->
            <section class="panel color1-alt">
                <div class="inner columns aligned">
                    <div class="span-4-5">
                        <h3 class="major">Hunter Log-In</h3>
                        <form action="postlogin-hunter.php" method="POST" >
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
