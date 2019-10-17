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
    
    public function linkUserPost()
    {
        $sql1 = "SELECT id FROM user JOIN posts ON user.username = posts.user_post";
        $sql2 = "SELECT id_post FROM posts JOIN user ON posts.user_post = user.username";

        while ($sqlQuery1 = $this->getConnection()->query($sql1) and $sqlQuery2 = $this->getConnection()->query($sql2)) {
            $row1 = mysqli_fetch_all($sqlQuery1);
            $row2 = mysqli_fetch_all($sqlQuery2);
            $value1 = $row1[0][0];
            var_dump($row2);
            for ($i = 0; $i <= count($row2) - 1; $i++) {
                $val = $row2[$i][0];
                $sqlresult = "INSERT INTO link (`id_user`, `id_post`) VALUES ('$value1', '$val')";
                $result = $this->getConnection()->query($sqlresult);
            }
            return $result;
        }
    }
}

$post = new LinkController();
vd($post->linkUserPost());