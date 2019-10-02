<?php

interface UsersControllerInterface
{
    public function getUsers();

    public function postUsers();

    public function putUsers();

    public function deleteUsers();

}

class UsersController implements UsersControllerInterface
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new MysqlConfiguration())->getConnection();
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM user";

        if ($username=$this->getConnection()->query($sql)) {

            var_dump($username);

        } else {
            echo "error: " . $sql . "<br>" . $username->getConnection()->error;
        }

    }

    public function postUsers()
    {
        $sql = "INSERT INTO `user` (`username`) VALUE ('GIGEL')";

        if ($username=$this->getConnection()->query($sql)) {

            var_dump($username);

        } else {
            echo "error: " . $sql . "<br>" . $username->getConnection()->error;
        }
    }

    public function putUsers()
    {

    }

    public function deleteUsers()
    {

    }


}

$userController = new UsersController();

var_dump($userController->getConnection());

var_dump($userController->getUsers());

var_dump($userController->postUsers());


?>