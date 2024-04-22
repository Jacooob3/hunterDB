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
                        <li class="fa fa-globe"></li><a href="about.php">About</a><br>
                        <li class="fa fa-cogs"></li><a href="lookup.php">Lookup</a><br>
                        <li class="fa fa-cogs"></li><a href="update.php">Update</a><br>
                        <li class="fa fa-globe"></li><a href="login.php">Login</a><br>
                        <li class="fa fa-globe"></li><a href="signup.php">Sign Up</a><br>
                        <li class="fa fa-globe"></li><a href="warden.php">Warden</a><br>
                    </ul>
                </div>
            </section>

			<!-- Panel (Sidebar) -->
			<section class="panel color3">
					<div class="span-1">
						<ul class="contact-icons" style="margin-left: 20px; color: black;">
							<li class="fa fa-home"></li><a href="lookupanimalpop.php">Look Up Animal Population</a><br>
							<li class="fa fa-globe"></li><a href="lookuphunter.php">Look Up Hunter</a><br>
						</ul>					
					</div>
			</section>

            <center>
                <!-- Panel -->
                <section class="panel color2-alt">

                    <div class="inner columns aligned">
                        <div class="span-4-5">
            <h2>POPULATION</h2>
            <h2>Find Animal Populations by State
                <form action='liststateanimalpop.php' method='get'>
                    <input type ='text' name='state'>
                    <input type='submit' value='Search'>
                </form>
            </h2>
            <div class="order-lookup-container">
                <h2>Find Populations by Animal Name</h2>
                    <form action='listanimalpop.php' method='get'>
                        <div class="form-group">
                                <input type ='text' name='animalidname'>
                                <input type='submit' value='Search'>
                        </div>
                    </form>
                </h2>


        </div>
        </section>
            </center>
    </div>
    </div>



    </body>
</html>