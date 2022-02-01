<?php
//require_once '1loop.php';
$items = [];

if (($handle = fopen("test.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//        require_once '1loop.php';
        $items[] = $data;
    }
    fclose($handle);
}
//var_dump($items);
require_once '1loop.php';
