<?php

require_once 'model.php';

class userModel extends model
{
  protected $dir = 'data/users/';
  protected $id;

  function createList()
  {

    $dirUserCreateList = new model;

    $result = $this->list();
    return $result;
  }

  function createUser($data)
  {
    $i = 1;
    $path = $this->dir . $i . '.json';
    while (is_file($path)) {
      $path = $this->dir . $i++ . '.json';
    }
    $corectPath = $path;

    $result = $this->create($corectPath, $data);
    return $result;
  }

  function setId($id)
  {
    $this->id = $id;
  }

  function openUser()
  {


    $file = $this->dir . $this->id . '.json';
    $result = $this->open($file);
    return $result;
  }

  function saveUser($user)
  {

    $file = $this->dir . $this->id . '.json';
    $result = $this->save($file, $user);
    return $result;
  }

  function deleteUser()
  {
    $file = $this->dir . $this->id . '.json';
    $result = $this->delete($file);

    return $result;
  }
}
