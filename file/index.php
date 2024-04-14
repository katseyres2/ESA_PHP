<?php

$basePath = './data/';
$fileNames = scandir($basePath);

foreach ($fileNames as $fileName) {
    if (!preg_match('/\.txt$/', $fileName)) {
        continue;
    }

    $file = fopen($basePath.$fileName, 'r');
    
    while (!feof($file)) {
        echo fgets($file) . "<br>";
    }
    
    fclose($file);
}
