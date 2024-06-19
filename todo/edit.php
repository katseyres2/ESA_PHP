<?php
include('./functions.php');
// Affiche un formulaire pour éditer une tâche.
// Met à jour la tâche spécifiée et redirige vers index.php.

if (isset($_POST['id']) && isset($_POST['inputTitle']) && isset($_POST['inputDescription'])) {
	editTask(
		$_POST['id'],
		$_POST['inputTitle'],
		$_POST['inputDescription'],
	);
}

redirectToIndex();