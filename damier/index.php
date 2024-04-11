<?php
$rows = 8;
$columns = 8;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Damier</title>
</head>
<body>
<div class="damier">
    <?php for ($i = 0; $i < $rows; $i++): ?>
        <div class="row">
            <?php
            for ($j = 0; $j < $columns; $j++):
                $name = ($i + $j) % 2 == 0 ? 'white' : 'black';
                ?>
                <span class="cell <?= $name ?>"></span>
            <?php endfor ?>
        </div>
    <?php endfor ?>
</div>
</body>
</html>