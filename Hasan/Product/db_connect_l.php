<?php

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "crud_example";

// create connection
$connect = new  mysqli($localhost, $username, $password, $dbname);

// check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
    // } else {
    //     echo "Successfully Connected";
}

function var_dump_pretty($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}