<?php

class model 
{

function openFile () {
    $file = 'data/users/' . $_GET['id'] . '.json';

    $dir = 'data/users/';
    
    $strJson = file_get_contents($file);
    $array = json_decode($strJson, true);

}

function saveFile() {
    $file = 'data/users/' . $_GET['id'] . '.json';


    $saveJson = json_encode($_GET);
    

    file_put_contents($file, $saveJson);
    header("Location: /user");
    exit;
}

}