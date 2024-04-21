<html>
<?php include 'includes/head.php';?>
    <body>
        <?php include 'includes/header.php';?>
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



        <center>						 
    </body>
</html>