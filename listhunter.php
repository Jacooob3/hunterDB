<?php
    // searchhunter.php
    // pages should be called with a url parameter as follows.  
    // http://localhost/toystore/searchhunter.php?searchtext=101
    require 'includes/database-connection.php';
    $searchtext=$_GET['searchtext'];  // searchtext is a url param from prior page it is used to find a hunter last name or number

    // function get_hunter_info
    // $pdo     connection object
    // $id      string to search for
    // returns array of hunter info 
    function get_hunter_info(PDO $pdo, string $id) {
        $sql = "    SELECT 
                        fname as firstname,
                        lname as lastname
                    FROM hunter
                    WHERE lname = :id1 OR hunter_id = :id2;";
        // substitute the variables 
        $hunter = pdo($pdo, $sql, ['id1' => $id,'id2' => $id ])->fetchAll(PDO::FETCH_ASSOC);
        return $hunter; 
    }

    // upon loading the page call the function to get the info
    $hunter_info = get_hunter_info($pdo, $searchtext);
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
										<li class="fa fa-tag"></li><a href="update.php">Warden</a><br>
										<li class="fa fa-user"></li><a href="account.php">Account</a><br>
										<li class="fa fa-user-lock"></li><a href="login.php">Login</a><br>
										<li class="fa fa-user-plus"></li><a href="signup.php">Sign Up</a><br>
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


            <center>
                <!-- Panel -->
                <section class="panel color2-alt">

                    <div class="inner columns aligned">
                        <div class="span-4-5">
        <center>
            <h2>Search Results</h2>
            <table>
<?php 
    // if there is no hunter display a message other wise poplate a table with hunter info
    if ($hunter_info == null) { 
        echo ("<h3>No match Found</h3>"); 
    } else { 
?>
            <table border='1'>
                <tr>
                    <th>Name</td>
                </tr>    
                <?php   

            // loop through the $hunter_info displaying information for each hunter
            // for now it will just display one hunter but if the select returned 
            // multiple rows it would produce a listing of all the hunters
            foreach ($hunter_info as $hunter_info) { 
                    echo '<td>';    
                    echo $hunter_info['firstname'] . ' ' . $hunter_info['lastname'];
                    echo '</td></tr>';
            }
        }

?>                    </th>
            </table>
                        </div>
                </section>
            </center>
        </div>
    </div>
    </body>
</html>





