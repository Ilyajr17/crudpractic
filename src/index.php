<?php 




$puth = $_SERVER['REQUEST_URI'];

$correctPuth = stristr($puth, '?', true);

if ($correctPuth == false) {
    $correctPuth = $_SERVER['REQUEST_URI'];
}





$routes = array(
'/user' => 'list.php',
'/user/update' => 'update.php',   
'/user/create' => 'create.php',
'/user/delete' => 'delete.php',
'/contract' => 'listDoc.php',
'/main' => 'swith.php',
'/doc' => 'listDoc.php',
'/doc/update' => 'updateDoc.php',
'/doc/delete' => 'deleteDoc.php',
'/doc/create' => 'createDoc.php'
);







foreach ($routes as $key => $val) {
    if ($key == $correctPuth) {
        require_once $val;
    }
}





/*

echo "<br>";
var_dump($_SERVER['QUERY_STRING']);
echo "<br>";
var_dump($_GET['id']);
echo "<br>";


print_r($_SERVER['REQUEST_METHOD']);
echo '<br>';



echo '$_SERVER[REQUEST_URI]=';
var_dump($_SERVER['REQUEST_URI']);
echo '<br>';

// var_dump($_SERVER);
echo '$_SERVER[QUERY_STRING]=';
var_dump($_SERVER['QUERY_STRING']);
echo '<br>';

echo '$_GET=';
var_dump($_GET);
echo '<br>';

if (false) {

} else {
    http_response_code(404);
    echo '404';
    die();
}


$path = parseurl();
echo '<br>';

print_r($path);

echo '<br>';

$id = strpos($path,'?');

if ($id > 0) {
    $path = substr($path, 0, $posId);
}



echo '<br>';

print_r($id);

echo '<br>';

*/
?>


