<?php


include '../../controller/implementation/UsersController.php';

$user = new UsersController();
vd($user->deleteUsers());