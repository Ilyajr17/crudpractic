<?php


class userModel
{

  function createList()
  {
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


    return $arrayJson;
  }



  function createUser($newUserArray)
  {
    $i = 1;
    $path = 'data/users/' . $i . '.json';
    while (is_file($path)) {
      $path = 'data/users/' . $i++ . '.json';
    }
    $corectPath = $path;
    $saveJson = json_encode($newUserArray);

    $file = file_put_contents($corectPath, $saveJson);
    return $i - 1;
  }

  function openUser($id)
  {

    $file = 'data/users/' . $id . '.json';

    $strJson = file_get_contents($file);
    $array = json_decode($strJson, true);

    foreach ($array as $index => $name) {
      $array['id'] = $id;
    }

    return $array;
  }

  function saveUser($user, $id)
  {

    $file = 'data/users/' . $id . '.json';
    $saveJson = json_encode($user);
    file_put_contents($file, $saveJson);
  }

  function deleteUser($id)
  {
    $file = 'data/users/' . $id . '.json';
    unlink($file);
    header("Location:/user");
    exit;
  }
}
