<?php 


require "router.php";
$router = Router::getInstance();
$router->run();




/*

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

*/






?>


