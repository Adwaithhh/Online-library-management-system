<?php
include('db.php');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$query = "INSERT INTO Members (name, email, phone)
          VALUES ('$name', '$email', '$phone')";

mysqli_query($conn, $query);

header("Location: ../members1.php");
?>
