<?php
include('db.php');

$loan_id = $_POST['loan_id'];

// Get the book id
$result = mysqli_query($conn, "SELECT book_id FROM Loans WHERE loan_id = $loan_id");
$row = mysqli_fetch_assoc($result);
$book_id = $row['book_id'];

// Update loan record
$query = "UPDATE Loans SET returned = 1, return_date = CURDATE() WHERE loan_id = $loan_id";
mysqli_query($conn, $query);

// Increase book copies
mysqli_query($conn, "UPDATE Books SET copies_available = copies_available + 1 WHERE book_id = $book_id");

header("Location: ../loans1.php");
?>
