<?php
include("conn.php");
// Start the session
session_start();

// Instantiate the database connection class
$database = new conn();
$conn = $database->conn; // Get the PDO connection

// Default user status
$user_status = 'offline';
$user_name = 'Guest'; // Default name
$user_role = 'Guest'; // Default role

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user details (status, name, role) from the database using PDO
    $query = "SELECT status, firstname, middlename, lastname, role FROM tbl_users WHERE id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $user_status = $user['status'] ?: 'offline';
        $user_name = ucfirst($user['firstname']) . ' ' . ucfirst($user['middlename']) . ' ' . ucfirst($user['lastname']);
        // Capitalize first letter
        $user_role = $user['role'];

        // Store role in session
        $_SESSION['role'] = $user_role;

        // Redirect based on role
        if ($user_role === 'admin') {
            $redirectUrl = "admin/index.php";
        } else {
            $redirectUrl = "index.php";
        }
    } else {
        $redirectUrl = "index.php"; // Redirect if user not found
    }
} else {
    $redirectUrl = "index.php"; // Default for guests
}

// Delay before redirecting
header("Refresh: 4; url=$redirectUrl");

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// Get a random image from the 'files' directory
$files = glob('files/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
$bgImage = !empty($files) ? $files[array_rand($files)] : 'assets/images/logo.jpg'; // Fallback image
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind CSS -->
</head>
<style>
        
        @font-face {
          font-family: 'Roaster Brush';
          src: url('assets/font/RoasterBrush.woff2') format('woff2'), /* Best for web */
               url('assets/font/RoasterBrush.woff') format('woff'),
               url('assets/font/RoasterBrush.ttf') format('truetype'),
               url('assets/font/RoasterBrush.otf') format('opentype');
          font-weight: normal;
          font-style: normal;
        }
      
        .font-roaster {
          font-family: 'Roaster Brush', sans-serif;
        }
      </style>
      
<body class="flex items-center justify-center h-screen bg-cover bg-center bg-[#002D62]">

    <div class="w-96 h-60 flex flex-col items-center justify-center bg-opacity-10 backdrop-blur-lg p-6 text-center animate-fade-in">
        <img src="assets/images/logos/logo.png" alt="Logo" class="animate-pulse"> <!-- Replace with your actual logo -->
        <p class="mt-4 text-lg text-white font-semibold animate-blink">Please wait, loading the site...</p>
        <p class="text-3xl mt-2 text-[#ffbf00] whitespace-nowrap font-medium font-roaster pt-8">We Serve Because We Care</p> <!-- Added caption -->
    </div>

    <!-- Display user welcome message -->
    <p class="absolute bottom-5 text-white text-sm">
        Welcome Back <?php echo ($user_role === 'admin') ? 'Admin' : $user_name; ?>
    </p>

    <!-- Animations -->
    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        .animate-fade-in {
            animation: fade-in 1.5s ease-in-out;
        }

        @keyframes blink {
            from { opacity: 1; }
            to { opacity: 0.5; }
        }
        .animate-blink {
            animation: blink 1.5s infinite alternate;
        }
    </style>

</body>
</html>
