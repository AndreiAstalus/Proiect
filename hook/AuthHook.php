<?php

class AuthHook
{

    public function checkAuth()
    {
        ob_start();
        session_start();

        if (!isset($_SESSION["loggedUser"])) {
            header('Location: ../index.php');
        }
    }

}
