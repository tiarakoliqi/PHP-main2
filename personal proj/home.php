<?php 
session_start();
include_once('config.php');

$sql = "SELECT * FROM books";
$selectBooks = $conn->prepare($sql);
$selectBooks->execute();
$books_data = $selectBooks->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
<title>Online Book Store</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

body{
background:linear-gradient(135deg,#eef2f7,#d9e4f5);
font-family:'Segoe UI',sans-serif;
}

/* Navbar */
.navbar{
background:linear-gradient(90deg,#1f2937,#111827);
}

.navbar-brand{
font-size:22px;
letter-spacing:1px;
}

/* Hero */
.hero{
background:linear-gradient(135deg,#4f46e5,#3b82f6);
color:white;
padding:80px 20px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* Cards */
.card{
border:none;
border-radius:15px;
overflow:hidden;
transition:0.3s;
}

.card:hover{
transform:translateY(-10px);
box-shadow:0 15px 30px rgba(0,0,0,0.2);
}

.card img{
height:350px;
object-fit:cover;
}

/* Buttons */
.btn-outline-secondary{
border-radius:20px;
}

.btn-outline-secondary:hover{
background:#4f46e5;
border-color:#4f46e5;
color:white;
}

/* Rating */
.rating{
color:#f59e0b;
font-weight:bold;
}

/* Category images */
.category img{
height:160px;
object-fit:cover;
border-radius:10px;
transition:0.3s;
}

.category img:hover{
transform:scale(1.05);
}

/* Footer */
footer{
background:#111827;
color:white;
margin-top:60px;
padding:30px;
}

</style>
</head>

<body>

<header>
<div class="navbar navbar-dark shadow-sm">
<div class="container">

<a href="#" class="navbar-brand">
📚 <strong>Online Book Store</strong>
</a>

</div>
</div>
</header>

<!-- HERO -->
<section class="container my-5">
<div class="hero text-center">
<h1 class="fw-bold">Discover Your Next Favorite Book</h1>
<p class="lead">Browse our collection of amazing books and start reading today.</p>
</div>
</section>


<!-- BOOK CATEGORIES -->
<section class="container mb-5 category">

<h2 class="text-center fw-bold mb-4">Popular Categories</h2>

<div class="row text-center">

<div class="col-md-3">
<img src="fantasy.avif" class="img-fluid shadow">
<p class="mt-2 fw-bold">Fantasy</p>
</div>

<div class="col-md-3">
<img src="sience.jpg" class="img-fluid shadow">
<p class="mt-2 fw-bold">Science</p>
</div>

<div class="col-md-3">
<img src="buss.jpg" class="img-fluid shadow">
<p class="mt-2 fw-bold">Business</p>
</div>

<div class="col-md-3">
<img src="history.jpg" class="img-fluid shadow">
<p class="mt-2 fw-bold">History</p>
</div>

</div>

</section>


<!-- BOOK LIST -->
<div class="album py-4">
<div class="container">

<h2 class="text-center fw-bold mb-4">📖 Our Books</h2>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">

<?php foreach ($books_data as $book_data) { ?>

<div class="col">
<div class="card shadow-sm h-100">

<img src="book_images/<?php echo $book_data['book_image']; ?>">

<div class="card-body">

<h5 class="fw-bold"><?php echo $book_data['book_title']; ?></h5>

<p class="text-muted">
<?php echo substr($book_data['book_desc'],0,100); ?>...
</p>

<div class="d-flex justify-content-between align-items-center">

<div class="btn-group">

<a href="book_details.php?id=<?php echo $book_data['id']; ?>" 
class="btn btn-sm btn-outline-secondary">
View
</a>

<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>

<a href="edit_book.php?id=<?php echo $book_data['id']; ?>" 
class="btn btn-sm btn-outline-secondary">
Edit
</a>

<?php } ?>

</div>

<div class="text-end">

<div class="rating">
⭐ <?php echo $book_data['book_rating']; ?>/5
</div>

<small class="text-muted">
<?php echo $book_data['book_quality']; ?>
</small>

</div>

</div>
</div>
</div>
</div>

<?php } ?>

</div>
</div>
</div>


<!-- FOOTER -->
<footer class="text-center">

<h5>📚 Online Book Store</h5>

<p>Find your next favorite book today</p>

<p style="opacity:0.7">
© 2026 BookStore
</p>

</footer>

</body>
</html>