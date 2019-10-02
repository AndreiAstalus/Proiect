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

        if ($sqlQuery = $this->getConnection()->query($sql)) {

            while ($row = $sqlQuery->fetch_array()) {

                echo $row['username'];

            }
            $sqlQuery->free();

        } else {
            echo "error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error;
        }

    }

    public function postUsers()
    {
        $sql = "INSERT INTO `user` (`username`) VALUE ('GIGEL')";

        if ($sqlQuery = $this->getConnection()->query($sql)) {

            var_dump($sqlQuery);

        } else {
            echo "error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error;
        }
    }

    public function putUsers()
    {
        $sql = "UPDATE `user` SET `id` = '2' WHERE `username` = 'GIGEL'";

        if ($sqlQuery = $this->getConnection()->query($sql)) {

            var_dump($sqlQuery);

        } else {
            echo "error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error;
        }
    }

    public function deleteUsers()
    {
        $sql = "DELETE FROM `user` WHERE `id` = '2'";

        if ($sqlQuery = $this->getConnection()->query($sql)) {

            var_dump($sqlQuery);

        } else {
            echo "error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error;
        }
    }

    public function getUser(){

        $user=$_GET['username'];

        $sql = "SELECT " . $user . "  FROM user";

        if ($sqlQuery = $this->getConnection()->query($sql)) {

            while ($row = $sqlQuery->fetch_array()) {

                echo $row[$user];

            }
            $sqlQuery->free();

        } else {
            echo "error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error;
        }

    }

}

$userController = new UsersController();

//var_dump($userController->getConnection());

var_dump($userController->getUsers());

var_dump($userController->postUsers());

var_dump($userController->putUsers());

var_dump($userController->deleteUsers());

var_dump($userController->getUser());

?>