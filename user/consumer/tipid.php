
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
            <h2 class="text-3xl font-bold text-[#87CEEB] mb-4">TIPID TIPS</h2>
            <hr class="border-t-4 border-b-4 border-[ffdb19] mt-1 mb-8">
            <div x-data="{ openTip: null }" class="space-y-3">
            
            <div class="grid grid-cols-1 gap-3 " x-data="{ openTip: null }">
    <?php 
        $tips = [
            "Appliances" => "Turn off appliances when not in use (i.e. computer, dvd, stereo, tv, etc). It is not enough to leave them on standby mode. We must turn it off at the main switch then unplug it.",
            "Washing Machine" => "Hang clothes outside or air dry them during fine weather. Use spin drier only when needed or during bad weather conditions and you need to dry your clothes.",
            "Electric Fan" => "Lock the oscillator if air is needed in one direction only. Clean the fan regularly.",
            "Television" => "Turn off the TV and remove the plug when not in use. Do not leave the TV on standby mode as this still consumes electricity.",
           
            "Electric Iron" =>"
            <ul class='list-disc pl-5 space-y-1'>
             <li>Iron clothes during off-peak hours (before 9:00 A.M. and after 9:00 P.M.) This helps lessen the demand for electricity during peak hours.</li>
             <li>Do all the ironing at one time, say once or twice a week. Iron thick clothes first and thin clothes last. Turn off flat iron shortly before ironing the last piece. It will stay hot just enough to finish the job.</li>
           </ul>
           ",
            "Refrigerator" => "
    <ul class='list-disc pl-5 space-y-1'>
        <li>Defrost refrigerators and freezers regularly. More than ¼ inch ice build-up in freezers puts up an extra load on the compressor motor.</li>
        <li>Choose a refrigerator with high Energy Efficiency Factor (EEF). A refrigerator with high EEF consumes less electricity as compared with one having a lower EEF.</li>
    </ul>
",
            "Aircon" => "
    <ul class='list-disc pl-5 space-y-1'>
        <li>Always keep the aircon filter and condenser unit clean.</li>
        <li>Select an aircon unit whose cooling capacity is appropriate to the size of the room you want to cool. Make sure to keep doors and windows closed where aircon is operating.</li>
        <li>Choose an air-conditioning unit with high Energy Efficiency Ratio (EER). High EER has a more efficient motor than the one with lower EER and consumes less electricity.</li>
    </ul>
",
"Light" => "
    <ul class='list-disc pl-5 space-y-1'>
        <li>Clean the fluorescent bulbs in your house regularly. Accumulated dust and dirt can decrease the illumination of light bulbs.</li>
        <li>Replace Incandescent Bulbs (IBs) with Compact Fluorescent Lamps (CFLs) or LED light bulbs.</li>
        <li>Replace fluorescent tube or starter if your light is about to burn out.</li>
    </ul>
          "
        ];
        $tip_number = 1;
        ?>
    
        <?php foreach ($tips as $title => $content): ?>
            <div class="border-b border-gray-300 rounded-lg shadow-sm bg-gray-100">
                <div @click="openTip = openTip === <?= $tip_number; ?> ? null : <?= $tip_number; ?>"
                     class="cursor-pointer p-4 flex items-center justify-between font-semibold">
                    <span :class="openTip === <?= $tip_number; ?> ? 'text-green-600' : 'text-blue-600'">
                        <span x-text="openTip === <?= $tip_number; ?> ? '−' : '+'"></span>
                        <?= $title; ?>
                    </span>
                </div>

        
                <!-- Smooth Transition Content -->
                <div x-show="openTip === <?= $tip_number; ?>" 
                     x-transition:enter="transition ease-out duration-500"
                     x-transition:enter-start="opacity-0 transform -translate-y-2 scale-95"
                     x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
                     x-transition:leave="transition ease-in duration-400"
                     x-transition:leave-start="opacity-100 transform translate-y-0 scale-100"
                     x-transition:leave-end="opacity-0 transform -translate-y-2 scale-95"
                     class="p-4 text-gray-700 bg-white border-t border-gray-200">
                    <?= $content; ?>
                </div>
            </div>
        <?php $tip_number++; endforeach; ?>
    </div>
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
                <li><a href="<?php echo BASE_URL; ?>user/consumer/safety.php" class="text-black hover:text-blue-800 text-sm">Safety Tips</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/tipid.php" class="text-blue-800 hover:text-blue-800 text-sm">Tipid Tips</a></li>
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