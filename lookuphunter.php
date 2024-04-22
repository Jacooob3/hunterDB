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



            <!-- Panel -->
            <section class="panel color2-alt">

                <div class="inner columns aligned">
                    <div class="span-4-5">
        <center>
            <h2>HUNTER</h2>
            <h2>Find Hunter Enter a Name or ID</h2>
                <form action='listhunter.php' method='get'>
                    <input type ='text' name='searchtext'>
                    <input type='submit' value='Search'>
                </form>
                <form action='displayhunter.php' method='get'>
                    <input type ='text' name='searchtext'>
                    <input type='submit' value='Search'>
                </form>
            <h2>Find Hunter Kills by ID</h2>
                <form action='listhunterkills.php' method='get'>
                    <input type ='text' name='searchtext'>
                    <input type='submit' value='Search'>
                </form>



                    </div>
            </section>
        <center>
                    </div>
                </div>
    </body>
</html>