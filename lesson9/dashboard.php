<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
include_once('config.php');
$sql = "SELECT *FROM users";
$getusers =$conn-prepare($sql);
$getusers->execute();
?>

<br><br>

<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
</thead>
<tbody>
    <?php
       foreach($users as $user){
        ?>
        <tr>
            <td><?=$user['id'] ?></td>
            <td><?=$user['name'] ?></td>
            <td><?=$user['surname'] ?></td>
            <td><?=$user['email'] ?></td>
            <td><? "<a herf ='delete.php?id=$user[id]'> Delete,/a>|<a herf='edit.php?id=$user[id]'>Update</a>"?></td>
       </tr>
       <?php
       }
       ?>
   </body><
    </table>
    <a herf="add.php">Add user</a>

    </body>
    </html>