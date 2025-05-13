<?php
include('db.php');

$book_id = $_POST['book_id'];
$member_id = $_POST['member_id'];


$check = mysqli_query($conn, "SELECT copies_available FROM Books WHERE book_id = $book_id");
$row = mysqli_fetch_assoc($check);

if ($row['copies_available'] > 0) {
    
    $query = "INSERT INTO Loans (book_id, member_id) VALUES ($book_id, $member_id)";
    mysqli_query($conn, $query);

    
    mysqli_query($conn, "UPDATE Books SET copies_available = copies_available - 1 WHERE book_id = $book_id");

    header("Location: ../loans1.php");
} else {
    echo "No copies available!";
}
?>
