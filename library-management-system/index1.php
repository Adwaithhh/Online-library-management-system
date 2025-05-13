<?php include('php/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Library</title>
    <link rel="stylesheet" href="css/sty.css">
</head>
<body>

    <header>
       
        <nav class="navbar">
            <div class="logo">Online Library</div>
            <ul class="nav-links">
                <li><a href="index1.php" class="active">Home</a></li>
                <li><a href="books1.php">Manage Books</a></li>
                <li><a href="loans1.php">Loans</a></li>
                <li><a href="members1.php">Members</a></li>
               
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>WELCOME TO THE <span>ONLINE LIBRARY</span></h1>
            <p>Your one-stop solution for managing books, members, and loans with ease.</p>

            <form method="GET" action="index1.php" class="search-form">
                <input type="text" name="search" placeholder="Search for a book/Author" required>
                <input type="submit" value="Search">
            </form>

            <?php
            if (isset($_GET['search'])) {
                $keyword = $_GET['search'];
                $query = "SELECT * FROM Books WHERE title LIKE '%$keyword%' OR author LIKE '%$keyword%'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='search-results'>";
                    echo "<h2>Search Results:</h2>";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<p><strong>" . htmlspecialchars($row['title']) . "</strong> by " . htmlspecialchars($row['author']) ."</strong> Book_ID: ". htmlspecialchars($row['book_id']) . "</p>";
                    }
                    echo "</div>";
                } else {
                    echo "<div class='search-results'><p>No results found❌</p></div>";
                }
            }
            ?>
        </div>
    </section>
</body>
</html>
