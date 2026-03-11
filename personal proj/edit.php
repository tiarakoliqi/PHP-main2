<?php 

session_start();

include_once('config.php');


$id = $_GET['id'];


$sql = "SELECT * FROM books WHERE id=:id";

$selectBook = $conn->prepare($sql);
$selectBook->bindParam(':id', $id);
$selectBook->execute();

$book_data = $selectBook->fetch();

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Book</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<header class="navbar navbar-dark bg-dark shadow">

<a class="navbar-brand px-3">
<?php echo "Welcome ".$_SESSION['username']; ?>
</a>

<a class="nav-link text-white" href="logout.php">Sign out</a>

</header>

<div class="container mt-5">

<h2>Edit Book Details</h2>

<form action="update_book.php" method="post">

<div class="form-floating mb-3">

<input readonly type="text" class="form-control" name="id"
value="<?php echo $book_data['id'] ?>">

<label>ID</label>

</div>

<div class="form-floating mb-3">

<input type="text" class="form-control" name="book_name"
value="<?php echo $book_data['book_name'] ?>">

<label>Book Name</label>

</div>

<div class="form-floating mb-3">

<input type="text" class="form-control" name="book_desc"
value="<?php echo $book_data['book_desc'] ?>">

<label>Book Description</label>

</div>

<div class="form-floating mb-3">

<input type="text" class="form-control" name="book_author"
value="<?php echo $book_data['book_author'] ?>">

<label>Author</label>

</div>

<div class="form-floating mb-3">

<input type="number" class="form-control" name="book_price"
value="<?php echo $book_data['book_price'] ?>">

<label>Price</label>

</div>

<button class="w-100 btn btn-primary" type="submit" name="submit">

Update Book

</button>

</form>

</div>

</body>
</html>