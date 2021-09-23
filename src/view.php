<?php
//require "singleton.php";

class view
{
    function renderList($result)
    {
        $arrayJson = $result;
        require 'list.html';
    }

    function renderCreate() 
    {
        require 'create.html';   
    }
}
