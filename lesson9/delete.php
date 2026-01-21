<?php
include_once("config.php");

$id = $_Get['id'];

$sql = "DELETE FROM user WHERE id=:id";

$getUsers = $conn->prepare($sql);

$getUsers->bindParam(':id' ,$id);

$getUsers->execute();

header('Location:dashbiard.php');
?>

