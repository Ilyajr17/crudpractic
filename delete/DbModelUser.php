<?php

namespace Mosdels;

use Corse\DbAdapter;

class DbModelUser
{
    function list()
    {
        $db = DbAdapter::getInstance();
        $query = 'SELECT * FROM `users`';
        $db->connBD();
        $result = $db->execSql($query);

        $name = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $name[] = $row;
        }

        return $name;
    }

    function create($data)

    {
        $query = "INSERT INTO users (login, firstname, lastname, birthday)
      VALUES ('{$data['login']}', '{$data['firstname']}', '{$data['lastname']}', '{$data['birthday']}' )";
        $db = DbAdapter::getInstance();
        $db->connBD();
        $result = $db->execSql($query);
    }

    function open($id)
    {
        $db = DbAdapter::getInstance();
        $query = "SELECT * FROM `users` WHERE id={$id}";
        $db->connBD();
        $result = $db->execSql($query);
        $result = mysqli_fetch_assoc($result);

        return $result;
    }

    function save($data, $id)
    {
        $query = "UPDATE users SET login = '{$data['login']}', firstname = '{$data['firstname']}' , lastname = '{$data['lastname']}', birthday = '{$data['birthday']}' WHERE id={$id}";
        $db = DbAdapter::getInstance();
        $db->connBD();
        $result = $db->execSql($query);
    }

    function delete($id)

    {
        $db = DbAdapter::getInstance();
        $db->connBD();
        $query = "DELETE FROM users WHERE id=$id";
        $result = $db->execSql($query);

        return $result;
    }
}
