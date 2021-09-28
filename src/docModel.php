<?php

require_once 'model.php';

class docModel extends model
{
  protected $dir = 'data/doc/';
  protected $id;

  function createList()
  {

    $dirDocCreateList = new model;

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

    $result = $this->create($corectPath, $data);
    return $result;
  }

  function setId($id)
  {
    $this->id = $id;
  }

  function openDoc()
  {

    $file = $this->dir . $this->id . '.json';

    $result = $this->open($file);
    return $result;
  }

  function saveDoc($doc)
  {

    $file = $this->dir . $this->id . '.json';
    $result = $this->save($file, $doc);
    return $result;
  }

  function deleteDoc()
  {
    $file = $this->dir . $this->id . '.json';
    $result = $this->delete($file);

    return $result;
  }
}
