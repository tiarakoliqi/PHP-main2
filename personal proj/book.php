 <?php 


session_start();

include_once('config.php');


$user_id = $_SESSION['id'];
$book_id = $_SESSION['book_id'];



$quantity = $_POST['quantity'];
$order_date = $_POST['order_date'];



$sql = "INSERT INTO orders(user_id, book_id, quantity, order_date) 
VALUES (:user_id, :book_id, :quantity, :order_date)";

$insertOrder = $conn->prepare($sql);

$insertOrder->bindParam(":user_id", $user_id);
$insertOrder->bindParam(":book_id", $book_id);
$insertOrder->bindParam(":quantity", $quantity);
$insertOrder->bindParam(":order_date", $order_date);

$insertOrder->execute();

header("Location: home.php");

?>