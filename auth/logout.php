<?php
session_start();

// Include the database connection file
include '../conn.php';  // Ensure this path is correct to include the conn.php file

// Create a new database connection instance
$db = new conn();  // Instantiate the connection class

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Update the user's status to 'offline' in the database
    $user_id = $_SESSION['user_id'];
    $update_status_sql = "UPDATE tbl_users SET status = 'offline' WHERE id = :id";
    $update_status_stmt = $db->conn->prepare($update_status_sql);  // Use the $db object to access the connection
    $update_status_stmt->execute([':id' => $user_id]);

    // Destroy session to log the user out
    session_destroy();
}

// Redirect to the login page
header('Location: ../index.php');  // Adjust the path as needed
exit();
?>
