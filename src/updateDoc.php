<?php



$file = 'data/doc/' . $_GET['id'] . '.json';

$dir = 'data/doc/';

$strJson = file_get_contents($file);
$array = json_decode($strJson, true);

foreach ($array as $index => $name) {
    $array['id'] = $_GET['id'];
}

if (isset($_GET['update'])) {

    $file = 'data/doc/' . $_GET['id'] . '.json';



    $saveJson = json_encode($_GET);



    file_put_contents($file, $saveJson);
    header("Location: /doc");
    exit;
}

require "updateDoc.html";

exit;
