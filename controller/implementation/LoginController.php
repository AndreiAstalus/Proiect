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
                // Check if returned values are correct and start user session
                if ($rows == 1) {
                    SessionService::setUserSession($sqlQuery->fetch_all());
                    $_SESSION['username']=$row[0][6];
                    $_SESSION['logged_user_id']=$row[0][0];
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
        // Remove user session and return to index
        SessionService::removeUserSession();
    }
}