
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
            <h2 class="text-3xl font-bold text-[#87CEEB] mb-4">BILLING INFORMATION</h2>
            <hr class="border-t-4 border-b-4 border-[ffdb19] mt-1 mb-8">
            <ol class="list-decimal pl-5 text-gray-700 space-y-3">
                <h5 class="font-bold">READING CYCLE</h5>           
                <p class="text-justify">BILECO, like other electric distribution utilities, maintains a Billing Cycle with the objective to provide accurate and timely billing of kilowatt-hour consumed by its member-consumers. BILECO implements the read and bill scheme following the schedule below:</p>             
                <h6>All Connection Type except BAPA and Big Load Customers</h6>           
                <p>– Reading Period is 11 days which starts every 20th of the month. The Reading is done simultaneously in all districts.</p>                    
                <p>– on the 26th of the month</p>
          <br>
           <h6 class="font-bold">BAPA</h6>
                <p>– on the 18th of the month</p>         
                <h6>READING & BILLING PROCESS</h6>           
                <p class="text-justify">The Reading/Billing Verifier downloads the list of member-consumers per route to the PSION (a meter reading gadget) on a daily basis throughout the 11-day Reading Period. Then the Meter Readers read the kilowatt-hour meters, print the power bill and distribute it right away to the consumers. At the end of the day, the read data is uploaded and generated to the system. A proof list by route is printed where necessary adjustments are made for accounts with abrupt increase/decrease in consumption either due to erroneous reading, stop meter, defective meter, unused meter or house connection with no occupant and other similar causes. Accounts with erroneous reading or with issues on the reading, shall be adjusted and subsequently distributed a new bill. Upon receipt of bill, the consumers may now pay their electric bill to any payment centers or outlets.</p>          
                <br>
            <h6 class="font-bold">DUE DATE, PENALTY & DISCONNECTION</h6>
                <p class="text-justify">The Cooperative maintains a policy on the payment of electric bill by the member-consumers. The consumers are encouraged to pay their bills on or before the due date equivalent to 10 days after the receipt of the statement of account. Failure to pay on time results to incurrence of additional charges or even disconnection. General Assembly Resolution No. 2010-02 provides a 3% penalty charge for the late payment of power bills. The General Assembly Resolution No. 2014-01, provides a five-day lapse before the actual conduct of disconnection. A corresponding notice of disconnection is served to the consumers, and within 48 hours after the receipt of the notice, a disconnection of electric service will follow.</p>
                <br>
            <h6 class="font-bold">KNOW YOUR BILL</h6>           
                <p>Your Billing Statement contains the following information:</p>
                <ul class="list-disc pl-8 text-justify">
            <li>Account Number</li>
            <li>Account Name</li>
            <li>Meter Serial Number</li>
            <li>Billing Period</li>
            <li>Present and Previous Readings</li>
            <li>Kwhr Consumption</li>
            <li>Basic Rates and Other Charges</li>
            <li>Total Current Bill</li>
            <li>Due Date</li>
            <li>Surcharge after Due Date</li>
            <li>Total Amount after Due Date</li>
            <li>Disconnection Date</li>
        </ul>
            <br>
            <h6 class="font-bold">A CLOSER LOOK AT THE BILL COMPONENTS</h6>            
                <p class="text-justify">BILECO’s rate is composed of nine components, the Generation Charge, Transmission Charge, System Loss Charge, Distribution Charge, Reinvestment Fund for Sustainable CAPEX, Universal Charge, Lifeline Rate (Discount)/Subsidy, Senior Citizen’s (Discount)/Subsidy and the VAT charges.</p>
                <p class="text-justify">Said components are further classified into three categories: the Pass through cost, Fix rate and the other cost.</p>
                <p class="text-justify"><strong>Pass through</strong> costs are fees paid to companies who operate and maintain the electricity network from generation down to transmission. As the name suggests, “any amount billed to the distribution utility shall be passed on to the member-consumers without any additions or reductions”. Said costs primarily drove the fluctuating price of power every month. The two major components of these costs are the generation and transmission charges.</p>
                <p class="text-justify">Generation charge covers the cost of power generated and sold to the distribution company by generation companies. This rate shall depend on the source of the power generated (i.e. hydroelectric power, coal, geothermal, etc.). It covers roughly 45% of our monthly power rate which means that any increase or decrease would considerably contribute to the monthly fluctuations. Transmission charge is the cost for the delivery of electricity from generation companies to the electric distribution companies. At present, the operator of the transmission infrastructure is the National Grid Corporation of the Philippines (NGCP).</p>
                <p class="text-justify">On the other hand, some of the power rate components does not vary every month otherwise known as <strong>“Fix rate”</strong>. These rates will not change unless any approval from ERC shall be issued. An example of this rate is BILECO’s Distribution charge, comprised of the distribution, supply and metering charges.</p>
                <p class="text-justify">This covers the cost of transporting electricity through the distribution network directly to the end-users. Said cost covers the ECs cost of building, operating and maintaining the distribution system and conveying of power to the customers. Also in the fix rate category is the Reinvestment Fund for Sustainable CAPEX. This cost shoulders the capital projects of the distribution company for the purpose of rehabilitation, upgrading, expansion and the requirement under the provision of Magna Carta for Residential Electricity Consumers.
                    Universal charge pertains to the cost imposed on all electricity end-users as determined, fixed and approved by the ERC, pursuant to Section 34 of the EPIRA. It is remitted to the Power Sector Assets and Liabilities Management Corporation (PSALM), a government-owned and controlled corporation created by RA 9136. This includes the missionary electrification, environmental charges and REDCI.</p>
                <p class="text-justify">The last category of power charges is the <strong>Other Charges</strong>. The amount of these costs varies every month depending on the base amount like the Value Added Tax-Distribution, Systems Loss Charge, Lifeline (Discount)/Subsidy and the Senior Citizen’s (Discount)/Subsidy.
                    These combined charges form a Single Stand Rate commonly known as Effective Rate which varies every month.</p>
            
            </ol>
        </div>

         <!-- Left Sidebar Section -->
         <div class="order-2 md:order-1 w-full md:w-1/5 bg-white border-r p-6 rounded-md md:pt-20">
            <ul class="space-y-4 md:text-right  font-semibold">
                <li><a href="<?php echo BASE_URL; ?>user/consumer/apply.php" class="text-black hover:text-blue-800 text-sm">Apply for New Connection</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/rights.php" class="text-black hover:text-blue-800 text-sm">Rights and Obligations</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/billing.php" class="text-blue-800 hover:text-blue-800 text-sm">Billing Information</a></li>
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
    </div>
    <?php
    include '../../components/links.php';
    include '../../components/footer.php';
    ?>
</body>
</html>
