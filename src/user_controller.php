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

    $resArray = $createUser->openUser($_GET['id']);
   

    View::render('update', ['array' => $resArray]);

    if (isset($_GET)) {
      echo 'я нажал на кнопку';
      $result = $this->check();

    }

   


  }

  function create()

  {
    $newUser = new userModel;


    if (count($_GET) !== 0) {
      $result = $this->check();
      if ($result === 'Масив полный') {
        $arraycreate = true;
        $newUser->createUser($_GET);
      }
    }




    View::render('create', ['result' => $result]);
  }


  function delete()
  {
    $deleteUSer = new userModel;
  
    $deleteUSer->deleteUser($_GET['id']);
    
  }




  function check()
  {
    foreach ($_GET as $name) {
      if ($name === "") {
        return 'Ошибка есть пустые строки';
      }
    }
    return 'Масив полный';
  }
}
