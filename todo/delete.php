<?php
// Supprime la tâche spécifiée de la liste et redirige vers index.php
include_once('./functions.php');

if (isset($_POST['id'])) {
	deleteTask($_POST['id']);
}

redirectToIndex();