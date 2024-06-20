<?php
include('./functions.php');

if (isset($_POST['id'])) {
	togglePriority($_POST['id']);
}

redirectToIndex();