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
        $result = null;

        if (($title = ($queryParameters->title)) != null) {
            $sql = "SELECT * FROM posts WHERE title = '" . $title . "'";

            if ($sqlQuery = $this->getConnection()->query($sql)) {
                // Get query result values
                $result = $sqlQuery->fetch_all();

                // Close database connection
                $sqlQuery->free();

            } else {
                die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
            }
        }

        // Return values
        return $result;
    }

    public function postPosts()
    {
        $requestBody = getRequestBody();

        if ($requestBody == null) {
            die("error: Please provide a post body");
        }

        try {
            // Start transaction
            $this->getConnection()->begin_transaction();

            // Query for post insert
            if (!($query = $this->getConnection()->query(
                "INSERT INTO `posts`(`title`, `body`, `created_at`)
                    VALUES (
                    '" . $requestBody->title . "',
                    '" . $requestBody->body . "',
                    '" . date('Y-m-d') . "')"))) {
                 var_dump($query);

                throw new Exception($query);

            }

            // Query for insert user post association
            if (!($query = $this->getConnection()->query(
                "INSERT INTO `user_has_posts`(`user_id`, `post_id`)
                            VALUES ('" . $requestBody->user_id . "',
                                    '" . $this->getConnection()->insert_id . "')"))) {

                throw new Exception($query);
            }

            // Commit Transaction
            $this->getConnection()->commit();
            return json_encode(array('success' => 'true'));
        } catch (Exception $exception) {
            // Rollback transaction

            $this->getConnection()->rollback();
        }
    }

    public function updatePosts()
    {
        $requestBody = getRequestBody();
        $queryParameters = getQueryParameters();

        $sql = "UPDATE `posts` 
                SET `title` = '" . $requestBody->title . "',  
                    `body` = '" . $requestBody->body . "',
                    `date_modif_at` = '" . date('Y-m-d') . "'
                WHERE `id` = '" . $queryParameters->id_post . "'";

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

        try {
            //Start transaction
            $this->getConnection()->begin_transaction();

            //Query for post delete
            if (!($query=$this->getConnection()->query(
                "DELETE FROM `posts` WHERE `id` = '" . $queryParameters->id . "'"))) {

                throw new Exception($query);
            }

            //Query for delete user post association
            if(!($query=$this->getConnection()->query(
                "DELETE FROM `user_has_posts` WHERE `post_id` = '" . $queryParameters->id . "'"))){

                throw new Exception($query);
            }

            //Commit transaction
            $this->getConnection()->commit();
            return json_encode(array('success'=>'deleted'));

        } catch (Exception $exception){

            //Rollback transaction
            $this->getConnection()->rollback();
        }
    }

}

$post = new PostsController();

echo($post->deletePosts());