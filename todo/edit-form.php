<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>Document</title>
</head>

<?php
include('./functions.php');

if (!isset($_POST['id'])) redirectToIndex();
$task = getTask($_POST['id']);
if (!$task) redirectToIndex();
?>

<body>
	<div class="container text-center">
		<div class="container text-center mb-5 mt-1 border-bottom border-secondary">
			<h1>Edit Task #<?=$task->getId()?></h1>
		</div>
		<div class="container text-left">
			<form action="./edit.php" method="POST">
				<input type="hidden" name="id" value="<?=$task->getId()?>">
				<div class="mb-3">
					<label for="inputTitle" class="form-label">Title</label>
					<input type="text" class="form-control" id="inputTitle" name="inputTitle" value="<?=$task->getTitle()?>">
				</div>
				<div class="mb-3">
					<label for="inputDescription" class="form-label">Description</label>
					<input type="text" class="form-control" id="inputDescription" name="inputDescription" value="<?=$task->getDescription()?>">
				</div>
				<button type="submit" class="btn btn-primary">Edit</button>
			</form>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>