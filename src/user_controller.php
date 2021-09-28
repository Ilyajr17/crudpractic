<?php
require_once 'view.php';
require 'userModel.php';
require_once 'model.php';


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
    $errors = [];
   
    $createUser -> setID($_GET['id']);

    $user = $createUser->openUser();

    if (Router::getInstance()->getVar('update')) {
      $user = [];
      $user['login'] = Router::getInstance()->getVar('login');
      $user['firstname'] = Router::getInstance()->getVar('firstname');
      $user['lastname'] = Router::getInstance()->getVar('lastname');
      $user['birthday'] = Router::getInstance()->getVar('birthday');
      $user['id'] = Router::getInstance()->getVar('id');
      
      if ($this->check($user)) {
      
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
    $newUser = new userModel;
    $errors = [];


    if (Router::getInstance()->getVar('submitForm')) {

      $user = [];
      $user['login'] = Router::getInstance()->getVar('login');
      $user['firstname'] = Router::getInstance()->getVar('firstname');
      $user['lastname'] = Router::getInstance()->getVar('lastname');
      $user['birthday'] = Router::getInstance()->getVar('birthday');

      if ($this->check($user)) {
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
    $deleteUSer = new userModel;
    $deleteUSer->setId($_GET['id']);
    $deleteUSer->deleteUser();
    header("Location:/user");
    exit;
  }

  protected function check($data)
  {
    foreach ($data as $key => $val) {
      
      if ($val == "") {
        
        return false;
        
      }
    }
    return true;
  }
}
