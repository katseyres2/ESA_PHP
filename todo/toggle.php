<?php
include('./functions.php');
// Marque une tâche comme réalisée/non réalisée et redirige vers index.php.

if (isset($_POST['id']) && isset($_POST['check'])) {
	updateStatus($_POST['id'], $_POST['check']);
}

redirectToIndex();