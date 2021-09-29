<?php

namespace Controllers;

use Views\View;
use Validators\UserValidator;
use Core\Router;
use Models\DocModel;

class DocController
{
  function listDoc()
  {
    $docTable = new DocModel();

    $result = $docTable->createList();

   

    View::render('listDoc', ['arrayJson' => $result]);
  }


  function updateDoc()
  {
    $createDoc = new DocModel();
    $errors = [];

    $createDoc->setID($_GET['id']);

    $doc = $createDoc->openDoc();


    if (Router::getInstance()->getVar('updateDoc')) {

      $doc = [];
        $doc['organization'] = Router::getInstance()->getVar('organization');
        $doc['contragent'] = Router::getInstance()->getVar('contragent');
        $doc['signature'] = Router::getInstance()->getVar('signature');
        $doc['start'] = Router::getInstance()->getVar('start');
        $doc['end'] = Router::getInstance()->getVar('end');
        $doc['subjectDoc'] = Router::getInstance()->getVar('subjectDoc');
        $doc['sum'] = Router::getInstance()->getVar('sum');
        $doc['addres'] = Router::getInstance()->getVar('addres');
        $doc['inn'] = Router::getInstance()->getVar('inn');
        $doc['checkingAccount'] = Router::getInstance()->getVar('checkingAccount');
        $doc['id'] = Router::getInstance()->getVar('id');


      if (UserValidator :: check($doc)) {

        $createDoc->saveDoc($doc, $doc['id']);
        header("Location: /doc");
        exit;
      }
      $errors[] = 'Не все поля заполнены';
    }
    View::render('updateDoc', [
      'errors' => $errors,
      'doc' => $doc
    ]);
  }

  function createDoc()
  {
    $newDoc = new DocModel();
    $errors = [];

    if (Router::getInstance()->getVar('submitFormDoc')) {

      $doc = [];
        $doc['organization'] = Router::getInstance()->getVar('organization');
        $doc['contragent'] = Router::getInstance()->getVar('contragent');
        $doc['signature'] = Router::getInstance()->getVar('signature');
        $doc['start'] = Router::getInstance()->getVar('start');
        $doc['end'] = Router::getInstance()->getVar('end');
        $doc['subjectDoc'] = Router::getInstance()->getVar('subjectDoc');
        $doc['sum'] = Router::getInstance()->getVar('sum');
        $doc['addres'] = Router::getInstance()->getVar('addres');
        $doc['inn'] = Router::getInstance()->getVar('inn');
        $doc['checkingAccount'] = Router::getInstance()->getVar('checkingAccount');

      if (UserValidator :: check($doc)) {
        $newDoc->createDoc($doc);

        header("Location: /doc");
        return;
      }
      $errors[] = 'Не все поля заполнены';
    }

    View::render('createDoc', [
      'errors' => $errors,
      'doc' => $doc
    ]);
  }

  function deleteDoc()
  {
    $deleteDoc = new DocModel();
    $deleteDoc->setId($_GET['id']);
    $deleteDoc->deleteDoc();
    header("Location:/doc");
    exit;
  }


}
