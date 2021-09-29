<?php

namespace Models;

use Core\DbAdapter;

class DbModel

{

    protected $table;



    function list()
    {
        $db = DbAdapter::getInstance();
        $query = "SELECT * FROM {$this->table}";
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
        $columns_part = '';
        $values_part = '';

        foreach ($data as $column => $value) {
            if (!empty($columns_part)) {
                $columns_part .= ", ";
            }

            $columns_part .= "{$column}";

            if (!empty($values_part)) {
                $values_part .= ", ";
            }
            $values_part .= "'{$value}'";
        }

        $columns_part = "(" . $columns_part  . ")";
        $values_part = "(" . $values_part  . ")";

        $query = "INSERT INTO $this->table $columns_part VALUES $values_part";

        $db = DbAdapter::getInstance();
        $db->connBD();
        $result = $db->execSql($query);
    }

    function open($id)

    {
        $db = DbAdapter::getInstance();

        $query = "SELECT * FROM $this->table WHERE id={$id}";

        $db->connBD();
        $result = $db->execSql($query);
        $result = mysqli_fetch_assoc($result);

        return $result;
    }

    function save($data, $id)
    {
        $str = '';

        foreach ($data as $index => $value) {
            $str .= "{$index} = '{$value}' ,";
        }


        $str[strlen($str) - 1] = ' ';
       
        $query = "UPDATE $this->table SET $str WHERE id={$id}";
        //$query = $db->buildUpdateQuery($this->table, $id, $data);
        
        $db = DbAdapter::getInstance();
        $db->connBD();
        $result = $db->execSql($query);
    }

    function delete($id)
    {
        $db = DbAdapter::getInstance();
        $db->connBD();
        $query = "DELETE FROM $this->table WHERE id=$id";
        $result = $db->execSql($query);

        return $result;
    }
}
