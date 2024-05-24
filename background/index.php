<?php
const COLORS = [
	"gray",
	"blue",
	"indigo",
	"purple",
	"pink",
	"red",
	"orange",
	"yellow",
	"green",
	"teal",
	"cyan",
	"black",
	"white",
	"gray-dark",
];

const NUMBER_MAX = 20;
const NUMBER_MIN = 1;

$randomNumber = rand(NUMBER_MIN, NUMBER_MAX);

if (isset($_GET['color']) && in_array($_GET['color'], COLORS)) {
	setcookie('color', $_GET['color'], time()+3600);
}

if ($_GET['color']) 		$color = $_GET['color'];
else if ($_COOKIE['color']) $color = $_COOKIE['color'];
else						$color = COLORS[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body class="--bs-body-color" style="background-color: <?= $color ?>;">
	<span><?= $randomNumber ?></span>
	<div class="btn-group" role="group" aria-label="Basic example">
		<?php foreach(COLORS as $c): ?>
			<a href="./index.php?color=<?= $c ?>"><button type="button" class="btn btn-primary" ><?= $c ?></button></a>
		<?php endforeach ?>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>