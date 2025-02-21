
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
            <h2 class="text-3xl font-bold text-[#87CEEB] mb-4">SENIOR CITIZEN DISCOUNT</h2>
            <hr class="border-t-4 border-b-4 border-[ffdb19] mt-1 mb-8">
            <ol class="list-decimal pl-5 text-gray-700 space-y-3">
            <p class="text-justify">The discount on Senior Citizens for electricity is provided for under ERC Resolution No. 23, series of 2010, “A Resolution Adopting the Rules Implementing the Discounts to Qualified Senior Citizen End-Users and Subsidy from the Subsidizing End-Users on Electricity Consumption under Sections 4 and 5 of Republic Act No. 9994” otherwise known as The Expanded Senior Citizens Act.</p>
            <br>
            <h3 class="font-bold">A. Residential Senior Citizens’ Discount</h3>    
                 
                <p>Who are qualified to apply?</p>
                <ul class="list-decimal pl-8 text-justify"> 
                <li>The monthly residential consumption must not exceed one hundred (100) kWh of electricity.</li>
                <li>The kWh meter of the residing senior citizen must have been registered in his/her name for a period of not less than one (1) year.</li>
                <li>The grant of senior citizen discount shall apply per household regardless of the number of senior citizens residing therein.</li>
                <li>The senior citizen should apply for the senior citizen discount personally to BILECO or through an authorized representative.</li>
            </ul>
            <br>
            <h3 class="font-bold">B. Senior Citizens’ Centers Discount</h3>   
                
                <p>Who are qualified to apply?</p>
                <ul class="list-decimal pl-8 text-justify">
               <li>The senior citizens centers must submit photocopy of the approved DSWD accreditation.</li>
               <li>The senior citizens centers must have been in operation for at least six (6) months and must have a separate meter for said utilities/services. </li>
            </ul>
            <br>
            <h3 class="font-bold">C. Application Process</h3> 
            
                <p>The applicant must secure an application form from the BILECO main office, and submit back the form together with the following documentary requirements: For residential senior citizens:</p>
              <p class="pl-4 mb-4">1. Proof of age and citizenship –</p>
                <ul class="pl-8 text-justify">
                <li>A. Birth certificate or any proof of birth;</li>
                <li>B. Valid Senior Citizen’s ID</li>
                <li>C. Philippine Passport or any government ID cards showing proof of age and citizenship</li> 
            </ul>
             <p class="pl-4">2. Proof of residence –</p>
                <ul class="pl-8 text-justify">
                <li>A. Barangay certificate</li>
                <li>B. Affidavit of two (2) disinterested persons duly notarized</li>
             </ul>
            <p class="pl-4">3. Proof of billing –</p>
                <ul class="pl-8 text-justify">
                <li>A. Copy of electric bill</li>
             </ul>
            <p class="pl-4">4. Proof of authority (if through representative) –</p>
                <ul class="pl-8 text-justify">
                <li>A. Valid identification card of the representative</li>
                <li>B. Authorization letter</li>
             </ul>
            <p>For senior citizen centers:</p>
                <ul class="list-decimal pl-8 text-justify">
                <li>Photocopy of approved DSWD accreditation</li>
                <li>Copy of electric bill </li>  
            </ul>
            <br>
            <h3 class="font-bold">D. How much discount is given to qualified applicants?</h3> 
           
            <p class="text-justify">For Residential Senior Citizens – 5% discount every billing period For Senior citizens centers – 50% discount every billing period</p>       
            <br>
            <h3 class="font-bold ">E. What are the consumer bill components subject to the discount?</h3>   
          

                <p>The senior citizen discount shall be applied only on the following:</p>
                <ul class="list-decimal pl-8 text-justify">
                <li>Generation</li>
                <li>Transmission</li>
                <li>Distribution, Supply and Metering</li>
                <li>System Loss</li>
                <li>Loan Condonation</li>
                <li>Lifeline Discount</li>  
                </ul> 
            <br>
            <h3 class="font-bold mt-5">F. Renewal of applications for the senior citizens discounts</h3>    
                <p>Senior citizen end-users availing of the senior citizen discount shall renew annually their applications with BILECO to ensure that they are still eligible for the said benefits and/or are still existent at the time of renewal.</p>    
               <hr>
                <div class="flex justify-center items-center pt-3">
                    <iframe class="items-center"width="560" height="315" src="https://www.youtube.com/embed/KIyI6DE1xKg?si=uwqZ3n3RD39ezPBx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </ol> 
        </div>

        
        <!-- Left Sidebar Section -->
        <div class="order-2 md:order-1 w-full md:w-1/5 bg-white border-r p-6 rounded-md md:pt-20">
            <ul class="space-y-4 md:text-right font-semibold">
                <li><a href="<?php echo BASE_URL; ?>user/consumer/apply.php" class="text-black hover:text-blue-800 text-sm">Apply for New Connection</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/rights.php" class="text-black hover:text-blue-800 text-sm">Rights and Obligations</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/billing.php" class="text-black hover:text-blue-800 text-sm">Billing Information</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/qualification.php" class="text-black hover:text-blue-800 text-sm">Qualifications of EC Board</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/senior.php" class="text-blue-800 hover:text-blue-800 text-sm">Senior Citizen Discount</a></li>
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
