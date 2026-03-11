<?php 
session_start(); 

include_once('config.php');

if (empty($_SESSION['username'])) {
      header("Location: login.php");
      exit;
}

$sql = "SELECT * FROM movies";
$selectMovies = $conn->prepare($sql);
$selectMovies->execute();
$movies_data = $selectMovies->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo "Welcome, ".$_SESSION['username']; ?></a>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <?php if ($_SESSION['is_admin'] == 'true') { ?>
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="list_movies.php">Movies</a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="bookings.php">Bookings</a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h2>Movies</h2>
      <?php if ($_SESSION['is_admin'] == 'true') { ?>
        <a href="movies.php" class="btn btn-primary mb-3">Add Movie</a>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Id</th>
                <th>Movie Name</th>
                <th>Description</th>
                <th>Quality</th>
                <th>Rating</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($movies_data as $movie) { ?>
                <tr>
                  <td><?= $movie['id']; ?></td>
                  <td><?= $movie['movie_name']; ?></td>
                  <td><?= $movie['movie_desc']; ?></td>
                  <td><?= $movie['movie_quality']; ?></td>
                  <td><?= $movie['movie_rating']; ?></td>
                  <td><a href="edit.php?id=<?= $movie['id']; ?>">Update</a></td>
                  <td><a href="delete.php?id=<?= $movie['id']; ?>">Delete</a></td>
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