<?php include('php/db.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Books - Online Library</title>
    <link rel="stylesheet" href="css/sty.css">
</head>
<body class="bg-image">

    <header>
        
        <nav class="navbar">
            <div class="logo">Online Library</div>
            <ul class="nav-links">
                <li><a href="index1.php">Home</a></li>
                <li><a href="books1.php" class="active">Manage Books</a></li>
                <li><a href="loans1.php">Loans</a></li>
                <li><a href="members1.php">Members</a></li>
             
                
            </ul>
        </nav>
    </header>

    <section class="manage-books">
        <div class="container">
            <h1>Manage Books</h1>

            
            <form method="POST" action="php/add_book.php" class="book-form">
                <input type="text" name="title" placeholder="Book Title" required>
                <input type="text" name="author" placeholder="Author" required>
                <input type="text" name="genre" placeholder="Genre" required>
                <input type="number" name="year" placeholder="Published Year" required>
                <input type="number" name="copies" placeholder="Copies Available" required>
                <input type="submit" value="Add Book" class="btn">
            </form>

            <hr>

            
            <h2>Available Books</h2>
            <div class="book-list">
                <?php
                $query = "SELECT * FROM Books";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='book-item'>
                                <strong>" . htmlspecialchars($row['title']) . "<br>
                                Book_Id: " . htmlspecialchars($row['book_id'])   ."</strong> by " . htmlspecialchars($row['author']) . " (" . htmlspecialchars($row['published_year']) . ")
                                <div class='book-actions'>
                                    <a href='php/edit_book.php?id=" . $row['book_id'] . "' class='edit-btn'>Edit</a>
                                   
                                </div>
                            </div>";
                    }
                } else {
                    echo "<p>No books available.</p>";
                }
                ?>
            </div>
        </div>
    </section>

</body>
</html>
