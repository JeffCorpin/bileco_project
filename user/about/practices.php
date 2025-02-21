<?php
include '../../conn.php';
include '../../components/header.php';
include '../../components/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

<!-- Header Image -->  
<div class="w-full">  
        <img src="<?php echo BASE_URL; ?>assets/images/about/power.jpg" alt="Header Image" class="w-full h-64 object-cover rounded-md ">  
    </div>

    <div class="container mx-auto py-6 flex flex-col md:flex-row md:space-x-4">

        <!-- Main Content Section -->
        <div class="order-1 md:order-2 w-full md:w-3/5 bg-white p-6 rounded-md">
            <h2 class="text-2xl font-bold text-[#87CEEB] mb-4">BEST PRACTICES</h2>
            <hr class="border-t-4 border-b-4 border-[ffdb19] mt-1 mb-8">
            <ol class="list-decimal pl-5 text-gray-700 space-y-3">

<!-- Numbering starts from 1 to 5 -->
<ol class="list-decimal pl-5 text-gray-500 space-y-3 text-justify">
    <li>Celebration of mass every first Friday of the month.</li>
    <li>Conduct of flag ceremony and recitation of Panatang Makabayan, and BILECO Vision, Mission and Core Values every Monday morning.</li>
    <li>Conduct of daily RQIM where the management shares information and operational updates to the employees.</li>
    <li>“Pakighimamat,” a program which aims to strengthen the relationship between the employees and the Board. A short program is prepared for the purpose where the employees can mingle and interact with the Board.</li>
    <li>Implementation of Outreach and Sponsorship Programs such as the following:
        <ul class="list-disc pl-6 mt-2 space-y-2 text-justify">
            <li>Tree Planting</li>
            <li>Coastal Cleanup</li>
            <li>Waiving of Coop fees for SEP and DOE-NIHE beneficiaries</li>
            <li>Feeding Program and distribution of school supplies to elementary schoolchildren</li>
            <li>Active participation in Brigada Eskwela</li>
            <li>Scholarship Program</li>
            <li>Handog Pamasko to less-privileged beneficiaries</li>
            <li>Hosting of Division-wide Quiz Bowl and Spelling Bee to High School students</li>
            <li>Sponsorship of Leadership Award to High School graduates</li>
        </ul>
    </li>
</ol>

<!-- Numbering continues from 6 to 14 -->
<ol class="list-decimal pl-5 text-gray-500 space-y-3 text-justify" start="6">
    <li>BILECO was the first and only Coop in Region 8 conferred with three Certificates of Compliance from the Department of Labor and Employment (DOLE) in voluntary compliance with labor laws and standards aimed at providing conducive workplace environment promoting the overall welfare of its employees. The then Secretary Rosalinda Dimapilis-Baldoz personally handed down the three COCs on General Labor Standards, Occupational Safety and Health and Labor Relations.
    </li>
    <li>Initiated enrollment of its employees who have not completed the basic education curriculum to the Alternative Learning System (ALS) of the Department of Education. The then DepEd Secretary Bro. Armin Luistro personally met with the enrollees during his visit in the province of Biliran on March 4, 2016 and commended the management for the initiative.</li>
    <li>Active participation in the Region 8 joint conduct of Competitive Selection Process for its base load power supply for the years 2019 to 2038 to ensure affordable and sufficient supply of power for the long term.</li>
    <li>Demonstrated a genuine spirit of brotherhood through constant participation as Task Force Kapatid to ECs affected by calamities. BILECO has sent linemen and vehicles to Bohol, Northern Samar, Cagayan, and Camarines Sur to assist its sister coop in the rehabilitation and restoration of power.</li>
    <li>Participation in National and Local celebrations, commemorations, and civic activities such as National Statistics Month, Women's Month Celebration, Fire Prevention Month, Labor Day, National Electrification Awareness Month, and National Greening Program, and others.
    </li>
    <li>Active participation and support during special events such as local and national elections, Eastern Visayas Athletic Meet, SCUAA Meet, Pueblo Day celebration, and local fiesta activities.
    </li>
    <li>Singing and celebrating with employees during their birthdays.</li>
    <li>Recognizing the employees family members on their academic accomplishments by hanging a banner of greetings and compliments.
    </li>
    <li>Constant coordination with LGUs and stakeholders on EC projects and activities.</li>
</ol>

</ol></div>
        <!-- Left Sidebar Section -->
        <div class="order-2 md:order-1 w-full md:w-1/5 bg-white border-r p-6 rounded-md md:pt-20">
            <ul class="space-y-4 text-right font-bold">
                <li><a href="<?php echo BASE_URL; ?>user/about/history.php" class="text-black hover:text-blue-800 text-sm">Brief History</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/vision.php" class="text-black hover:text-blue-800 text-sm">Vision, Mission, & Values</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/logo.php" class="text-black hover:text-blue-800 text-sm">Our Logo</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/board.php" class="text-black hover:text-blue-800 text-sm">The Board of Directors</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/management.php" class="text-black hover:text-blue-800 text-sm">The Management</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/franchise.php" class="text-black hover:text-blue-800 text-sm">Franchise Area</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/practices.php" class="text-blue-800 hover:text-blue-800 text-sm">Best Practices</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/awards.php" class="text-black hover:text-blue-800 text-sm">Awards & Citations</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/power.php" class="text-black hover:text-blue-800 text-sm">Power Sources</a></li>
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