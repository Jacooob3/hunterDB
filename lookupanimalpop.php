<?php
    session_start();
    require 'includes/database-connection.php';
?>
<html>
<?php include 'includes/head.php';?>
    <body>
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
                            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                                <?php if ($_SESSION['role'] == 'warden'): ?>
                                    <li class="fa fa-tag"></li><a href="update.php">Warden</a><br>
                                <?php endif; ?>
                                <li class="fa fa-user"></li><a href="account.php">Account</a><br>
                                <li class="fa fa-user-lock"></li><a href="logout.php">Logout</a><br>
                            <?php else: ?>
                                <li class="fa fa-user-lock"></li><a href="login.php">Login</a><br>
                                <li class="fa fa-user-plus"></li><a href="signup.php">Sign Up</a><br>
                            <?php endif; ?>
                        </ul>  						
                    </div>
            </section>

            <!-- Panel (Sidebar) -->
            <section class="panel color3">
                    <div class="span-1">
                        <ul class="contact-icons" style="margin-left: 20px; color: black;">
                            <li class="fa fa-paw"></li><a href="lookupanimalpop.php">Animal</a><br>
                            <li class="fa fa-user"></li><a href="lookuphunter.php">Hunter</a><br>
                        </ul>					
                    </div>
            </section>

            <!-- Panel -->
            <section class="panel color2-alt">
                <div class="inner columns aligned">
                    <div class="span-4-5">
                        <h3 class="major">Find Animal Populations </h3>
                        <div class="fields">
                            <div class="field half">
                                <form action='liststateanimalpop.php' method='get'>
                                    <label for="state">Find Animal Populations by State</label>
                                    <input type ='text' name='state'>
                                    <br>
                                    <input type='submit' value='Search'>
                                </form>
                            </div>
                            <div class="field half">
                                <form action='listanimalpop.php' method='get'>
                                    <label for="animalidname">Find Animal Populations by Name</label>
                                    <input type ='text' name='animalidname'>
                                    <br>
                                    <input type='submit' value='Search'>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
