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
          //  '/contract' => []
                
           // '/main' => 'swith.php',
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
            ]
            ];

        




        foreach ($routes as $key => $val) {
           // print_r("{$key} and {$val['class']} and {$val['method']}()");
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
