
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
                <p class="text-justify leading-6">The <strong>Guidelines on the Conduct of District Elections for Electric Cooperatives (Election Code for brevity)</strong> framed pursuant to Republic Act No. 10531 and its Implementing Rules and Regulations incorporates the new qualifications and disqualifications of an EC Director or Officer.  </p>
                <p class="text-justify">Article II, Section 7 of the said Code states that a candidate’s integrity, experience, education, competence and probity shall be considered in determining whether he/she shall be fit and proper as a Director or an officer of the EC.</p>                   
              <br>     
                <h6 class="underline font-bold">QUALIFICATIONS OF A BOARD OF DIRECTOR AND AN OFFICER</h6>          
                    <strong><p class="text-justify leading-10">1. He or she is a Filipino citizen;</p>
                    <p class="text-justify leading-8">2. He or she is a graduate of a four (4)-year course;</p>
                    <p class="text-justify leading-8">3. He or she should be between twenty-one (21) years old and seventy (70) years old on the date of election;</p>
                    <p class="text-justify leading-8">4. He or she is of good moral character; which may be established with the submission of a clearance or certificate from any of the foIIowing:</p>
                    </strong>
                    <ul class="pl-4 text-justify">
            <li>4.1 Barangay where the candidate resides;</li>
            <li>4.2 National Bureau of Investigation;</li>
            <li>4.3 Philippine National Police; or</li>
            <li>4.4 Leader of the religious sect where the candidate is affiliated</li>
        </ul>
                    <p class="font-bold text-justify leading-8">5. He or she is a member of the EC in good standing for the last five (5) years immediately preceding the election or appointment and shall continue to be a member In good standing during his or her Incumbency;  </p>           
                    <p class="text-justify leading-8">For purpose of this IRR, a member of good standing shall mean that said member has no unsettled or outstanding obligations to the EC whether personal or through commercial or industrial connections of which he or she is the owner or co-owner three months prior to the filing of the certificate of candidacy. Provided, that for incumbent members of the EC Board who will seek re-election, unsettled or outstanding obligation shall be deemed to include power bills, cash advances, disallowances (including NEA audit findings) and materials and equipment issuances reckoned from the time of filing of certificate of candidacy. (Amended thru DOE Department Circular No. DC2014-09-0017)</p>
                    <p class="text-justify leading-8"><strong>6. Has not been apprehended for electric pilferage;</strong></p>
                    <p class="text-justify leading-8">A mere apprehension of electric pilferage by the EC, even without conviction for such offense by any court, shall constitute a valid ground for disqualification. The word “apprehension” should be taken in the strict context as used in Republic Act No. 7832, otherwise known as “Anti-Electricity and Electric Transmission Lines or Materials Pilferage Act of 1994”, which means that a person is caught in flagrante delicto for violating the provision of the said Act.</p>
                    <p class="text-justify leading-8"><strong>7. Has not been removed for cause as director or an employee from any EC;</strong></p>
                    <p class="text-justify leading-8">In general, removal or termination of service from the EC is caused by a grave offense or violatlon/s of policies, rules and regulations. A former director or employee with a record of termination/removal for cause from public office or for just cause as defined in Article 282 of the Labor Code as amended, shall not be qualified to be elected or appointed as director of an EC.</p>
                    <p class="text-justify leading-8"><strong>8. He or she is an actual resident and member-consumer in the district that he or she seeks to represent for at least two (2) years immediately preceding the election; and</strong></p>
                    <p class="text-justify leading-8"><strong>9. He or she has attended at least two (2) Annual General Membership Assemblies (AGMA) for the last five (5) years immediately preceding the election or appointment.</strong></p>
                    <p class="text-justify leading-8"><strong>10. He or she participated the district election at least once in the last five years preceding the election.</strong></p>
                    <p class="text-justify leading-8"><strong>11.  For a qualified government employee, he/she must present a written Certification from his/her Department Secretary/Regional Director/Local Chief Executive or his duly authorized representative allowing him/her to run and sit as director at the time of his/her filing of Certificate of Candidacy;</strong></p>
                    <p class="text-justify leading-8"><strong>12.  An EC Director or Officer, in order to remain as such, must continue to possess all the qualifications and none of the disqualifications throughout his/her term or tenure of office. To this end, no EC Director shall be allowed to stay in a holdover capacity If he/she fails to meet all the qualifications or is deemed disqualified. Provided, that for the purposes of this section, members of the EC Board shall be deemed to have no unsettled or outstanding obligation including power bills, cash advances, disallowances (including NEA audit findings) and materials and equipment issuances: Provided further, that at any given time during his membership in the EC, he or she must be totally free of any unsettled or outstanding obligations and/or disallowances with the EC.</strong>(Amended thru DOE Department Circular No. DC2014-09-0017)</p>
                    <br>       
                <h6 class="font-bold">DISQUALIFICATIONS OF A BOARD OF DIRECTOR AND AN OFFICER</h6>
                    <p class="text-justify leading-6">Article II, Section 8 of the Election Code states that any person shall be ineligible to be elected or be appointed as member of the Board of Directors or officers of an EC if:</p>
                    <p class="text-justify"><strong>1.  Such person or his or her spouse holds any public office.</strong> For the purpose of disqualification, a person holding an elective position or an appointive position with a salary grade of sixteen (SG 16) or higher or its equivalent shall not be eligible to be elected as member of the Board of Directors or Officers of an EC;</p>
                    <p class="text-justify"><strong>2.  Such person or his or her spouse has been a candidate in the last preceding local or national elections;</strong></p>
                    <p class="text-justify"><strong>3.  Such person has been convicted by final judgment of a crime involving moral turpitude;</strong></p>
                    <p class="text-justify"><strong>4. Such person has been terminated from public office/government employment or private employment for just cause as defined in Article 282 of the Labor Code.</strong></p>
                    <p class="text-justify">For this purpose, termination from public office shall mean removal;</p>
                    <p class="text-justify"><strong>5.  Such person is related within the fourth civil degree of consanguinity or affinity to any member of the EC Board of Directors, General Manager, Department Manager, NEA-appointed Project Supervisor (PS) or Acting General Manager (AGM) and its equivalent or higher position;</strong></p>
                    <p class="text-justify"><strong>6.  Such person is employed by or has financial interest in a competing enterprise or a business selling electric energy or electrical hardware to the cooperative or doing business with the EC including, but not limited to, the use or rental of poles;  </strong></p>
                    <p class="text-justify">For this purpose, “doing business” shall refer to the transactions related not only to  the core or main line of business of the EC, but also those which in any way affect the management and operation of the EC.</p>
                    <p class="text-justify"><strong> 7.  Incumbent GM and employees of electric cooperatives are not allowed to run as member of the board of another cooperative; and</strong></p>
                    <p class="text-justify"><strong>8.  The disqualification of one of the spouse shall mean the disqualification of the other.</strong></p>
        </ol>
        </div>

        <!-- Left Sidebar Section -->
        <div class="order-2 md:order-1 w-full md:w-1/5 bg-white border-r p-6 rounded-md md:pt-20">
            <ul class="space-y-4 md:text-right font-semibold">
                <li><a href="<?php echo BASE_URL; ?>user/consumer/apply.php" class="text-black hover:text-blue-800 text-sm">Apply for New Connection</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/rights.php" class="text-black hover:text-blue-800 text-sm">Rights and Obligations</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/billing.php" class="text-black hover:text-blue-800 text-sm">Billing Information</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/consumer/qualification.php" class="text-blue-800 hover:text-blue-800 text-sm">Qualifications of EC Board</a></li>
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
