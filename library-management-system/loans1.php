<?php include('php/db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Borrow/Return Books - Online Library</title>
    <link rel="stylesheet" href="css/sty.css">
</head>
<body class="bg-image">

    <header>
       
        <nav class="navbar">
            <div class="logo">Online Library</div>
            <ul class="nav-links">
                <li><a href="index1.php">Home</a></li>
                <li><a href="books1.php">Manage Books</a></li>
                <li><a href="loans1.php" class="active">Loans</a></li>
                <li><a href="members1.php">Members</a></li>
               
            </ul>
        </nav>
    </header>

    <section class="manage-books">
        <div class="container">

            <h1>Borrow Book</h1>

          
            <form method="POST" action="php/borrow_book.php" class="book-form">
                <input type="number" name="book_id" placeholder="Book ID" required>
                <input type="number" name="member_id" placeholder="Member ID" required>
                <input type="submit" value="Borrow Book" class="btn">
            </form>

            <hr>

            <h1>Return Book</h1>

            
            <form method="POST" action="php/return_book.php" class="book-form">
                <input type="number" name="loan_id" placeholder="Loan ID" required>
                <input type="submit" value="Return Book" class="btn">
            </form>

            <hr>

            
            <h2>Current Loans</h2>
            <div class="book-list">
                <?php
                $query = "SELECT Loans.loan_id, Books.title, Members.name, Loans.loan_date
                          FROM Loans
                          JOIN Books ON Loans.book_id = Books.book_id
                          JOIN Members ON Loans.member_id = Members.member_id
                          WHERE Loans.returned = 0";

                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='book-item'>
                                <strong>" . htmlspecialchars($row['title']) . "</strong> borrowed by " . htmlspecialchars($row['name']) . " on " . htmlspecialchars($row['loan_date']) . "
                                <span class='loan-id'>(Loan ID: " . $row['loan_id'] . ")</span>
                            </div>";
                    }
                } else {
                    echo "<p>No active loans currently.</p>";
                }
                ?>
            </div>

        </div>
    </section>

</body>
</html>
