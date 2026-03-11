<?php 
session_start();

include_once('config.php');

if (empty($_SESSION['username'])) {
    header("Location: login.php");
}

$sql = "SELECT * FROM users";
$selectUsers = $conn->prepare($sql);
$selectUsers->execute();

$users_data = $selectUsers->fetchAll();
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

<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3">
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

<?php if ($_SESSION['is_admin'] == 'true') { ?>

<h2>Users</h2>

<div class="table-responsive">

<table class="table table-striped table-sm">

<thead>

<tr>
<th>Id</th>
<th>Emri</th>
<th>Username</th>
<th>Email</th>
<th>Update</th>
<th>Delete</th>
</tr>

</thead>

<tbody>

<?php foreach ($users_data as $user_data) { ?>

<tr>

<td><?php echo $user_data['id']; ?></td>
<td><?php echo $user_data['emri']; ?></td>
<td><?php echo $user_data['username']; ?></td>
<td><?php echo $user_data['email']; ?></td>

<td>
<a href="editUsers.php?id=<?= $user_data['id'];?>">Update</a>
</td>

<td>
<a href="deleteUsers.php?id=<?= $user_data['id'];?>">Delete</a>
</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php } ?>

</main>

</div>
</div>

</body>
</html>