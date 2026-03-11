<?php 

session_start();

include_once('config.php');


$id = $_GET['id'];
$_SESSION['book_id'] = $id;


$sql = "SELECT * FROM books WHERE id=:id";

$selectBook = $conn->prepare($sql);

$selectBook->bindParam(":id",$id);

$selectBook->execute();

$book_data = $selectBook->fetch();

?>

<!DOCTYPE html>
<html>
<head>

<title>Book Details</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
.form-floating{
margin:20px 0;
}
</style>

</head>

<body>

<section class="py-5 text-center container">

<div class="row py-lg-5">

<div class="col-lg-6 col-md-8 mx-auto">

<h1 class="fw-light">Order this Book</h1>

<p class="lead text-muted">You can order this book below</p>

</div>

</div>

</section>

<div class="container">

<div class="card">

<div class="card-body">

<div class="row">

<div class="col-lg-5">



<img src="book_images/<?php echo $book_data['book_image']; ?>" style="width:70%;">

</div>

<div class="col-lg-7">

<h4 class="mt-5">

<?php echo $book_data['book_name']; ?>

</h4>

<p>

<?php echo $book_data['book_desc']; ?>

</p>

<form action="order.php" method="post">

<div class="form-floating">

<input type="number" class="form-control" name="quantity" placeholder="Quantity">

<label>Quantity</label>

</div>

<div class="form-floating">

<input type="date" class="form-control" name="order_date">

<label>Order Date</label>

</div>

<button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">

Order Book

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>