<?php

class AuthHook
{
    // Function for checking if Session was created
    public function checkAuth()
    {
        ob_start();
        session_start();

        if (!isset($_SESSION["loggedUser"])) {
            $_SESSION['message']='Invalid Credentials';
            // Session was not created, returned to index page
            header('Location: ../index.php');
        } else{
            // Welcome message 
            $_SESSION['message2']='Welcome ' . $_SESSION['username'];
        }
    }

}
