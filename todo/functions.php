<?php
include('./classes.php');

/**
 * Read the CSV file and return its todo list.
 */
function getTodos(): array
{
	$todos = [];
	$stream = fopen('./todos.csv', 'r');
	$isHeader = true;

	while (($data = fgetcsv($stream, 1000, ";")) != false) {
		if ($isHeader) {
			$isHeader = !$isHeader;
			continue;
		}

		$todos[] = new Task(
			intval($data[0]),
			$data[1],
			$data[2],
			$data[5] == '1',
			DateTime::createFromFormat('Y-m-d H:i:s', $data[3]),
			DateTime::createFromFormat('Y-m-d H:i:s', $data[4]),
			$data[6] == '1',
		);
	}

	return $todos;
}

/**
 * Save the todo list in the CSV file.
 */
function saveTodos(array $todos): void
{
	$stream = fopen('./todos.csv', 'w');
	$headers = ["Id", "Title", "Description", "CreatedAt", "EndDate", "Done", "Deleted"];
	fputcsv($stream, $headers, ";");

	foreach ($todos as $todo) {
		$row = [
			$todo->getId(),
			$todo->getTitle(),
			$todo->getDescription(),
			$todo->getCreatedAt()->format('Y-m-d H:i:s'),
			$todo->getEndDate()->format('Y-m-d H:i:s'),
			$todo->isDone() ? '1' :  '0',
			$todo->isDeleted() ? '1' : '0',
		];

		fputcsv($stream, $row, ';');
	}
}

function redirectToIndex(): void
{
	if (!str_contains($_SERVER['REQUEST_URI'], 'index.php')) {
		$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$url = $protocol . $_SERVER['HTTP_HOST'] . '/index.php';
		header("Location: " . $url);
	}
}

function createTask(string $title, string $description): void
{
	$todos = getTodos();
	$lastID = 1;

	foreach ($todos as $todo) {
		if ($todo->getId() > $lastID) {
			$lastID = $todo->getId();
		}
	}

	$todos[] = new Task($lastID + 1, $title, $description);
	saveTodos($todos);
}

function updateStatus(int $id, bool $checked): void
{
	$todos = getTodos();

	foreach ($todos as &$td) {
		if ($td->getId() == $id) {
			$td->setDone($checked);
			break;
		}
	}

	saveTodos($todos);
}

function restoreDeletedTask(int $id): void
{
	$todos = getTodos();

	foreach ($todos as &$td) {
		if ($td->getId() == $id) {
			$td->restore();
			break;
		}
	}

	saveTodos($todos);
}

function deleteTask(int $id): void
{
	$todos = getTodos();
	
	foreach ($todos as &$td) {
		if ($td->getId() == $id && !$td->isDeleted()) {
			$td->delete();
		}
	}

	saveTodos($todos);
}

function getTask(int $id): ?Task
{
	$todos = getTodos();

	foreach ($todos as $todo) {
		if ($todo->getId() == $id) {
			return $todo;
		}
	}

	return null;
}

function editTask(int $id, string $title, string $description): void
{
	$todos = getTodos();

	foreach ($todos as &$task) {
		if ($task->getId() == $id) {
			$task->setTitle($title);
			$task->setDescription($description);
			break;
		}
	}

	saveTodos($todos);
}

function clearDeletedTasks(): void
{
	$todos = getTodos();
	$newTodos = [];

	foreach ($todos as $task) {
		if (!$task->isDeleted()) {
			$newTodos[] = $task;
		}
	}

	saveTodos($newTodos);
}

function purgeAllTasks(): void
{
	saveTodos([]);
}