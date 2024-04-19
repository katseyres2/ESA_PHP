<!DOCTYPE html>
<html>
	<body>
		<form action="/index.php" method="GET">
			<label for="fname">Word:</label><br>
			<input type="text" id="word" name="word" value=""><br>
			<input type="submit" value="Submit">
		</form>
		
		<?php $word = $_GET['word']; ?>
		<?php if ($word): ?>
			<div>
				<div>The word is <?= $word ?></div>
				<div>
					<?php if (strrev($word) == $word): ?>
						You find a palindrome!
					<?php else: ?>
						This is not a palindrome...
					<?php endif ?>
				</div>
			</div>
		<?php endif ?>
	</body>
</html>