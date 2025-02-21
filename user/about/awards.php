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
            <h2 class="text-2xl font-bold text-[#87CEEB] mb-4">AWARDS & CITATIONS</h2>
            <hr class="border-t-4 border-b-4 border-[ffdb19] mt-1 mb-8">
            <ol class="list-decimal pl-5 text-gray-700 space-y-6">
            
             <!-- Image Section -->
        <div class="bg-yellow-100 rounded-md p-4">
            <img src="<?php echo BASE_URL; ?>assets/images/about/awards-2018.png" alt="Awards and Citations" class="mx-auto rounded-lg shadow-md">
        </div>

        <!-- Year Section -->
        <h2 class="text-2xl font-semibold text-gray-500 mt-6 border-t-4 bg-yellow-400">2018</h2>

        <!-- Description Section -->
        <ul class="list-none pl-5 mt-4 space-y-8 text-gray-500 gap-20">
            <li>Golden Dagitab Award for being Triple A (AAA) Category EC.</li>
            <li>Golden Dagitab Award for being a Member of the Best Region (Region 8).</li>
            <li>Golden Dagitab Award for Succesful Implementation of the Rural Electrification Program.</li>
            <li>Paramount Achievement Award as Triple A (AAA) Category EC.</li>
            <li>Circle of Excellence Award (Region 8)</li>
            <li>Special Citation for its NEA-EC-MCO Solidarity Dance Video production</li>
        </ul>

        <h2 class="text-2xl font-semibold text-gray-500 mt-6 border-t-4 bg-yellow-400">2017</h2>
        
        <ul class="list-none pl-5 mt-4 space-y-8 text-gray-500 gap-20">
            <li>Top Performing Electric Cooperative (Category AAA)</li>
            <li>Most Improved EC Award</li>
            <li>EC Resiliency Award</li>
            <li>Best in Collection Performance</li>
            <li>Most Improved Region (Region 8)</li>
        </ul>

        <h2 class="text-2xl font-semibold text-gray-500 mt-6 border-t-4 bg-yellow-500">2016</h2>

        <!-- Description Section -->
        <ul class="list-none pl-5 mt-4 space-y-8 text-gray-500 gap-20">
            <li>Special Citation for EC with the Highest Level of Household Connection</li>
            <li>Appreciation for BILECOs Commitment to Promote the Spirit of Volunteerism through its Participation in the Task Force Kapatid Typhoon Lawin and Task Force Kapatid Typhoon Nina.</li>
        </ul>

        <h2 class="text-2xl font-semibold text-gray-500 mt-6 border-t-4 bg-yellow-500">2015</h2>
        
        <ul class="list-none pl-5 mt-4 space-y-8 text-gray-500 gap-20">
            <li>Awarded Certificates of Compliance by the Department of Labor and Employment (DOLE) on General Labor Standards (GLS), Occupational Safety & Health (OSH) and Labor Relations</li>
        </ul>

        <h2 class="text-2xl font-semibold text-gray-500 mt-6 border-t-4 bg-yellow-500">2012</h2>
        
        <ul class="list-none pl-5 mt-4 space-y-8 text-gray-500 gap-20">
            <li>Special Award for being a Triple A (AAA) Electric Cooperative</li>
        </ul>

        <h2 class="text-2xl font-semibold text-gray-500 mt-6 border-t-4 bg-yellow-500">2011</h2>
        
        <ul class="list-none pl-5 mt-4 space-y-8 text-gray-500 gap-20">
            <li>Special Award for being a Category A+ Electric Cooperative</li>
            <li>Special Citation for Valuable Contribution to the Attainment of the 1,520 P-Noy Sitio Energization</li>
            <li>Special Citation for Implementing an Effective and Innovative Information & Communication Technology</li>
        </ul>

        <h2 class="text-2xl font-semibold text-gray-500 mt-6 border-t-4 bg-yellow-500">2010</h2>
        
        <ul class="list-none pl-5 mt-4 space-y-8 text-gray-500 gap-20">
            <li>Special Award for being a Category A+ Electric Cooperative</li>
            <li>Special Citation for its Excellent Rating in the Scorecard on Electric Cooperative Governance</li>
        </ul>

        <h2 class="text-2xl font-semibold text-gray-500 mt-6 border-t-4 bg-yellow-500">2009</h2>
        
        <ul class="list-none pl-5 mt-4 space-y-8 text-gray-500 gap-20">
            <li>Special Award for being a Category A+ Electric Cooperative</li>
        </ul>

        <h2 class="text-2xl font-semibold text-gray-500 mt-6 border-t-4 bg-yellow-500">2008</h2>
        
        <ul class="list-none pl-5 mt-4 space-y-8 text-gray-500 gap-20">
            <li>Special Award for being a Category A+ Electric Cooperative</li>
        </ul>

        <h2 class="text-2xl font-semibold text-gray-500 mt-6 border-t-4 bg-yellow-500">2007</h2>
        
        <ul class="list-none pl-5 mt-4 space-y-8 text-gray-500 gap-20">
            <li>Commendation for being a Consistent Prompt Payor to the National Power Corporation</li>
            <li>Best in Collection Performance Award</li>
        </ul>

        <h2 class="text-2xl font-semibold text-gray-500 mt-6 border-t-4 bg-yellow-500">2006</h2>
        
        <ul class="list-none pl-5 mt-4 space-y-8 text-gray-500 gap-20">
            <li>Best in Collection Performance Award</li>
        </ul>
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
                <li><a href="<?php echo BASE_URL; ?>user/about/practices.php" class="text-black hover:text-blue-800 text-sm">Best Practices</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/awards.php" class="text-blue-800 hover:text-blue-800 text-sm">Awards & Citations</a></li>
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