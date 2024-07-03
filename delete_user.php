<?php
include 'db.php'; 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];
    

    $sql = "DELETE FROM user WHERE id = $user_id";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to index.php
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    echo "Invalid user ID";
}

$conn->close();
?>
