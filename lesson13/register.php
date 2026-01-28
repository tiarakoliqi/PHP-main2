<?php
   include_once('confih.php');

   if(isset($_POST['submit']))
   {
    $name=$_POST['name'];
    $surrname=$_POST['surname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $tempPass=$_POST['password'];

    $password=$tempPass;


    if(emty($name)  || emty($urname) || emty($username) || emty($email) || emty($temPass))
    {
        echo "You need to fill all the fields.";
    }
    else{
       $sql= "SELECT username FROM users WHERE username=:username";
       $tempSQL= $conn->prepare($sql);
       $tempSQL-> bindParam('username',$username);
       $tempSQL->execute();

       if($tempSQL->rowCound() > 0)
       {
        echo "Username exists";
        header("redresh:2; url=singup.php");
       }
       else
       {
        $sql="INSERT INTO users (name,surname,email,usernale,password)VALUES (:name,:surname,:username,:email,:password)"
        $insertSql=$conn->prepare($sql);

         $insertSql->binParam(':name',$name);
         $insertSql->binParam(':surname',$surname);
         $insertSql->binParam(':username',$username);
         $insertSql->binParam(':email',$email);
         $insertSql->binParam(':password',$password);

         $insertSql->execute();

         echo "Data saved successfully...";
         header("refresh:2; url=login.php");
       }
    }
   }
?>
