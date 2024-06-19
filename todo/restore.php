<?php
include('./functions.php');
// Affiche un formulaire pour éditer une tâche.
// Met à jour la tâche spécifiée et redirige vers index.php.

if (isset($_POST['id'])) {
	restoreDeletedTask($_POST['id']);
}

redirectToIndex();