<?php
require 'view.php';
require 'userModel.php';


class userController
{

    function list()
    {

        $userTable = new userModel();

        $result = $userTable->createList();

        View::render('list', ['arrayJson' => $result]);
    }

    function update()
    {
        $createUser = new userModel();
        
        $resArray= $createUser->updateUser();

        View::render('update',['array' => $resArray]);
        
        echo 'редактирую юзеров ';

 
    }

    function create()
    {
        $createUser = new userModel();


        View::render('create');

        $newUserArray = $_GET;


        $createUser->createUser($newUserArray);
    }

    function delete()
    {
        echo 'удаляю юзера';
    }
}
