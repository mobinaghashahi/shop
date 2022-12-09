<?php

function connectExam()
{

    $mysqli = new mysqli("localhost", "mobin", "00981920", "shop");

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();

    }

    return $mysqli;
}
