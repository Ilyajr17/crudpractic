<?php

class docModel
{

    function createListDoc()
    {
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
  
  
      return $arrayJson;
    }

    function createDoc($doc) 
    {

      $i = 1;
      $path = 'data/doc/' . $i . '.json';
      while (is_file($path)) {
        $path = 'data/doc/' . $i++ . '.json';
      }
      $corectPath = $path;
      $saveJson = json_encode($doc);
  
      $file = file_put_contents($corectPath, $saveJson);
      return $i - 1;

    }

    function openDoc($id)
    {
  
      $file = 'data/doc/' . $id . '.json';
  
      $strJson = file_get_contents($file);
      $array = json_decode($strJson, true);
  
      foreach ($array as $index => $name) {
        $array['id'] = $id;
      }
  
      return $array;
    }

    function saveDoc($doc, $id)
    {
  
      $file = 'data/doc/' . $id . '.json';
      $saveJson = json_encode($doc);
      file_put_contents($file, $saveJson);
    }

    function deleteDoc($id)
    {
      $file = 'data/doc/' . $id . '.json';
      unlink($file);
      header("Location:/doc");
      exit;
    }



}
