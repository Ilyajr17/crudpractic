<?php




function proverca()
{
  foreach ($_GET as $name) {
    if ($name === "") {
      return 'Ошибка есть пустые строки';
    }
  }
  return 'Масив полный';
}

if (count($_GET) !== 0) {
  $result = proverca();
  if ($result === 'Масив полный') {
    $arraycreate = true;
  }
}


if ($arraycreate === true) {
  $corectPath = chehkPath();
  $saveJson = json_encode($_GET);
  file_put_contents($corectPath, $saveJson);
  $formaSave = true;
}

if ($formaSave === true) {
  header("Location:/doc");
  exit;
}


function chehkPath()
{
  $i = 1;
  $path = 'data/doc/' . $i . '.json';
  while (is_file($path)) {
    $path = 'data/doc/' . $i++ . '.json';
  }

  return $path;
}


require "createDoc.html";
