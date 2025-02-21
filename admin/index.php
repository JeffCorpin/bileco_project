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
$database = new conn();
$conn = $database->conn;

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT role FROM tbl_users WHERE id = :user_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user_role = $stmt->fetchColumn();

if ($user_role !== 'admin') {
    header("Location: ../index.php");
    exit();
}
?>


<title>Admin Panel</title>
<div class="flex">
    <?php include 'navbar-a.php'; ?>
    <div class="flex-1 p-6">
        
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 ">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">Good Afternoon, <span class="text-black">Admin</span></h1>
        
        <input type="date" class="border p-2 rounded" value="<?php echo date('Y-m-d'); ?>">
    </div>
    <p class="pb-5">Your performance summary this week</p>
    
    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded shadow-md">
            <p class="text-gray-600">Bounce Rate</p>
            <p class="text-2xl font-bold">32.53% <span class="text-red-500">↓ -0.5%</span></p>
        </div>
        <div class="bg-white p-4 rounded shadow-md">
            <p class="text-gray-600">Page Views</p>
            <p class="text-2xl font-bold">7,682 <span class="text-green-500">↑ +0.1%</span></p>
        </div>
        <div class="bg-white p-4 rounded shadow-md">
            <p class="text-gray-600">New Sessions</p>
            <p class="text-2xl font-bold">68.8 <span class="text-red-500">↓ 68.8</span></p>
        </div>
        <div class="bg-white p-4 rounded shadow-md">
            <p class="text-gray-600">Avg. Time on Site</p>
            <p class="text-2xl font-bold">2m:35s <span class="text-green-500">↑ +0.8%</span></p>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold">Performance Line Chart</h2>
        <p class="text-gray-500">Lorem Ipsum is simply dummy text of the printing</p>
        <canvas id="lineChart"></canvas>
    </div>
    
    <div class="grid grid-cols-3 gap-4 mt-6">
        <div class="bg-blue-600 text-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold">Status Summary</h2>
            <p class="text-2xl">Closed Value: 357</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center">
            <p class="text-xl">Total Visitors</p>
            <p class="text-2xl font-bold">26.80%</p>
        </div>
        <div class="bg-yellow-400 p-6 rounded-lg shadow-md flex justify-center items-center">
            <button class="text-black font-bold">Upgrade to Pro</button>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('lineChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [{
                    label: 'This Week',
                    data: [100, 200, 300, 150, 250, 350, 200],
                    borderColor: 'blue',
                    fill: false
                }]
            }
        });
    </script>

    </div>
</div>
</body>
</html>
<?php include '../components/footer.php'; ?>
