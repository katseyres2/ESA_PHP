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
			$data[0],
			$data[1],
			DateTime::createFromFormat('Y-m-d H:i:s', $data[2]),
			DateTime::createFromFormat('Y-m-d H:i:s', $data[3]),
		);
		break;
	}

	return $todos;
}

/**
 * Save the todo list in the CSV file.
 */
function saveTodos(array $todos): void
{
	$stream = fopen('./todos.csv', 'w');
	$headers = ["Title", "Description", "CreatedAt", "EndDate"];
	fputcsv($stream, $headers, ";");

	foreach ($todos as $todo) {
		$row = [
			$todo->getTitle(),
			$todo->getDescription(),
			$todo->getCreatedAt()->format('Y-m-d H:i:s'),
			$todo->getEndDate()->format('Y-m-d H:i:s'),
		];

		fputcsv($stream, $row, ';');
	}
}