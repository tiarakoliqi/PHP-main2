<?php 

session_start();

include_once('config.php');

$user_id = $_SESSION['id'];

if ($_SESSION['is_admin'] == 'true') {

$sql = "SELECT books.book_name, users.email, orders.id, orders.quantity, orders.order_date, orders.is_approved 
FROM books
INNER JOIN orders ON books.id = orders.book_id
INNER JOIN users ON users.id = orders.user_id";

$selectOrders = $conn->prepare($sql);
$selectOrders->execute();

$orders_data = $selectOrders->fetchAll();

}else{

$sql = "SELECT books.book_name, users.email, orders.quantity, orders.order_date, orders.is_approved
FROM books
INNER JOIN orders ON books.id = orders.book_id
INNER JOIN users ON users.id = orders.user_id
WHERE orders.user_id = :user_id";

$selectOrders = $conn->prepare($sql);
$selectOrders->bindParam(':user_id',$user_id);
$selectOrders->execute();

$orders_data = $selectOrders->fetchAll();

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">

<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
<?php echo "Welcome to dashboard ".$_SESSION['username']; ?>
</a>

<input class="form-control form-control-dark w-50" type="text" placeholder="Search">

<div class="navbar-nav">
<div class="nav-item text-nowrap">
<a class="nav-link px-3" href="logout.php">Sign out</a>
</div>
</div>

</header>

<div class="container-fluid">

<div class="row">

<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

<div class="position-sticky pt-3">

<ul class="nav flex-column">

<?php if ($_SESSION['is_admin'] == 'true') { ?>

<li class="nav-item">
<a class="nav-link" href="home.php">Home</a>
</li>

<li class="nav-item">
<a class="nav-link active" href="dashboard.php">Dashboard</a>
</li>

<li class="nav-item">
<a class="nav-link" href="list_books.php">Books</a>
</li>

<li class="nav-item">
<a class="nav-link" href="orders.php">Orders</a>
</li>

<?php } else { ?>

<li class="nav-item">
<a class="nav-link" href="home.php">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="orders.php">Orders</a>
</li>

<?php } ?>

</ul>

</div>

</nav>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

<h1 class="h2">Dashboard</h1>

</div>

<h2>Book Orders</h2>

<div class="table-responsive">

<table class="table table-striped table-sm">

<thead>

<tr>

<th>Book Name</th>
<th>User Email</th>
<th>Quantity</th>
<th>Order Date</th>
<th>Approved</th>

<?php if ($_SESSION['is_admin'] == 'true') { ?>

<th>Approve</th>
<th>Decline</th>

<?php } ?>

</tr>

</thead>

<tbody>

<?php foreach ($orders_data as $order_data) { ?>

<tr>

<td><?php echo $order_data['book_name']; ?></td>
<td><?php echo $order_data['email']; ?></td>
<td><?php echo $order_data['quantity']; ?></td>
<td><?php echo $order_data['order_date']; ?></td>
<td><?php echo $order_data['is_approved']; ?></td>

<?php if ($_SESSION['is_admin'] == 'true') { ?>

<td><a href="approve.php?id=<?= $order_data['id']; ?>">Approve</a></td>
<td><a href="decline.php?id=<?= $order_data['id']; ?>">Decline</a></td>

<?php } ?>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</main>

</div>

</div>

</body>

</html>