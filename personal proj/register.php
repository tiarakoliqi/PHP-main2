<?php

include_once('config.php');

if(isset($_POST['submit'])){

    $emri = $_POST['emri'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $tempPass = $_POST['password'];
    $tempConfirm = $_POST['confirm_password'];

    if(empty($emri) || empty($username) || empty($email) || empty($tempPass) || empty($tempConfirm)){
        echo "You have not filled in all the fields.";
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid email format.";
        exit();
    }

    if($tempPass !== $tempConfirm){
        echo "Passwords do not match.";
        exit();
    }

    $password = password_hash($tempPass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(emri, username, email, password) 
            VALUES (:emri, :username, :email, :password)";

    $insertSql = $conn->prepare($sql);

    $insertSql->bindParam(':emri', $emri);
    $insertSql->bindParam(':username', $username);
    $insertSql->bindParam(':email', $email);
    $insertSql->bindParam(':password', $password);

    $insertSql->execute();

    header("Location: login.php");
    exit();
}

?>