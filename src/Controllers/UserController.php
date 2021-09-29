<?php

namespace Controllers;

use Models\UserModel;
use Views\View;
use Core\Router;
use Validators\UserValidator;

class UserController
{

  function list()
  {
    $userTable = new UserModel();
    $result = $userTable->createList();
    
    View::render('list', ['arrayJson' => $result]);
    
  }

  function update()

  {
    
    $createUser = new UserModel();
    $errors = [];
   


    $createUser->setID($_GET['id']);

    

    

    $user = $createUser->openUser();

    if (Router::getInstance()->getVar('update')) {

      $user = [];
      $user['login'] = Router::getInstance()->getVar('login');
      $user['firstname'] = Router::getInstance()->getVar('firstname');
      $user['lastname'] = Router::getInstance()->getVar('lastname');
      $user['birthday'] = Router::getInstance()->getVar('birthday');
      $user['id'] = Router::getInstance()->getVar('id');
  

      if (UserValidator :: check($user)) {

        $createUser->saveUser($user, $user['id']);
        header("Location: /user");
        exit;
      }
      $errors[] = 'Не все поля заполнены';
    }

    View::render('update', [
      'errors' => $errors,
      'user' => $user
    ]);
  }

  function create()

  {
    $newUser = new UserModel;
    $errors = [];


    if (Router::getInstance()->getVar('submitForm')) {

    

     $user = [];
     $user['login'] = Router::getInstance()->getVar('login');
     $user['firstname'] = Router::getInstance()->getVar('firstname');
     $user['lastname'] = Router::getInstance()->getVar('lastname');
     $user['birthday'] = Router::getInstance()->getVar('birthday');

      

      if (UserValidator :: check($user)) {
        $newUser->createUser($user);

        header("Location: /user");
        return;
      }
      $errors[] = 'Не все поля заполнены';
    }

    View::render('create', [
      'errors' => $errors,
      'user' => $user
    ]);
  }

  function delete()
  {
    $deleteUSer = new UserModel;
    $deleteUSer->setId($_GET['id']);
    $deleteUSer->deleteUser();
    header("Location:/user");
    exit;
  }


}
