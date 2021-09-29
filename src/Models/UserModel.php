<?php

namespace Models;

class UserModel extends DbModel
{
  protected $dir = 'data/users/';
  protected $id;
  protected $table = 'users';

  function createList()
  {
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

    // $result = $this->create($corectPath, $data);
    $result = $this->create($data); // для ббазы данных
    return $result;
  }

  function setId($id)
  {
    $this->id = $id;
  }

  function openUser()
  {

    $file = $this->dir . $this->id . '.json';

    $result = $this->open($this->id); //для базы данных

    //$result = $this->open($file);
    return $result;
  }

  function saveUser($user)
  {

    $file = $this->dir . $this->id . '.json';

    //$result = $this->save($file, $user);
   
    $result = $this->save($user, $this->id); //для базы данных
    
    return $result;
  }

  function deleteUser()
  {
    $file = $this->dir . $this->id . '.json';
    //$result = $this->delete($file);
    $result = $this->delete($this->id); // для база данных

    return $result;
  }
}
