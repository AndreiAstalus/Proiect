<?php

class MysqlConfiguration
{
    private $connection;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db";
        $this->connection = mysqli_connect($servername, $username, $password, $dbname);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function CheckConnection()
    {
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            echo "Connected successfully";
        }
    }
}

?>
