<?php

$file=fopen("ecample.txt" , "r");

while(!feof($file)){
    echo fgets($file) . "<br>";

}

fclose($file);

?>