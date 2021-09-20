<?php 



$routes = array(
'/user' => 'list.php',
'/user/create' => 'create.php',   
//'/user/update' => 'update.php',
'/user/delete' => 'delete.php',
'/contract' => 'listDoc.php',
//"/user/update&id={$_GET["id"]}" => 'update.php'
);

foreach ($routes as $key => $val) {
    if ($key == $_SERVER['QUERY_STRING']) {
        require_once $val;
    }
}






