<?php

require "../../configuration/MysqlConfiguration.php";

include "../../utils/Utils.php";

class LinkController
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

    public function linkUser()
    {
        $sql="SELECT id FROM user LEFT JOIN posts ON user.username = posts.user_post";
        if($sqlQuery = $this->getConnection()->query($sql))
        {
            $row = mysqli_fetch_row($sqlQuery);
            $value = $row[0];
            $sqlresult= "INSERT INTO link (`id_user`) VALUE ('$value')";
            $result=$this->getConnection()->query($sqlresult);
            return $result;
        } else{
            die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
        }
    }

    public function linkPost(){

        $sql="SELECT id_post FROM posts LEFT JOIN user ON posts.user_post = user.username";
        if($sqlQuery = $this->getConnection()->query($sql))
        {
            $row = mysqli_fetch_row($sqlQuery);
            $value = $row[0];
            $sqlresult= "INSERT INTO link (`id_post`) VALUE ('$value')";
            $result=$this->getConnection()->query($sqlresult);
            return $result;
        } else{
            die("error: " . $sql . "<br>" . $sqlQuery = $this->getConnection()->error);
        }
    }

    public function linkUserPost(){
        $sql1="SELECT id FROM user JOIN posts ON user.username = posts.user_post";
        $sql2="SELECT id_post FROM posts JOIN user ON posts.user_post = user.username";

        while ($sqlQuery1 = $this->getConnection()->query($sql1) and $sqlQuery2 = $this->getConnection()->query($sql2)){
            $row1 = mysqli_fetch_all($sqlQuery1);
            $row2 = mysqli_fetch_all($sqlQuery2);
                $value1=$row1[0][0];
                $value2=$row2[0][0];
                var_dump($value1);
                var_dump($value2);
                $sqlresult = "INSERT INTO link (`id_user`, `id_post`) VALUES ('$value1', '$value2')";
                $result = $this->getConnection()->query($sqlresult);
                return $result;

        }
    }
}

$post = new LinkController();
//vd($post->linkUser());
//vd($post->linkPost());
vd($post->linkUserPost());