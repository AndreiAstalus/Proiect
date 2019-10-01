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
        $this->connection = new MysqlConfiguration()->getConnection();
    }

    public function getConnection(){
        return $this->connection;
    }
    
    public function GetInformation()
    {

    }

    public function PostInformation()
    {

    }

    public function PutInformation()
    {

    }

    public function DeleteInformation()
    {

    }

   /* public function getUser($username)
    {

        $sql = "SELECT FROM `user` (`username`)";

        if ($username->getUser()->query($sql) === TRUE) {

            var_dump($sql);

        } else {
            echo "error: " . $sql . "<br>" . $username->getUser()->error;
        }
    } */
}



?>