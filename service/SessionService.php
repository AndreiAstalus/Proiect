<?php

require "../../model/User.php";

class SessionService
{

    public static function setUserSession($userData)
    {
        ob_start();
        session_start();

        $user = new User();
        $user->setId($userData[0][0]);
        $user->setUsername($userData[0][1]);
        $user->setPassword($userData[0][2]);
        $user->setCreatedAt($userData[0][3]);

        $_SESSION["loggedUser"] = $user;
        echo "Session has been set.";
    }

    public static function removeUserSession()
    {
        ob_start();
        session_start();
        session_unset();
        session_destroy();
    }

}