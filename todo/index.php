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
$title = $description = null;

if (isset($_POST['inputTitle']) && isset($_POST['inputDescription'])) {
	$lastId = $todos[count($todos)-1]->getId();
	$todos[] = new Task(++$lastId, $_POST['inputTitle'], $_POST['inputDescription']);
	saveTodos($todos);
}
?>

<body>
	<div class="container d-flex h-100 justify-content-left">
		<div class="col-7">
			<div>
				<h1>My Tasks</h1>
				<?php foreach ($todos as $todo): ?>
					<form action="./index.php" method="POST">
						<label for="<?= $todo->getTitle(); ?>"><?= $todo->getTitle(); ?></label>
						<input type="submit" value="<?php if ($todo->isDone()) echo('V'); else echo(''); ?>">
						<input type="checkbox" name="<?= $todo->getTitle(); ?>" <?php if ($todo->isDone()) echo 'checked';?>>
					</form>
					<?php endforeach; ?>
			</div>
		</div>
		<div class="col">
			<form class="row g-3" action="./index.php" method="POST">
				<div class="col-md-6">
					<label for="inputTitle" class="form-label">Title</label>
					<input type="text" class="form-control" name="inputTitle" id="inputTitle">
				</div>
				<div class="col-12">
					<label for="inputDescription" class="form-label">Description</label>
					<input type="text" class="form-control" name="inputDescription" id="inputDescription" placeholder="Some description...">
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-primary">Create task</button>
				</div>
			</form>
		</div>
	</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="./js/script.js"></script>
</body>
</html>
