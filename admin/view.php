<?php 


	require 'database.php';

	if (!empty($_GET['id'])) {
		$id = checkInput(($_GET['id']));
	}


	$db = Database::connect();

	$statement = $db->prepare('SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = ?');

	$statement->execute(array($id));

	$item = $statement->fetch();

	Database::disconnect();



	function checkInput($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>



<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Holtwood+One+SC&display=swap" rel="stylesheet">
	<title>ADMIN SHOP</title>
</head>
<body>
	<h1 class="text-logo" style="margin-bottom: 100px;">
		<span class="glyphicon glyphicon-globe"></span>COMPUTER SHOP<span class="glyphicon glyphicon-globe"></span>
	</h1>

	<div class="container admin" style="background: #fff; padding: 50px; border-radius: 10px;">
		
		<div class="row">

			<div class="col-sm-6">
				<h1> <strong>Voir un item</strong></h1>
				<br>

				<form>
					
					<div class="form-group">
						<label>Nom:</label><?php echo ' ' . $item['name'] ;   ?>
					</div>

					<div class="form-group">
						<label>Description:</label><?php echo ' ' . $item['description'] ;   ?>
					</div>

					<div class="form-group">
						<label>Prix:</label><?php echo ' ' . $item['price'] ;   ?>
					</div>

					<div class="form-group">
						<label>Catégorie:</label><?php echo ' ' . $item['category'] ;   ?>
					</div>

					<div class="form-group">
						<label>Image:</label><?php echo ' ' . $item['image'] ;   ?>
					</div>

				</form>

				<br>

				<div class="form-actions">
					<a href="index.php" class="btn btn-primary"> <span class="glyphicon glyphicon-arrow-left"></span> Retour </a>
				</div>

			</div>


			<div class="col-sm-6 col-md-4 site">
				<div class="thumbnail">
					<img src="<?php echo '../images/' . $item['image'];  ?>" alt="...">
					<div class="price"><?php echo $item['price'];  ?> €</div>
					<div class="caption">
						<h4><?php echo $item['name'];  ?></h4>
						<p><?php echo $item['description'];  ?></p>
						<a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>COMMANDER</a>
					</div>
				</div>
			</div>
			
			

			

		</div>

	</div>

</body>
</html>