<?php

include "MysqlConfiguration.php";

interface UsersControllerInterface
{
    public function GetInformation();

    public function PostInformation();

    public function PutInformation();

    public function DeleteInformation();

}

class UsersController implements UsersControllerInterface
{

    private $connection;

    public function __construct()
    {
        $this->connection=new MysqlConfiguration()->
    }

    public function GetInformation()
    {
        return $this->connection;
    }

    public function PostInformation()
    {
        return $this->connection;
    }

    public function PutInformation()
    {
        return $this->connection;
    }

    public function DeleteInformation()
    {
        return $this->connection;
    }

    public function getUser($username)
    {

        $username = new MysqlConfiguration();

        $sql = "SELECT FROM `user` (`username`)";

        if ($username->getUser()->query($sql) === TRUE) {

            var_dump($sql);

        } else {
            echo "error: " . $sql . "<br>" . $username->getUser()->error;
        }
    }
}


?>