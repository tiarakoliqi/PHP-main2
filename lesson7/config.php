<?php

$host="localhost";
$user="root";
$pass="";
try{

    $con=new PDO("mysql:host=$host",$user,$pass);
    echo "Connected";

}catch(Exception $e){
    echo "Not Connected";
}
?>