<?php
require 'view.php';
require 'userModel.php';


class userController
{

    function list()
    {

        $userTable = new userModel();

       $result = $userTable->createList();
       $userTable->createList();

        $l = new view;
        $l->renderList($result);
    }

    function update()
    {
        echo 'редактирую юзеров ';
    }
    function create()
    {
        $createUser = new userModel();
/*
        require 'create.html'; 
       */    
        $c = new view;
        $c->renderCreate();
        //
     

        if (isset($_GET['create'])) {
          
            echo 'baton  push';

            function proverca()
            {
              foreach ($_GET as $name) {
               
                if ($name === "") {
                    //die('!');
                  return 'Ошибка есть пустые строки';
                }
              }
              return 'Масив полный';
            }
            

        } else {
           
            
        }

        
        $result = proverca();
var_dump($result);


       // $newUserArray = ['имя' => 'типсон'];
        $createUser->createUser($newUserArray);

        /*
$createUser1->dataUser = ['имя' => 'ybrcjy'];
$createUser2->dataUser = ['имя' => 'Uzbek'];
$createUser2->save();
*/

        $allUsers = [
            $createUser,
            $createUser1,
            $createUser2
        ];

        //die('!');
        //$newUser = [



        echo 'оздаю юзера';
        // $this->render();
    }

    function delete()
    {
        echo 'удаляю юзера';
    }
}
