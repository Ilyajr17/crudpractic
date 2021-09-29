<?php
namespace Models;


class DocModel extends DbModel
{
  protected $dir = 'data/doc/';
  protected $id;
  protected $table = 'docs';

  function createList()
  {
    $result = $this->List();
    return $result;
  }

  function createDoc($data)
  {

    $i = 1;
    $path = $this->dir . $i . '.json';
    while (is_file($path)) {
      $path = $this->dir . $i++ . '.json';
    }
    $corectPath = $path;

    //$result = $this->create($corectPath, $data);
    $result = $this->create($data); //ля база данных
    return $result;

  }

  function setId($id)
  {
    $this->id = $id;
  }

  function openDoc()
  {

    $file = $this->dir . $this->id . '.json';

    //$result = $this->open($file);
    $result = $this->open($this->id); // ля база данных 
    return $result;
  }

  function saveDoc($user)
  {

    $file = $this->dir . $this->id . '.json';

    //$result = $this->save($file, $doc);
    $result = $this->save($user, $this->id); // ля базы данных
    return $result;
  }

  function deleteDoc()
  {
    $file = $this->dir . $this->id . '.json';

    //$result = $this->delete($file);
    $result = $this->delete($this->id);// для база данных

    return $result;
  }
}
