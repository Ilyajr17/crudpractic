<?php

namespace Core;

use Controllers\DocController;
use Controllers\SwithController;
use Controllers\UserController;
use Core\Singleton;



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
                'class' => UserController::class,
                'method' => 'list'
            ],
            '/user/update' => [
                'class' => UserController::class,
                'method' => 'update'
            ],
            '/user/create' => [
                'class' => UserController::class,
                'method' => 'create',
            ],
            '/user/delete' => [
                'class' => UserController::class,
                'method' => 'delete', 
            ],
            '/doc' => [
                'class' => DocController :: class,
                'method' => 'listDoc'
            ],
            '/doc/update' => [
                'class' => DocController :: class,
                'method' => 'updateDoc'
            ],  
            '/doc/delete' => [
                'class' => DocController :: class,
              'method' => 'deleteDoc'
            ],
            '/doc/create' => [
                'class' => DocController :: class,
                'method' => 'createDoc'
            ],
            '/swith' => [
                'class' => SwithController :: class,
                'method' => 'swith'
            ]
            ];



        foreach ($routes as $key => $val) {
           
            if ($key == $correctPuth) {
                $controller = new $val['class']();
                $method = (string)$val['method'];
                $controller-> $method();
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

