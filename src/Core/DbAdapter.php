<?php

namespace Core;

use Core\Singleton;



class DbAdapter extends Singleton

{

    protected $servername = 'db';
    protected $username = 'root';
    protected $password = 'root';
    protected $db = 'myapp';
    protected $connect;

    function connBD()
    {

        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          } 
          $this->connect = $conn;
    }

    

    function execSql($sql)
    {
 
        $result = mysqli_query($this-> connect, $sql);
        return $result;
    }
}
