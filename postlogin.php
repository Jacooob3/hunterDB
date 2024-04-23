<?php
        //  alter table xhqxvqte_toystore.game_warden add column pass varchar(255);
        // 
        session_start();
        require 'includes/database-connection.php';
        
        // expects sessions to be set from calling page
        $email = $_SESSION['email'];
        $pass = $_SESSION['password'];

        // check for a valid combo
        $sql = "    SELECT warden_id
                    FROM game_warden
                    WHERE pass=:id1 and email=:id2;";

        $result = pdo($pdo, $sql, ['id1' => $pass,'id2' => $email])->fetch();

?>

<html>
    <?php include 'includes/head.php';?>
    <body>
        <?php include 'includes/header.php';?>
        <center>
            <h2>Warden POST Login</h2>
            <?php echo $email; ?>
            <hr>
            <?php echo $pass; ?>
            <hr>
            <?php 
                // if we have a resulte the login succeded 
                if ($result != null) {
                    echo $result['warden_id']; 
                    echo ' logged in correctly'; 
                    // store the warden id in the session and 
                    // blank the password for security
                    $_SESSION['warden_id'] = $result['warden_id'];
                    $_SESSION['pass'] = ''; 
                    // login is successfull, redirecting to update page
                    // When account page is fixed, redirect to that
                    header( 'Location: ./update.php' );

                    
                    
                } else {
                    echo 'username password not valid'; 
                }
            ?>
        <center>						 
    </body>
</html>