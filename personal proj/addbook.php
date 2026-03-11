<?php	


include_once('config.php');


if(isset($_POST['submit']))
{

    
    $book_name = $_POST['book_name'];
    $book_desc = $_POST['book_desc'];
    $book_author = $_POST['book_author'];
    $book_price = $_POST['book_price'];
    $book_image = $_POST['book_image'];

    
    $sql = "INSERT INTO books(book_name, book_desc, book_author, book_price, book_image) 
            VALUES (:book_name, :book_desc, :book_author, :book_price, :book_image)";

    $insertBook = $conn->prepare($sql);

    
    $insertBook->bindParam(':book_name', $book_name);
    $insertBook->bindParam(':book_desc', $book_desc);
    $insertBook->bindParam(':book_author', $book_author);
    $insertBook->bindParam(':book_price', $book_price);
    $insertBook->bindParam(':book_image', $book_image);

    $insertBook->execute();

    
    header("Location: books.php");
}
?>