<?php

class AuthHook
{

    public function checkAuth()
    {
        ob_start();
        session_start();

        if (!isset($_SESSION["loggedUser"])) {
            $_SESSION['message']='Invalid Credentials';
            header('Location: ../index.php');
        } else{
            $_SESSION['message2']='Welcome ' . $_SESSION['username'];
        }
    }

}
