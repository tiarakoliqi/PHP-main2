<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
