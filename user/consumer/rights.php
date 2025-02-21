
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
        echo '<img src="' . 'https://senderoconsulting.com/wp-content/uploads/2024/03/AdobeStock_327676918-scaled.jpeg' . '" alt="Bridge" class="w-full h-full object-cover" />';
        echo '</div>';
    ?>
<body class="bg-white">

    <div class="container mx-auto py-6 flex flex-col md:flex-row md:space-x-4">
        <!-- Main Content Section -->
        <div class="order-1 md:order-2 w-full md:w-3/5 bg-white p-6 rounded-md">
            <h2 class="text-3xl font-bold text-[#87CEEB] mb-4">CONSUMER RIGHTS AND OBLIGATIONS under the Magna Carta for Residential Electricity Consumers</h2>
            <hr class="border-t-4 border-b-4 border-[ffdb19] mt-1 mb-8">
            <ol class="list-decimal pl-5 text-gray-700 space-y-3">
            <p class="font-bold">Basic Rights</p>
                    <ul class="list-disc pl-8 space-y-2">
                        <li>To have quality, reliable, affordable, safe, and regular supply of electric power;</li>
                        <li>To be accorded courteous, prompt and non-discriminatory service by the electric service provider;</li>
                        <li>To be given a transparent, non discriminatory and reasonable price of electricity consistent with the provision of RA 9136;</li>
                        <li>To be an informed electric consumer and given and given adequate access to information on matters affecting the electric service of the consumer concerned;</li>
                        <li>To be accorded prompt and speedy resolution of complaints by both the distribution utility and/or the ERC;</li>
                        <li>To know and choose the electric service retailer upon implementation of retail competition; and</li>
                        <li>To organize themselves as a consumer organization in the franchise area where they belong and where they are served by the distribution utility or as a network of organizations.</li>
                    </ul>
                <br>
                <p class="font-bold">Basic Obligations</p>
                <ul class="list-disc pl-8 space-y-2">
                    <li>To observe the terms of his contract including among others things, paying monthly bills promptly and honestly;</li>
                    <li>To allow the faithful and accurate recording of consumption to be reflected in the appropriate device;</li>
                    <li>To allow the utility’s employee/representative entry/access to his premises for the purpose provided for in Article 29 hereof;</li>
                    <li>To take proper care of metering or other equipment that the electric utility has install in the his premises;</li>
                    <li>To inform the distribution utility and/or proper authorities of any theft or pilferage of electricity or any damage caused by any person to the electric meter and equipment appurtenant thereto; and</li>
                    <li>To cooperate with and support program on the wise and efficient use of electricity.</li>
                </ul>
                <br>
                <p class="font-bold">Consumer Rights</p>
                <ul class="list-disc pl-8 space-y-2">
                    <li>Right to electric service;</li>
                    <li>Right to a refund of bill deposits;</li>
                    <li>Exemption from payment of meter deposits;</li>
                    <li>Right to an accurate electric watt-hour meter; determination of average error;</li>
                    <li>Right to refund of over-billings;</li>
                    <li>Right to a properly installed meter;</li>
                    <li>Right to a meter testing by electric utility and/or ERC;</li>
                    <li>Right to a prompt investigation of complaints; customer dealings;</li>
                    <li>Right to extension of line and facilities;</li>
                    <li>Right to information; scheduled power interruptions;</li>
                    <li>Right to a transparent billing;</li>
                    <li>Right to a monthly electricity bill;</li>
                    <li>Right to due process prior to disconnection of electric service;</li>
                    <li>Right to a notice prior to disconnection;</li>
                    <li>Right to suspension of disconnection;</li>
                    <li>Right to tender payment at the point of disconnection; deposit representing the differential billing;</li>
                    <li>Right to electric service despite arrearages of previous tenant;</li>
                    <li>Right to reconnection of electric service;</li>
                    <li>Right to witness apprehension;</li>
                    <li>Right to ERC testing of apprehended meter;</li>
                    <li>Right to payment under protest; and</li>
                    <li>Right to file complaints before ERC.</li>
                </ul>
                <br>
                <p class="font-bold">Consumer Obligations</p>
                <ul class="list-disc pl-8 space-y-2">
                    <li>Obligation to pay bill deposit;</li>
                    <li>Obligation to allow inspection, installation and removal of electricity apparatus;</li>
                    <li>Obligation to allow the construction of poles, lines and circuits;</li>
                    <li>Obligation to receive monthly bills;</li>
                    <li>Obligation to pay monthly electric bills;</li>
                    <li>Obligation to pay billing adjustments;</li>
                    <li>Obligation not to commit illegal use of electricity; and</li>
                    <li>Obligation to pay differential billing.</li>
                </ul>
                </ol>
        </div>

         <!-- Left Sidebar Section -->
         <div class="order-2 md:order-1 w-full md:w-1/5 bg-white border-r p-6 rounded-md md:pt-20">
            <ul class="space-y-4 md:text-right font-semibold">
                <li><a href="<?php echo BASE_URL; ?>user/consumer/apply.php" class="text-black hover:text-blue-800 text-sm">Apply for New Connection</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/rights.php" class="text-blue-800 hover:text-blue-800 text-sm">Rights and Obligations</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/billing.php" class="text-black hover:text-blue-800 text-sm">Billing Information</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/qualification.php" class="text-black hover:text-blue-800 text-sm">Qualifications of EC Board</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/senior.php" class="text-black hover:text-blue-800 text-sm">Senior Citizen Discount</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/maintenance.php" class="text-black hover:text-blue-800 text-sm">Maintenance Schedule</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/power.php" class="text-black hover:text-blue-800 text-sm">Power Rates</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/generation.php" class="text-black hover:text-blue-800 text-sm">Generation Mix</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/safety.php" class="text-black hover:text-blue-800 text-sm">Safety Tips</a></li>
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
