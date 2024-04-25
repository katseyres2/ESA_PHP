<?php
session_start();
$description = $_POST['description'];
$description = explode(" ", $description);

if (count($description) > 9) {
	$_SESSION['description'] = $description;
	header("Location: http://" . $_SERVER['HTTP_HOST'] ."/result.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form</title>
</head>
<body>
	<form method="post">
		<label for="description">Description :</label>
		<input type="text" name="description">
		<input type="submit" value="Submit">
	</form>
</body>
</html>