<?php
session_start();

include '../controller/implementation/UsersController.php';

$user=new UsersController();
vd($user->postUsers());

?>