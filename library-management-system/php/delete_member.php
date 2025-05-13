<?php
include('db.php');

$member_id = $_GET['id'];

if (is_numeric($member_id)) {
    // Step 1: Check if member has any unreturned books
    $stmt = $conn->prepare("SELECT COUNT(*) FROM Loans WHERE member_id = ? AND returned = 0");
    $stmt->bind_param("i", $member_id);
    $stmt->execute();
    $stmt->bind_result($unreturned_count);
    $stmt->fetch();
    $stmt->close();

    if ($unreturned_count == 0) {
        // Step 2: Delete loans (all returned ones)
        $stmt = $conn->prepare("DELETE FROM Loans WHERE member_id = ?");
        $stmt->bind_param("i", $member_id);
        $stmt->execute();
        $stmt->close();

        // Step 3: Delete the member
        $stmt = $conn->prepare("DELETE FROM Members WHERE member_id = ?");
        $stmt->bind_param("i", $member_id);
        $stmt->execute();
        $stmt->close();

      
         echo "Member deleted.";
    } else {
        
        echo "Cannot delete. Member has unreturned books.";
    }
}

$conn->close();
header("Location: ../members1.php");
exit();
?>
