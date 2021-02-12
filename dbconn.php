<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "sayan10";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    echo "something is wrong with the connection";
}




?>