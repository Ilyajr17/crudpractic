<?php
require 'docModel.php';

class docController
{
    function listDoc()
    {
        echo 'смотрю таблицу с доками';
    }

    function createDoc() 
    {
        $createDoc = new docModel();
        $createDoc->createDoc();
        echo 'create doc';
    }

    function updateDoc()
    {
        echo 'редактриую документы';
    }
    function deleteDoc()
    {
        echo 'рекдактирую документ';
    }

  

}

