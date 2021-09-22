<?php

require "singleton.php";
require "controller.php";
require "user_controller.php";
require "doc_controller.php";

class Router extends Singleton
{

    function run()
    {
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
            if ($key == $correctPuth && substr($key, 0, 5) === '/user') {
                $userController = new userController();
                $userController->runUser();
                require_once $val;
            } elseif ($key == $correctPuth && substr($key, 0, 5) === '/doc') {
                $docController = new docController();
                $docController->runDoc();
                require_once $val;
            }
        }
    }



    function getVar($name, $default = null)
    {
    }
}

/*
&& var_dump(substr($key,5)) == '/user'


else { 
                  $docController = new docController();
                  $docController -> runDoc();
                  require_once $val;

              }

*/
