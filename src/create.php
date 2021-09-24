<?php





function checkLines($_GET)
{
  foreach ($_GET as $name) {
    if ($name === "") {
      return false;
    }
  }
  return true;
}

$result = proverca();


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
  header("Location:/user");
  exit;
}


function chehkPath()
{
  $i = 1;
  $path = 'data/users/' . $i . '.json';
  while (is_file($path)) {
    $path = 'data/users/' . $i++ . '.json';
  }

  return $path;
}


//require "create.html";
