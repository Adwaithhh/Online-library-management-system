<?php
include('db.php');

if (isset($_POST['update'])) {
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $published_year = $_POST['published_year'];
    $copies_available = $_POST['copies_available'];

    $query = "UPDATE Books SET 
              title='$title', author='$author', genre='$genre', 
              published_year=$published_year, copies_available=$copies_available
              WHERE book_id=$book_id";

    mysqli_query($conn, $query);
    header("Location: ../books1.php");
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM Books WHERE book_id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
<?php
include('db.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Member - Online Library</title>
    <link rel="stylesheet" href="../css/sty.css"> <!-- Make sure correct path -->
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f') no-repeat center center/cover;
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
        }
        
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .edit-form input[type="text"],
        .edit-form input[type="email"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }
        .edit-form input[type="submit"] {
            width: 100%;
            background-color: red;
            color: white;
            padding: 14px;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .edit-form input[type="submit"]:hover {
            background-color: darkred;
        }
        
    </style>
</head>
<body>

<header>
    <nav class="navbar">
        <div class="logo">Online Library</div>
        <ul class="nav-links">
            <li><a href="../index1.php">Home</a></li>
            <li><a href="../books1.php" class="active">Manage Books</a></li>
            <li><a href="../loans1.php">Loans</a></li>
            <li><a href="../members1.php" >Members</a></li>
            
        </ul>
    </nav>
</header>

<div class="container">
    <h1>Edit Book</h1>

    <form method="POST" action="edit_book.php" class="edit-form">
        <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($row['book_id']); ?>">
        <h4> Book Title</h4>

        <input type="text" name="title" placeholder="Book Title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
        <h4> Author</h4>

        <input type="text" name="author" placeholder="Author" value="<?php echo htmlspecialchars($row['author']); ?>" required>
        <h4> Genre</h4>

        <input type="text" name="genre" placeholder="Genre" value="<?php echo htmlspecialchars($row['genre']); ?>">
        <h3> Published Year</h4>

        <input type="number" name="published_year" placeholder="Published Year" value="<?php echo htmlspecialchars($row['published_year']); ?>">
        <br>
        <br>
        <h4> Copies Available</h4>

        <input type="number" name="copies_available" placeholder="Copies Available" value="<?php echo htmlspecialchars($row['copies_available']); ?>">
        <br>
        <br>

        <input type="submit" name="update" value="Update Book">
    </form>
</div>



</body>
</html>
<?php } ?>