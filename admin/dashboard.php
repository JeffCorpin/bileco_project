<?php
session_start();
session_regenerate_id(true); // Regenerate session ID for security

include '../conn.php'; // Include the database connection class
include '../components/header.php';

// Instantiate the database connection class
$database = new conn();
$conn = $database->conn; // Get the PDO connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect guests (not logged in) away
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user role from the database using PDO
$query = "SELECT role FROM tbl_users WHERE id = :user_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user_role = $stmt->fetchColumn(); // Fetch only the role column

// Redirect non-admin users away
if ($user_role !== 'admin') {
    header("Location: ../index.php"); // Redirect to user homepage
    exit();
}
?>

<title>Dashboard</title>
<div class="flex">
    <?php include 'navbar-a.php'; ?>
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold text-center">Welcome to the Dashboard </h1>
        <!-- Your admin content goes here -->
    </div>
</div>

<?php include '../components/footer.php'; ?>
