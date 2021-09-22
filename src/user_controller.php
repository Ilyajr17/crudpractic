<?php
require 'view.php';
require 'userModel.php';


class userController
{

    function list()
    {

        echo 'смотри юзеров в табице';
    }

    function update()
    {
        echo 'редактирую юзеров ';
    }
    function create()
    {
        $createUser = new userModel();
        $createUser->createUser();
        echo 'оздаю юзера';
        $this->render();
    }

    function delete()
    {
        echo 'удаляю юзера';
    }
}
