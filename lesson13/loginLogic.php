<?php
session_start();
require ' config.php';

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password=$_POST['password'];

    if(emty($username) || emty($passwod)){
        echo "FILL all the dields";
        header("refresh:2; url=login.php");
    }else{
        
       $sql= "SELECT * FROM users WHERE username=:username";
       $tempSQL= $conn->prepare($sql);
       $tempSQL-> bindParam('username',$username);
       $tempSQL->execute();

       if($tempSQL->rowCound() > 0)
       {
        $data=$insertsql->fetch();

        if($passwod == $data['password']){
           $_SESSION['username '] = $data['username'];
           header('Location: dashboard.php');
           exit;
        }else{
            echo "Password incorrect";
            header("refresh:2 url=login.php");
            exit;
        }

       }else{
        echo "user not found";
        header("refresh:2 url=login.php");
        exit;
       }
    }
}
?>