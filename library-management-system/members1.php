<?php include('php/db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Members - Online Library</title>
    <link rel="stylesheet" href="css/sty.css"> 
</head>

<body class="bg-image">

    
    <header>
        <nav class="navbar">
            <div class="logo">Online Library</div>
            <ul class="nav-links">
                <li><a href="index1.php">Home</a></li>
                <li><a href="books1.php">Manage Books</a></li>
                <li><a href="loans1.php">Loans</a></li>
                <li><a href="members1.php" class="active">Members</a></li>
                
            </ul>
        </nav>
    </header>

    
    <section class="manage-members">
        <div class="container">

           
            <div class="form-card">
            <h1 class="page-title">Manage Members</h1>
                <h2>Add New Member</h2>
                <form method="POST" action="php/add_member.php" class="member-form">
                    <input type="text" name="name" placeholder="Member Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="phone" placeholder="Phone">
                    <input type="submit" value="Add Member" class="btn">
                </form>
            </div>

            <hr>

            
            <div class="list-card">
                <h2>All Members</h2>
                <?php
                $query = "SELECT * FROM Members";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='member-item'>
                                <strong>" . htmlspecialchars($row['name']) . "</strong> (" . htmlspecialchars($row['email']) . ")<br>
                                Phone: " . htmlspecialchars($row['phone']) . "<br>
                                Member_Id: " . htmlspecialchars($row['member_id']) . "
                                <div class='actions'>
                                    <a href='php/edit_member.php?id=" . $row['member_id'] . "' class='edit-btn'>Edit</a>
                                    <a href='php/delete_member.php?id=" . $row['member_id'] . "' class='delete-btn'>Delete</a>
                                </div>
                              </div>";
                    }
                } else {
                    echo "<p>No members found.</p>";
                }
                ?>
            </div>

        </div>
    </section>

</body>
</html>
