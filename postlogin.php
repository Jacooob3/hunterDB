<?php

//  alter table xhqxvqte_toystore.game_warden add column pass varchar(255);
// 
        session_start();
        require 'includes/database-connection.php';
        $email = $_SESSION['email'];
        $pass = $_SESSION['password'];

        $sql = "    SELECT pass=:id1 as logincheck
                    FROM game_warden
                    WHERE email=:id2;";

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
             <?php echo $result['logincheck']; ?>
        <center>						 
    </body>
</html>