<?php

require "../../configuration/MysqlConfiguration.php";
require "../../service/SessionService.php";

include "../../utils/Utils.php";

class LoginController
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

    public function login()
    {
        $requestBody = getRequestBody();

        if (($requestBody->username && $requestBody->password) != null) {
            $sql = "SELECT * FROM user WHERE(
                         `username` = '" . $requestBody->username . "'
                         AND `password` = '" . generatePassword($requestBody->password) . "')";

            if ($sqlQuery = $this->getConnection()->query($sql)) {
                // Get query result values
                $rows = $sqlQuery->num_rows;
                $row = $sqlQuery->fetch_all();

                if ($rows == 1) {
                    SessionService::setUserSession($sqlQuery->fetch_all());
                    $_SESSION['username']=$row[0][6];
                    echo "Login";
                } else {
                    echo "Error" . $rows;
                }
            } else {
                die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
            }
        }
    }

    public function logout()
    {
        SessionService::removeUserSession();
    }
}