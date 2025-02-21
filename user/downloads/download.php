<?php
session_start();
include '../../conn.php'; // Include the database connection class
include '../../components/header.php';

// Instantiate the database connection class
$database = new conn();
$conn = $database->conn; // Get the PDO connection

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user status from the database using PDO
    $query = "SELECT status FROM tbl_users WHERE id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user_status = $stmt->fetchColumn(); // Fetch only the status column

} else {
    $user_status = 'offline'; // Default status for guests
}

// Display the appropriate navbar
if ($user_status === 'online') {
    include '../../components/navbar-u.php';
} else {
    include '../../components/navbar.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Downloads</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
 <?php
        echo '<div class="header-image w-full h-[250px] overflow-hidden">';
        echo '<img src="' . 'https://static.vecteezy.com/system/resources/previews/037/145/251/non_2x/soft-focus-of-light-bulb-in-market-shop-with-walking-street-free-photo.jpg' . '" alt="Bridge" class="w-full h-full object-cover" />';
        echo '</div>';
    ?>
<body class="bg-white">

    <div class="container mx-auto py-6 flex flex-col md:flex-row md:space-x-4">
        <!-- Main Content Section -->
        <div class="order-1 md:order-2 w-full md:w-3/5 bg-white p-6 rounded-md">
    <h2 class="text-2xl font-bold text-[#87CEEB] mb-4">NEWSLETTERS</h2>
    <hr class="border-t-4 border-b-4 border-[#ffdb19] mt-1 mb-8">
    <ul class="list-disc pl-5 space-y-2 text-gray-700">
        <li><a href="newsletters/2017-newsletter.pdf" class="text-gray-700 no-underline hover:text-blue-500">2017 Newsletter</a></li>
        <li><a href="newsletters/2016-newsletter.pdf" class="text-gray-700 no-underline hover:text-blue-500">2016 Newsletter</a></li>
        <li><a href="newsletters/2014-newsletter.pdf" class="text-gray-700 no-underline hover:text-blue-500">2014 Newsletter</a></li>
    </ul>
</div>


        <!-- Left Sidebar Section -->
        <div class="order-2 md:order-1 w-full md:w-1/5 bg-white border-r p-6 rounded-md md:pt-20">
            <ul class="space-y-4 md:text-right font-semibold">
                <li><a href="<?php echo BASE_URL; ?>user/downloads/download.php" class="text-black hover:text-blue-800 text-sm">Newsletter</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/downloads/annual.php" class="text-black hover:text-blue-800 text-sm">Annual Reports</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/downloads/membership.php" class="text-black hover:text-blue-800 text-sm">Membership Master List</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/downloads/forms.php" class="text-black hover:text-blue-800 text-sm">Forms</a></li>
                </ul>
            </div>

        <!-- Right Sidebar Section -->
        <div class="order-3 md:order-3 w-full md:w-1/5 bg-white p-6 rounded-md border-l">
            <div class="search-box mb-6">
                <input type="text" placeholder="Search" class="w-full px-4 py-2 border rounded-md focus:outline-none">
            </div>

            <h2 class="text-xl font-semibold text-black border-l-4 pl-2 border-blue-500 mb-4">Categories</h2>
            <ul class="space-y-2">
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">Announcements</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">Bids & Awards</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">CSR Programs</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">Generation Mix</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">Maintenance Schedule</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">National Stories</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">News & Events</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">Power Rate</a></li>
                <hr>
                <li><a href="#" class="text-black hover:text-blue-800 text-sm">Uncategorized</a></li>
                <hr>
            </ul>

            <h2 class="text-xl font-semibold text-gray-800 border-l-4 pl-2 border-blue-500 mt-8 mb-4">Archives</h2>
            <ul>
                <!-- Add archive links here -->
            </ul>
        </div>

    </div>
    <?php
    include '../../components/links.php';
    include '../../components/footer.php';
    ?>
</body>
</html>
