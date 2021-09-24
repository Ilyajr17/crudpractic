<?php


class userModel
{

  public $dataUser = [];

  function save()
  {
    if ($arraycreate === true) {
      $corectPath = chehkPath();
      $saveJson = json_encode($this->dataUser);
      file_put_contents($corectPath, $saveJson);
      $formaSave = true;
    }
  }

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

    var_dump($arrayJson);
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
    var_dump($saveJson);
    $file = file_put_contents($corectPath, $saveJson);
  }

  function updateUser()
  {

    $file = 'data/users/' . $_GET['id'] . '.json';

    $dir = 'data/users/';

    $strJson = file_get_contents($file);
    $array = json_decode($strJson, true);
return $array;
    var_dump($array);
  }
}
