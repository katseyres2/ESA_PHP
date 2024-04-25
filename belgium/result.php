<?php
session_start();
$description = $_SESSION['description'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Result</title>
	<link rel="stylesheet" href="./style/style.css">
</head>
<body>
	<?php


		$colors = ["black", "yellow", "red"];
		$idx = 0;

		for ($i=0; $i<10; $i++) {
			$description[] = "word";
		}

		foreach ($description as $word) {
			echo '<span class=';
			
			if ($idx == count($colors)) {
				$idx = 0;
			}
			
			echo '"' . $colors[$idx++] . '-word">' . $word . '</span> ';
		}
	?>
</body>
</html>