<?php

require "../../configuration/MysqlConfiguration.php";

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

        if (($username = ($requestBody->username) and $password =($requestBody->password)) != null) {
            $sql = "SELECT id FROM user WHERE(
                         `username` = '" . $username . "'
                         AND `password` = '". $password . "')";

            if ($sqlQuery = $this->getConnection()->query($sql)) {
                // Get query result values
                $rows = $sqlQuery->num_rows;

//                // Return values
//                return $result;

                if($rows==1){
                    echo ("Login");
                }
                else{
                    echo "Error" . $rows ;
                }
            } else {
                die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
            }
        }
    }
}