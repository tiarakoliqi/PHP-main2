<?php 
session_start();
include_once('config.php');

$id = $_GET['id'];

$sql = "SELECT * FROM customers WHERE id=:id";
$selectCustomer = $conn->prepare($sql);
$selectCustomer->bindParam(':id', $id);
$selectCustomer->execute();

$customer_data = $selectCustomer->fetch();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - Edit Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand px-3"><?php echo "Welcome ".$_SESSION['username']; ?></a>
  <a class="nav-link text-white" href="logout.php">Sign out</a>
</header>

<div class="container mt-5">
<h2>Edit Customer Details</h2>

<form action="updateCustomer.php" method="post">

<div class="form-floating mb-3">
  <input type="number" class="form-control" name="id" readonly value="<?php echo $customer_data['id']; ?>">
  <label>ID</label>
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control" name="first_name" value="<?php echo $customer_data['first_name']; ?>">
  <label>First Name</label>
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control" name="username" value="<?php echo $customer_data['username']; ?>">
  <label>Username</label>
</div>

<div class="form-floating mb-3">
  <input type="email" class="form-control" name="email" value="<?php echo $customer_data['email']; ?>">
  <label>Email</label>
</div>

<button class="w-100 btn btn-primary" type="submit" name="submit">Update Customer</button>
</form>
</div>

</body>
</html>