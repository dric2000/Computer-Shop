<?php

	require 'database.php';

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
	<h1 class="text-logo" style="margin-bottom: 50px;">
		<span class="glyphicon glyphicon-globe"></span>COMPUTER SHOP<span class="glyphicon glyphicon-globe"></span>
	</h1>

	<div class="container admin" style="background: #fff; padding: 50px; border-radius: 10px;">
		
		<div class="row">

			<h1> <strong>Ajouter un item</strong></h1>
			

			<form class="form" method="post" action="insert.php" role="form" enctype="multipart/formdata">
				
				<div class="form-group">
					<label for="name">Nom:</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Nom" value=" <?php echo $name; ?> ">
					<span class="help-inline"> <?php  echo $nameError;   ?> </span>
				</div>

				<div class="form-group">
					<label for="description">Description:</label>
					<input type="text" class="form-control" id="description" name="description" placeholder="Description" value=" <?php echo $description; ?> ">
					<span class="help-inline"> <?php  echo $descriptionError;   ?> </span>
				</div>

				<div class="form-group">
					<label for="price">Prix: (en €)</label>
					<input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value=" <?php echo $price; ?> ">
					<span class="help-inline"> <?php  echo $priceError;   ?> </span>
				</div>

				<div class="form-group">
					<label for="category">Catégorie:</label>
					<select class="form-control" id="category" name="category">
						<?php

							$db = Database::connect();

							foreach($db->query('SELECT * FROM categories') as $row)
							{
								echo '<option value="'  . $row['id'] . '">' . $row['name'] . '</option>';
							}

							Database:disconnect();


						?>
					</select>
					<span class="help-inline"> <?php  echo $categoryError;   ?> </span>
				</div>

				<div class="form-group">
					<label for="image">Sélectionner une image:</label>
					<input type="file"  id="image" name="image">
					<span class="help-inline"> <?php  echo $imageError;   ?> </span>
				</div>

			</form>

			<br>

			<div class="form-actions">
				<button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-pencil"></span> Ajouter </button>
				<button type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-arrow-left"></span> Retour </button>
			</div>

		</div>

	</div>

</body>
</html>