<?php
include_once("./functions/dessin.php");

$bartPath = './data/ascii-bart.txt';
$coffeePath = './data/ascii-coffee.txt';
$words = file('./data/mots.txt');

$rIndex = rand(0, count($words) - 1);
$rWord = trim($words[$rIndex]);

$solution = str_repeat('.', strlen($rWord));
$askedLetters = [];
$alphabet = range('A', 'Z');

$counter = 16;
$turn = 0;

while ($counter && str_contains($solution, '.')) {
	echo str_repeat("-", 40) . "\n";
	echo dessinPendu(intdiv($counter, 2)) . "\n";
	echo '> Remaining trials : ' . $counter . "\n"; 
	echo '> Current word     : ' . $solution . "\n";
	echo '> Letters asked    : ' . join(' ', $askedLetters) . "\n";

	$letter = strtoupper(readline("> Select a letter  : "));

	if (!in_array($letter, $alphabet)) {
		echo "Unsupported value.\n";
		continue;
	}

	if (in_array($letter, $askedLetters)) {
		echo "You already asked for this letter.\n";
		continue;
	}

	$askedLetters[] = $letter;
	sort($askedLetters);

	if (!str_contains($rWord, $letter)) {
		$counter--;
		continue;
	}

	foreach (str_split($rWord) as $idx => $rLetter) {
		if ($letter == $rLetter) {
			$solution[$idx] = $letter;
		}
	}
}

echo "\n\n";

if ($counter) {
	// $content = file_get_contents('./data/ascii-coffee.txt');
	// echo $content . "\n";
	echo "\n\t     Good job, the word was $rWord. You can take a rest...\n\n";
} else {
	// $content = file_get_contents('./data/ascii-bart.txt');
	// echo $content . "\n";
	echo "\n\t     You lose, the word was $rWord\n\n";
}