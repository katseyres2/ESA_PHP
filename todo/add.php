<?php
include_once('./functions.php');
// Ajoute une nouvelle tâche à la liste et redirige vers index.php.

if (isset($_POST['inputTitle']) && isset($_POST['inputDescription']) && strlen($_POST['inputTitle']) > 0) {
	createTask($_POST['inputTitle'], $_POST['inputDescription']);
}
	
redirectToIndex();