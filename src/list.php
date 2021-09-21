<?php

var_dump($_SERVER['QUERY_STRING']);

function dd($var)
{
   echo nl2br(str_replace(" ", "&nbsp;", print_r($var, true)));
   die();
}

$dir = 'data/users/';
$arrayFile = scandir($dir);

$array = [];
foreach ($arrayFile as $filename) {

   $strJson = file_get_contents($dir . $filename);
   $array = json_decode($strJson, true);

   $array['id'] = str_replace('.json', '', $filename);
   if ($filename === '.' || $filename === '..') {
      unset($filename);
   } else {
      $arrayJson[] = $array;
   }
}





require "list.html";
