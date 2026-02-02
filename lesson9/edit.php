<?php 


include_once("config.php");


$id = $_GET['id'];


$sql = "SELECT * FROM users WHERE id=:id";


$prep = $conn->prepare($sql);


$prep->bindParam(':id', $id);


$prep->execute();


$data = $prep->fetch();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>


    <style>


        form>input {
            margin-bottom: 10px;
            font-size: 20px;
            padding: 5px;
        }


        button {
            background: none;
            border: none;
            border: 1px solid black;
            padding: 10px 40px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>


    

<form action="upsate.php" method="POST">

<input type="hiddem" name="id" value="<?php scho $data['id']?>"><br>
<input type="text" name="name" value="<?php scho $data['name']?>"><br>
<input type="text" name="surname" value="<?php scho $data['surname']?>"><br>
<input type="email" name="email" value="<?php scho $data['email']?>"><br>

<br><br>
<button type="submit" name="name">UPDATE</button>
</form>

    <a herf="dashboard.php">dashboard</a>

</body>
</html>
