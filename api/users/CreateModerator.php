<?php

require_once "../../vendor/PhpRbac/autoload.php";
session_start();
include "../../utils/Utils.php";

use PhpRbac\Rbac;
$rbac = new Rbac();

    //Check if logged user is admin
    if($rbac->check('moderate_all',$_SESSION['logged_user_id'])){

    $requestBody = getRequestBody();

        // Check if id is not null
        if (($id = ($requestBody->id)) != null) {

        $role_id = $rbac->Roles->returnId('forum_moderator');

            // Check if moderator exists
            if(!$rbac->Users->hasRole($role_id, $id)){
            // Create Role and Permission
            $perm_id = $rbac->Permissions->add('modify_users', 'Can modify forum users');
            $role_id = $rbac->Roles->add('forum_moderator', 'User can moderate forums');

            // Assign Permission to Role
            $rbac->Roles->assign($role_id, $perm_id);

            // Assign Role to User (The UserID is provided by the application's User Management System)
            $rbac->Users->assign($role_id, $id);

            echo 'Moderator created';

             } else{
            echo 'User is already a moderator';
            }
        }
    } else{
        echo 'Only Admin has right to create moderators';
    }







