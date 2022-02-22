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
	<h1 class="text-logo">
		<span class="glyphicon glyphicon-globe"></span>COMPUTER SHOP<span class="glyphicon glyphicon-globe"></span>
	</h1>

	<div class="container admin" style="background: #fff; padding: 50px; border-radius: 10px;">
		
		<div class="row">
			
			<h1> <strong>LISTE DES ITEMS</strong><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></h1>

			<table class="table table-striped table-bordered">
				
				<thead>
					<tr>
						<th>Nom</th>
						<th>Description</th>
						<th>Prix</th>
						<th>Catégories</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>

					<?php

						require 'database.php';
						$db = Database::connect();

						$statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id ORDER BY items.id DESC');

						while ($item = $statement->fetch()) {
							echo '<tr>';
								echo '<td>' . $item['name'] . '</td>';
								echo '<td>' . $item['description'] . '</td>';
								echo '<td>' . $item['price'] . '</td>';
								echo '<td>' . $item['category'] . '</td>';

								echo '<td width="300px">';
									echo '<a href="view.php?id=' . $item['id'] . '" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span>Voir</a>';
									echo ' ';
									echo '<a href="update.php?id=' . $item['id'] . '" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>Modifier</a>';
									echo ' ';
									echo '<a href="delete.php?id=' . $item['id'] . '" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Supprimer</a>';
								echo '</td>';
							echo '</tr>';
						}

						Database::disconnect();


					?>

				</tbody>

			</table>

		</div>

	</div>

</body>
</html>