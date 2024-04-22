<?php 
    session_start(); 
    require 'includes/database-connection.php';
?>

<html>
<?php include 'includes/head.php';?>
    <body>
        <?php include 'includes/header.php';?>
        <center>
            <main>
            <h2>Warden Login</h2>
            <h2>Enter Warden Email and Password
                <form action='' method='post'>
                    <label for="email">EMAIL: </label>
                    <input type ='text' id='email' name='email'>
                    <label for="password">PASSWORD: </label>
                    <input type ='text' id='password' name='password'>
                    <input type='submit' value='Login' name='Login'>
                </form>
                <?php
                    
                    if (isset($_POST['Login'])) {
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['password'] = $_POST['password'];
                        echo $_SESSION['email'];
                        header( 'Location: ./postlogin.php' );
                    }
                ?>
            </main>
        <center>						 
    </body>
</html>

