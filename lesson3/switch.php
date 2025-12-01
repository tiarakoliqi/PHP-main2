<?php
$age = 15;

switch($age){
   case ($age >=0 && $age<18):
    echo "Y ou are a minor <br>";
    break;
 case ($age >=18 && $age <=20):
    echo "You are a zoung adult <br>";
    break;
 case($age > 25):
    echo "You are an adult <br>";
    nreak;
    default:
    echo "Invalidinput <br>";
    break;
}
?>