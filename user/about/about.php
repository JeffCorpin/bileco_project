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
        <img src="https://minenergy.uz/uploads/fd957abc-f5ab-0d3e-3c04-f693f222379e_news_.jpg" alt="Header Image" class="w-full h-64 object-cover rounded-md ">  
    </div>

    <div class="container mx-auto py-6 flex flex-col md:flex-row md:space-x-4">

        <!-- Main Content Section -->
        <div class="order-1 md:order-2 w-full md:w-3/5 bg-white p-6 rounded-md">
            <h2 class="text-3xl font-bold text-[#87CEEB] mb-4">ABOUT US</h2>
            <hr class="border-t-4 border-b-4 border-[ffdb19] mt-1 mb-8">
            <ol class="list-decimal pl-5 text-gray-700 space-y-3">
            <p class="text-gray-500 text-justify ">Biliran Electric Cooperative, Inc. (BILECO) was organized as non-stock, nonprofit electric cooperative pursuant to Presidential Decree No. 269. Its Articles of Incorporation was signed on July 6, 1973 by Mr. Clemencio T. Sabitsana, Dr. Eduardo V. Bertulfo, Mr. Gregorio A. Bacale, Mr. Victorio C. Gler, Mr. Francisco G. Uyvico, Mr. Maximo Salloman & Judge Bonifacio V. Curso. Its franchise area is comprised of seven districts, namely: Almeria, Biliran, Cabucgayan, Caibiran, Culaba, Kawayan and Naval. Its main office is situated in Brgy. Caraycaray, Naval, Biliran.</p>  

<p class="mt-4"><strong>Purpose</strong></p>  
<p class="text-gray-500 text-justify py-3 s"> Electric cooperatives, such as BILECO, were organized and incorporated for the purpose of supplying, and of promoting and encouraging the fullest use of, service on an area coverage basis at the lowest cost consistent with sound economy and the prudent management of the business of such corporations."</p>  

<p class="mt-4"><strong>Powers</strong></p>  
 <ol class="list-decimal pl-6 space-y-4 text-gray-500 text-justify">
<p class="text-gray-500 text-justify space-y-3">BILECO is hereby vested with all powers necessary or convenient for the accomplishment of its corporate purpose and capable of being delegated by the President or the National Assembly when it comes into existence; and no enumeration of particular powers hereby granted shall be construed to impair any general grant of power herein contained, nor to limit any such grant to a power or powers of the same class as those so enumerated. Such powers shall include, but not be limited to, the power:</p>  

<li>To construct, acquire, own, operate and maintain electric subtransmission and distribution lines along, upon, under and across publicly owned lands and public thoroughfares, including, without limitation, all roads, highways, streets, alleys, bridges and causeways. In the event of the need of such lands and thoroughfares for the primary purpose of the government, the electric cooperative shall be properly compensated;</li>
    <li>
        To construct, acquire, own, operate and maintain generating facilities within its franchise area. In pursuance thereof, where an electric cooperative participates in a bid on an existing NPC-SPUG generating facility, its qualified bid shall be given preference in case of a tie: Provided, however, That in cases where there is no other qualified bidder, the lone bid shall remain as valid basis for the determination of the final award subject to the following conditions:
<ul class="list-disc pl-6 mt-2 space-y-2 text-justify">
<ul class="list-disc pl-6 mt-2 space-y-2 text-justify">
            <li>bid offer is not lower than the valuation of the assets using Commission on Audit (COA) rules and regulations;</li>
            <li>electric cooperative is prepared to fully take over the generation function of the area from the NPC-SPUG; and</li>
            <li>electric cooperative submits its graduation program from the Universal Charge for Missionary Electrification (UC-ME) subsidy.</li>
        </ul>
    </li>
</ol>
</ol></div>
        <!-- Left Sidebar Section -->
        <div class="order-2 md:order-1 w-full md:w-1/5 bg-white border-r p-6 rounded-md md:pt-20">
            <ul class="space-y-4 text-right font-semibold">
                <li><a href="<?php echo BASE_URL; ?>user/about/history.php" class="text-black hover:text-blue-800 text-sm">Brief History</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/vision.php" class="text-black hover:text-blue-800 text-sm">Vision, Mission, & Values</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/logo.php" class="text-black hover:text-blue-800 text-sm">Our Logo</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/board.php" class="text-black hover:text-blue-800 text-sm">The Board of Directors</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/management.php" class="text-black hover:text-blue-800 text-sm">The Management</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/franchise.php" class="text-black hover:text-blue-800 text-sm">Franchise Area</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/practices.php" class="text-black hover:text-blue-800 text-sm">Best Practices</a></li>
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