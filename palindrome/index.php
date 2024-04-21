<?php
$word = readline('Enter a word: ');

if ($word) {
	if (strrev($word) == $word) {
		echo 'You find a palindrome!';
	} else {
		echo 'This is not a palindrome...';
	}
}