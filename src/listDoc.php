<?php

$dir = 'data/doc/';
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


require "listDoc.html";
