<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'tsf_bank';

$con = mysqli_connect($host, $user, $pass, $db);

if(!$con){
    die("Couldn't connect to the database due to the following error --> ");
}

?>