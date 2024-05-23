<?php
	$children = [];
	for ($i=0; $i < count($_POST) / 2; $i++) { 
		$children[] = [
			'firstname' => $_POST['child-'.$i.'-firstname'],
			'lastname' => $_POST['child-'.$i.'-lastname'],
		];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php foreach ($children as $child): ?>
		<div>
			<?= $child['firstname'] ?> <?= $child['lastname'] ?>
		</div>
	<?php endforeach ?>
</body>
</html>