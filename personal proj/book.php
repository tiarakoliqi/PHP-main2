<?php 
 

	session_start();

	include_once('config.php');

	
	$user_id = $_SESSION['id'];
    $book_id = $_SESSION['book_id'];

	
	$nr_pages = $_POST['nr_pages'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	
	$sql = "INSERT INTO bookings(user_id, book_id, nr_pages, date, time) VALUES (:user_id, :book_id, :nr_pages, :date, :time)";

	$insertBooking = $conn->prepare($sql);

	$insertBooking->bindParam(":user_id", $user_id);
	$insertBooking->bindParam(":book_id", $book_id);
	$insertBooking->bindParam(":nr_pages", $nr_pages);
	$insertBooking->bindParam(":date", $date);
	$insertBooking->bindParam(":time", $time);

	$insertBooking->execute();
