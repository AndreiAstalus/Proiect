<?php

interface UsersControllerInterface
{
    public function getUsers();

    public function getUser();

    public function getId();

    public function postUsers();

    public function putUsers();

    public function deleteUsers();

}