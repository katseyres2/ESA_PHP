<?php $quantity = $_GET['child_number']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="./display-information.php" method="POST">
		<?php for ($i = 0; $i < $quantity; $i++): ?>
			<label for="child-<?= $i ?>">Child <?= $i ?>: </label>
			<label for="child-<?= $i ?>-firstname">Firstname</label>
			<input type="text" name="child-<?= $i ?>-firstname">
			<label for="child-<?= $i ?>-lastname">Lastname</label>
			<input type="text" name="child-<?= $i ?>-lastname">
			</br><br>
		<?php endfor ?>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
