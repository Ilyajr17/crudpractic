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
    //die('!');
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



    var_dump($newUserArray);

    function setData()
    {
    }
    // var_dump($_GET);


  }
  /*       
function proverca()
{

    if (isset($_GET['create'])) {
         echo 'baton push';
      }


  foreach ($_GET as $name) {
    if ($name === "") {
      return 'Ошибка есть пустые строки';
    }
  }
  return 'Масив полный';
}

$result = proverca();
         //die('!');
      } else {
         echo 'baton ne push';
         var_dump($get);
      }
  */
}
