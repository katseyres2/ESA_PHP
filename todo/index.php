<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
	<script src="https://kit.fontawesome.com/b92b01fb6c.js" crossorigin="anonymous"></script>
</head>

<?php
// Affiche un formulaire pour ajouter une nouvelle tâche.
// Liste toutes les tâches avec des options pour les marquer comme réalisées/non réalisées, les éditer et les supprimer.
include('./functions.php');
$todos = getTodos();
$id = $status = $title = $description = null;

if (isset($_POST['inputTitle']) && isset($_POST['inputDescription'])) {
	$lastId = $todos[count($todos)-1]->getId();
	$todos[] = new Task(++$lastId, $_POST['inputTitle'], $_POST['inputDescription']);
	saveTodos($todos);
}

if (isset($_POST['id']) && isset($_POST['check'])) {
	foreach ($todos as &$td) {
		if ($td->getId() == $_POST['id']) {
			$td->setDone($_POST['check']);
			break;
		}
	}

	saveTodos($todos);
} else if (isset($_POST['delete'])) {
	$newTodos = [];

	foreach ($todos as $td) {
		if ($td->getId() != $_POST['delete']) {
			$newTodos[] = $td;
		}
	}
	$todos = $newTodos;
	saveTodos($todos);
}
?>

<body>
<div class="container">
	<h1>My Tasks</h1>
	<div class="container">
		<div class="row">
			<?php foreach ($todos as $todo): ?>
				<?php
					$imgStatus = $todo->isDone() ? 'done' : 'todo';
					$createdAtDate = $todo->getCreatedAt()->format('d/m/Y');
					$createdAtTime = $todo->getCreatedAt()->format('H:i:s');
					$buttonCheck = $todo->isDone() ? 'btn btn-danger' : 'btn btn-success';
					$buttonValue = $todo->isDone() ? '58' : 'f00c';
				?> 
				<div class="col mb-4 mb-sm-10" id="card-<?=$todo->getId()?>">
					<div class="card shadow" style="width: 15rem;">
						<img src="./assets/<?= $imgStatus; ?>.webp" alt="Task image" class="card-img-top" style="height: 15rem;">
						<div class="card-body">
							<h5>
								<label class="card-title mb-0 pb-0" for="<?= $todo->getTitle(); ?>">
									<?= $todo->getTitle(); ?>
								</label>
							</h5>

							<h6 class="card-subtitle mt-0 pt-0 mb-3"><?=$createdAtDate?> - <?=$createdAtTime?></h6>
							
							<div class="card-text mb-4">
								<?= $todo->getDescription(); ?>
							</div>
							
							<form action="#card-<?=$todo->getId()?>" method="post" class="m-0 p-0" style="display:inline;width: 50px;">
								<input type="hidden" name="id" value="<?=$todo->getId()?>">
								<input type="hidden" name="check" value="<?=!$todo->isDone()?>">
								<input class="<?=$buttonCheck?>" style="font-family: FontAwesome" value="&#x<?=$buttonValue?>;" type="submit">
							</form>
							<form action="./index.php" method="post" style="display:inline;width: 50px;">
								<input type="hidden" name="id" value="<?=$todo->getId()?>">
								<input type="hidden" name="status" value="hello">
								<input class="btn btn-secondary" style="font-family: FontAwesome" value="&#xf303;" type="submit" disabled>
							</form>
							<form action="./index.php" method="post" style="display:inline;width: 50px;">
								<input type="hidden" name="delete" value="<?=$todo->getId()?>">
								<input class="btn btn-secondary" style="font-family: FontAwesome" value="&#xf1f8;" type="submit">
							</form>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
		<!-- <div class="col">
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
		</div> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
