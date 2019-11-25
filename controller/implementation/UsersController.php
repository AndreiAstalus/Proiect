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

    public function getId()
    {
        $requestBody = getRequestBody();

        if (($username = ($requestBody->username)) != null) {
            $sql = "SELECT id FROM user WHERE username = '" . $username . "'";

            if ($sqlQuery = $this->getConnection()->query($sql)) {
                // Get query result values
                $result = $sqlQuery->fetch_row();

                echo $result[0];
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
                    '" . generatePassword($requestBody->password) . "')";

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
                    `password` = '" . generatePassword($requestBody->password) . "'
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
        $requestBody = getRequestBody();

        $sql = "DELETE FROM `user` WHERE 
                    `username` = '" . $requestBody->username . "'
                AND `password` = '" . $requestBody->password . "'";

        if (($username = ($requestBody->username)) != null) {
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