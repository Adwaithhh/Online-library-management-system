<?php
include('db.php');

$title = $_POST['title'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$year = $_POST['year'];
$copies = $_POST['copies'];

$query = "INSERT INTO Books (title, author, genre, published_year, copies_available) 
          VALUES ('$title', '$author', '$genre', $year, $copies)";

mysqli_query($conn, $query);

header("Location: ../books1.php");
?>
