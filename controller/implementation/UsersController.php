<?php

require "../../configuration/MysqlConfiguration.php";
require "../../controller/interface/UsersControllerInterface.php";

include "../../utils/Utils.php";

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
            // Get query result values
            $result = $sqlQuery->fetch_all();

            // Close database connection
            $sqlQuery->free();

            // Return values
            return $result;
        } else {
            die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
        }
    }


    public function getUser()
    {
        $queryParameters = getQueryParameters();

        if (($username = ($queryParameters->username)) != null) {
            $sql = "SELECT * FROM user WHERE username = '" . $username . "'";

            if ($sqlQuery = $this->getConnection()->query($sql)) {
                // Get query result values
                $result = $sqlQuery->fetch_all();

                // Close database connection
                $sqlQuery->free();

                // Return values
                return $result;
            } else {
                die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
            }
        }
    }

    public function postUsers()
    {
        $requestBody = getRequestBody();

        $sql = "INSERT INTO `user`(`id`,`username`, `password`)
                    VALUES (
                    '',
                    '" . $requestBody->username . "',
                    '" . $requestBody->password . "')";

        if (($user = $requestBody->username) != null and ($pass = $requestBody->password) != null) {
            if ($sqlQuery = $this->getConnection()->query($sql)) {
                return $user;
            } else {
                die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
            }
        }
    }

    public function putUsers()
    {
        $requestBody = getRequestBody();
        $queryParameters = getQueryParameters();

        $sql = "UPDATE `user` 
                SET `username` = '" . $requestBody->username . "',  
                    `password` = '" . $requestBody->password . "'
                WHERE `username` = '" . $queryParameters->username . "'";

        if (($user = $requestBody) != null) {
            if ($sqlQuery = $this->getConnection()->query($sql)) {

                return $user;
            } else {
                die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
            }
        }
    }

    public function deleteUsers()
    {
        $queryParameters = getQueryParameters();

        $sql = "DELETE FROM `user` WHERE `username` = '" . $queryParameters->username . "'";

        if (($username = ($queryParameters->username)) != null) {
            if ($sqlQuery = $this->getConnection()->query($sql)) {
                return null;
            } else {
                die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
            }
        }
    }


}

//$user=new UsersController();
//vd($user->getUsers());