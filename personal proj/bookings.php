<?php 


	 session_start();
   
  

   include_once('config.php');

   $user_id = $_SESSION['id'];
   

   if ($_SESSION['is_admin'] == 'true') {

     $sql = "SELECT books.book_name, users.email,bookings.id, , bookings.date, bookings.is_approved, bookings.time FROM movies
     INNER JOIN bookings ON book.id = bookings.movie_id
     INNER JOIN users ON users.id = bookings.user_id";
            

    $selectBookings = $conn->prepare($sql);
    $selectBookings->execute();

    $bookings_data = $selectBookings->fetchAll();
   }else {
    
      $sql = "SELECT book.book_name, users.email, , bookings.date,bookings.is_approved, bookings.time
            FROM book INNER JOIN bookings ON book.id = bookings.mbook_id 
            INNER JOIN users ON users.id = bookings.user_id WHERE bookings.user_id = :user_id";

    $selectBookings = $conn->prepare($sql);
    $selectBookings->bindParam(':user_id',$user_id);
    $selectBookings->execute();

    
    ?>
  

    
    
    