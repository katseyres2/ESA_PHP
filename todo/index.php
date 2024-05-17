<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
</head>

<?php
// Affiche un formulaire pour ajouter une nouvelle tâche.
// Liste toutes les tâches avec des options pour les marquer comme réalisées/non réalisées, les éditer et les supprimer.
include('./functions.php');
$todos = getTodos();
?>

<body>
	<div class="container d-flex h-100" style="background-color: yellow;">
		<div class="row justify-content-center align-self-center" style="background-color: green;">
			<div style="background-color: red;">

				<h1>My Tasks</h1>
				<?php foreach ($todos as $todo): ?>
					<div class="form-check">
						<input type="checkbox" name="<?= $todo->getTitle(); ?>" id="">
						<label for="<?= $todo->getTitle(); ?>"><?= $todo->getTitle(); ?></label>
					</div>
					<?php endforeach; ?>
			</div>
		</div>
	</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
