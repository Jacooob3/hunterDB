<?php   										// Opening PHP tag
	
	require 'includes/database-connection.php';

	$toy_id = $_GET['toynum'];

	function get_toy(PDO $pdo, string $id) {
		
		$sql = "SELECT * 
			FROM toy
			WHERE toynum= :id;";	// :id is a placeholder for value provided later 
			
		$toy = pdo($pdo, $sql, ['id' => $id])->fetch();		// Associative array where 'id' is the key and $id is the value. Used to bind the value of $id to the placeholder :id in  SQL query.

		return $toy;
	}

	function get_manufacturer(PDO $pdo, string $id) {
		
		$sql = "SELECT * 
			FROM manuf
			WHERE manid = :id;";	// :id is a placeholder for value provided later 
		
		$manufacturer = pdo($pdo, $sql, ['id' => $id])->fetch();		// Associative array where 'id' is the key and $id is the value. Used to bind the value of $id to the placeholder :id in  SQL query.

		return $manufacturer;
	}

	$toy = get_toy($pdo, $toy_id);
	$manufacturer = get_manufacturer($pdo, $toy_id);
?> 

<!DOCTYPE>
<html>

	<head>
		<meta charset="UTF-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<title>Toys R URI</title>
  		<link rel="stylesheet" href="css/style.css">
  		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
	</head>

	<body>

		<header>
			<div class="header-left">
				<div class="logo">
					<img src="imgs/logo.png" alt="Toy R URI Logo">
      			</div>

	      		<nav>
	      			<ul>
	      				<li><a href="index.php">Toy Catalog</a></li>
	      				<li><a href="about.php">About</a></li>
			        </ul>
			    </nav>
		   	</div>

		    <div class="header-right">
		    	<ul>
		    		<li><a href="order.php">Check Order</a></li>
		    	</ul>
		    </div>
		</header>

		<main>
			
			<div class="toy-details-container">
				<div class="toy-image">
					<!-- Display image of toy with its name as alt text -->
					<img src="<?= $toy['imgSrc'] ?>" alt="<?= $toy['name'] ?>">
				</div>

				<div class="toy-details">

					<!-- Display name of toy -->
			        <h1><?= $toy['name'] ?></h1>

			        <hr />

			        <h3>Toy Information</h3>

			        <!-- Display description of toy -->
			        <p><strong>Description:</strong> <?= $toy['description'] ?></p>

			        <!-- Display price of toy -->
			        <p><strong>Price:</strong> $ <?= $toy['price'] ?></p>

			        <!-- Display age range of toy -->
			        <p><strong>Age Range:</strong> <?= $toy['agerange'] ?></p>

			        <!-- Display stock of toy -->
			        <p><strong>Number In Stock:</strong> <?= $toy['numinstock'] ?></p>

			        <br />

			        <h3>Manufacturer Information</h3>

			        <!-- Display name of manufacturer -->
			        <p><strong>Name:</strong> <?= $manufacturer['name'] ?> </p>

			        <!-- Display address of manufacturer -->
					<p><strong>Address:</strong> <?= $manufacturer['Street'] . ', ' . $manufacturer['City'] . ', ' . $manufacturer['State'] . ' ' . $manufacturer['ZipCode']?></p>

			        <!-- Display phone of manufacturer -->
			        <p><strong>Phone:</strong> <?= $manufacturer['phone'] ?></p>

			        <!-- Display contact of manufacturer -->
			        <p><strong>Contact:</strong> <?= $manufacturer['contact'] ?></p>
			    </div>
			</div>
		</main>

	</body>
</html>
