<?php
include('db.php');

if (isset($_POST['update'])) {
    $member_id = $_POST['member_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $query = "UPDATE Members SET 
                name='$name', 
                email='$email', 
                phone='$phone' 
              WHERE member_id=$member_id";

    mysqli_query($conn, $query);
    header("Location: ../members1.php");
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM Members WHERE member_id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
<?php

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
            <li><a href="../books1.php">Manage Books</a></li>
            <li><a href="../loans1.php">Loans</a></li>
            <li><a href="../members1.php" class="active">Members</a></li>
            
        </ul>
    </nav>
</header>

<div class="container">
    <h1>Edit Member</h1>

    <form method="POST" action="edit_member.php" class="edit-form">
        <input type="hidden" name="member_id" value="<?php echo htmlspecialchars($row['member_id']); ?>">

        <input type="text" name="name" placeholder="Member Name" value="<?php echo htmlspecialchars($row['name']); ?>" required>

        <input type="email" name="email" placeholder="Email Address" value="<?php echo htmlspecialchars($row['email']); ?>" required>

        <input type="text" name="phone" placeholder="Phone Number" value="<?php echo htmlspecialchars($row['phone']); ?>">

        <input type="submit" name="update" value="Update Member">
    </form>
</div>



</body>
</html>
<?php } ?>
