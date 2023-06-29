<?php 

$host = "localhost";
$user = "root";
$password = "";
$database = "sms";

$connect = mysqli_connect($host, $user, $password, $database);

if(!$connect){
    die("Connection Failed.");
}else{
    // echo "Connected";
};




?>