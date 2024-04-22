<html>
<?php include 'includes/head.php';?>
    <body>
        <?php include 'includes/header.php';?>
        <center>
            <main>
            <h2>HUNTER</h2>
            <br>
            <h2>Find Hunter Enter a Name or ID</h2>
                <form action='listhunter.php' method='get'>
                    <input type ='text' name='searchtext'>
                    <input type='submit' value='Search'>
                </form>
            <br>
            <h2>ID</h2>
                <form action='displayhunter.php' method='get'>
                    <input type ='text' name='searchtext'>
                    <input type='submit' value='Search'>
                </form>
            <br>
            <h2>Find Hunter Kills by ID</h2>
                <form action='listhunterkills.php' method='get'>
                    <input type ='text' name='searchtext'>
                    <input type='submit' value='Search'>
                </form>


        </main>
        <center>						 
    </body>
</html>