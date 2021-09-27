<?php

require "singleton.php";
require "swith_controller.php";
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



        $routes = [
            '/user' => [
                'class' => 'userController',
                'method' => 'list'
            ],
            '/user/update' => [
                'class' => 'userController',
                'method' => 'update'
            ],

            '/user/create' => [
                'class' => 'userController',
                'method' => 'create',
            ],

            '/user/delete' => [
                'class' => 'userController',
                'method' => 'delete', 
            ],
     
            
            '/doc' => [
                'class' => 'docController',
                'method' => 'listDoc'
            ],

            '/doc/update' => [
                'class' => 'docController',
                'method' => 'updateDoc'
            ],
               
            '/doc/delete' => [
                'class' => 'docController',
              'method' => 'deleteDoc'
            ],

            '/doc/create' => [
                'class' => 'docController',
                'method' => 'createDoc'
            ],

            '/swith' => [
                'class' => 'swithController',
                'method' => 'swith'
            ]

            ];

        




        foreach ($routes as $key => $val) {
           
            if ($key == $correctPuth) {
                $controller = new $val['class']();
                $method = (string)$val['method'];
                $controller-> $method();
                //require $val;
            }
        }
    }



    function getVar($name, $default = null)
    {
        if (isset($_POST[$name])) {
            return $_POST[$name];
        } else if (isset($_GET[$name])) {
            return $_GET[$name];
        }
        return $default;
    }
}

