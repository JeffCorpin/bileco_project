

<?php
session_start();
include '../../conn.php';
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
    <title>Consumer</title>
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
        <h2 class="text-3xl font-bold text-[#87CEEB] mb-4">SAFETY TIPS</h2>
        <hr class="border-t-4 border-b-4 border-[ffdb19] mt-1 mb-8">
        <ol class="list-decimal pl-5 text-gray-700 space-y-3">
       
        <div x-data="{ openTip: null }" class="space-y-3">
<?php 
    $safety_tips = [
        1 => "Do not insert multiple plugs into one wall outlet or extension outlet. It can damage the electrical system in your house or even cause fire.",
        2 => "Make sure all electrical cords are tucked away neat and tidy. Pets might chew on electrical cords, and people might trip and fall.",
        3 => "Do not ever climb nor touch the perimeter fence around an electrical substation.",
        4 => "Do not yank an electrical cord plugged on an outlet. Pulling off a cord can damage the appliance, the plug or the outlet.",
        5 => "Fly your kite away from power lines or substations. The kite and the string may conduct electricity sending it right through you to the ground.",
        6 => "Never allow an aluminum television antenna to come in contact with an overhead power line.",
        7 => "If you see a fallen power line or structure, stay away from it as far as possible and report the matter immediately to BILECO.",
        8 => "Do not hang or dry your washed clothes on service drop wires because it may cause power interruption and poses danger of electrocution.",
        9 => "Check your electrical cords regularly for frays, cracks or kinks and replace them immediately if damaged.",
        10 => "Do not touch safety switch nor plug appliances in electrical outlets with wet hands.",
        11 => "Beware of skinned service drop wire and DO NOT ever attempt to touch it out of curiosity.",
        12 => "Be sure that all electrical outlets have safety covers, especially if children are present.",
        13 => "Teach children to respect electricity and remember that water and electricity do not mix."
    ];

    foreach ($safety_tips as $tip_number => $tip) { // No need to add +1 here
?>
<div class="border-b border-gray-300 rounded-lg shadow-sm bg-gray-100">
 <!-- Clickable Header -->
 <div @click="openTip = openTip === <?php echo $tip_number; ?> ? null : <?php echo $tip_number; ?>"
         class="cursor-pointer p-4 flex items-center justify-between font-semibold">
        <span :class="openTip === <?php echo $tip_number; ?> ? 'text-green-600' : 'text-blue-600'">
            <span x-text="openTip === <?php echo $tip_number; ?> ? '−' : '+'"></span>
            Safety Tip No. <?php echo $tip_number; ?>
        </span>
    </div>

    <!-- Smooth Transition Content -->
    <div x-show="openTip === <?php echo $tip_number; ?>" 
         x-transition:enter="transition ease-out duration-[1200]"
         x-transition:enter-start="opacity-0 transform translate-y-6"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in-out duration-900"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-3"
         class="p-4 text-gray-700 bg-white border-t border-gray-200">
        <?php echo $tip; ?>
    </div>
</div>

              
        <?php } ?>
    </div>

    </div>
        
        <!-- Left Sidebar Section -->
        <div class="order-2 md:order-1 w-full md:w-1/5 bg-white border-r p-6 rounded-md md:pt-20">
            <ul class="space-y-4 text-right font-semibold">
                <li><a href="<?php echo BASE_URL; ?>user/consumer/apply.php" class="text-black hover:text-blue-800 text-sm">Apply for New Connection</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/rights.php" class="text-black hover:text-blue-800 text-sm">Rights and Obligations</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/billing.php" class="text-black hover:text-blue-800 text-sm">Billing Information</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/qualification.php" class="text-black hover:text-blue-800 text-sm">Qualifications of EC Board</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/senior.php" class="text-black hover:text-blue-800 text-sm">Senior Citizen Discount</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/maintenance.php" class="text-black hover:text-blue-800 text-sm">Maintenance Schedule</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/power.php" class="text-black hover:text-blue-800 text-sm">Power Rates</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/generation.php" class="text-black hover:text-blue-800 text-sm">Generation Mix</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/safety.php" class="text-blue-800 hover:text-blue-800 text-sm">Safety Tips</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/tipid.php" class="text-black hover:text-blue-800 text-sm">Tipid Tips</a></li>
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
