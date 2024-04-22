<html>
<?php include 'includes/head.php';?>
    <body>
        <?php include 'includes/header.php';?>
        <center>
            <main>
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
        </main>
        <center>						 
    </body>
</html>