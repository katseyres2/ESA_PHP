<?php
$rows = 10;
$columns = 10;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Damier</title>
</head>
<body>
	<?php
	echo '<div class="damier">';
	for ($i=0; $i<$rows; $i++) {
		echo '<div class="row">';
		for ($j=0; $j<$columns; $j++) {
			$name = ($i + $j) % 2 == 0 ? 'white' : 'black'; 
			echo '<span class="cell '.$name.'"></span>';
		}
		echo '</div>';
	};
	echo "</div>";
	?>
</body>
</html>