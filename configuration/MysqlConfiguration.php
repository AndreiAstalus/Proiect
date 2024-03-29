<?php

class MysqlConfiguration
{
    private $connection;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "andi";
        $dbname = "db";
        $this->connection = mysqli_connect($servername, $username, $password, $dbname);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function checkConnection()
    {
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            echo "Connected successfully";
        }
    }
}

