<?php

require "../../configuration/MysqlConfiguration.php";
require "../interface/PostsControllerInterface.php";

include "../../utils/Utils.php";

class PostsController implements PostsControllerInterface
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

    public function getPosts()
    {
        $sql = "SELECT * FROM posts";

        if ($sqlQuery = $this->getConnection()->query($sql)) {
            // Get query result values
            $result = $sqlQuery->fetch_all();

            // Close database connection
            $sqlQuery->free();

            // Return values
            return $result;
        } else {
            die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
        }
    }
    public function getPost()
    {
        $queryParameters = getQueryParameters();

        if (($titlu = ($queryParameters->titlu)) != null) {
            $sql = "SELECT * FROM posts WHERE titlu = '" . $titlu . "'";

            if ($sqlQuery = $this->getConnection()->query($sql)) {
                // Get query result values
                $result = $sqlQuery->fetch_all();

                // Close database connection
                $sqlQuery->free();

                // Return values
                return $result;
            } else {
                die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
            }
        }
    }
    public function postPosts()
    {
        $requestBody = getRequestBody();

        $sql = "INSERT INTO `posts`(`id_post`, `titlu`, `context`, `data_creare_post`, `user_post`)
                    VALUES (
                    '',
                    '" . $requestBody->titlu . "',
                    '" . $requestBody->context . "',
                    '" . date('Y-m-d') . "',
                    '" . $requestBody->user_post . "')";

        if (($post = $requestBody) != null) {
            if ($sqlQuery = $this->getConnection()->query($sql)) {

                // Close database connection
                $sqlQuery->free();

                return $post;
            } else {
                die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
            }
        }
    }
    public function updatePosts()
    {
        $requestBody = getRequestBody();
        $queryParameters = getQueryParameters();

        $sql = "UPDATE `posts` 
                SET `titlu` = '" . $requestBody->titlu . "',  
                    `context` = '" . $requestBody->context . "',
                    `data_modif_post` = '" . date('Y-m-d') . "'
                WHERE `id_post` = '" . $queryParameters->id_post . "'";

        if (($id_post = $requestBody) != null) {
            if ($sqlQuery = $this->getConnection()->query($sql)) {

                // Close database connection
                $sqlQuery->free();

                return $id_post;
            } else {
                die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
            }
        }
    }

    public function deletePosts()
    {
        $queryParameters = getQueryParameters();

        $sql = "DELETE FROM `posts` WHERE `id_post` = '" . $queryParameters->id_post . "'";

        if (($id_post = ($queryParameters->id_post)) != null) {
            if ($sqlQuery = $this->getConnection()->query($sql)) {
                return null;
            } else {
                die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
            }
        }
    }
}

$post = new PostsController();
vd($post->getPost());