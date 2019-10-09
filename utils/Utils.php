<?php

function vd($string)
{
    echo "<pre>";
    var_dump($string);
    echo "</pre>";
}

function getRequestBody()
{
    return json_decode(file_get_contents("php://input"));
}

function getQueryParameters()
{
    return json_decode(json_encode($_GET), FALSE);
}

