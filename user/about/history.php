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
        <img src="<?php echo BASE_URL; ?>assets/images/about/power.jpg" alt="Header Image" class="w-full h-64 object-cover rounded-md object-cover ">  
    </div>

    <div class="container mx-auto py-6 flex flex-col md:flex-row md:space-x-4">

        <!-- Main Content Section -->
        <div class="order-1 md:order-2 w-full md:w-3/5 bg-white p-6 rounded-md">
            <h2 class="text-2xl font-bold text-[#87CEEB] mb-4">BRIEF HISTORY</h2>
            <hr class="border-t-4 border-b-4 border-[ffdb19] mt-1 mb-8">
            <ol class="list-decimal pl-5 text-gray-700 space-y-3">
            <p class="text-gray-700 text-justify ">Biliran Electric Cooperative, Inc. (BILECO) was incorporated on July 6, 1973 as non-stock, nonprofit electric cooperative pursuant to Presidential Decree No. 269. It officially started its operation with the ceremonial lighting of the first bulb in the municipality of Biliran on June 17, 1983, ten years after its incorporation.</p>  
 
<p class="text-gray-700 text-justify py-3 s"> The initial capitalization for the construction of power distribution line was obtained through a loan extended by the Republic of Germany sometime in 1981 in the amount of P12,048,800.00. From then on, BILECO continued to exist consistent with its mandate and mission aligned with other electric cooperatives to hand in development to remote areas through electricity."</p>  

<p class="text-gray-700 text-justify py-2">At the start of its operation, the Coop connects power being served by LEYECO V in Ormoc City while the 69kV line of NAPOCOR or NPC from Tongonan in Ormoc to the municipality of Biliran was still under construction. The 69kV line of NPC from Lemon to Biliran and the 3.15 mVA sub-station of BILECO were energized on May 25, 1988. The following are the significant dates of BILECO electrification per municipality:</p>  

 
        <h1 class="text-xl font-bold mb-4 text-center">Energization Date per District</h1>  
        <table class="min-w-full">  
            <thead>  
                <tr class="bg-gray-200">  
                    <th class="py-2 px-4 text-left">Date</th>  
                    <th class="py-2 px-4 text-left">District</th>  
                </tr>  
            </thead>  
            <tbody>  
                <?php  
                $data = [  
                    ["June 17, 1983", "Poblacion Biliran"],  
                    ["October 16, 1983", "Poblacion Naval"],  
                    ["October 20, 1983", "Poblacion Almeria"],  
                    ["November 15, 1985", "Poblacion Kawayan"],  
                    ["July 25, 1985", "Poblacion Cabucgayan"],  
                    ["October 26, 1985", "Poblacion Caibiran"],  
                    ["December 14, 1985", "Poblacion Culaba"],  
                ];  

                foreach ($data as $row) {  
                    echo "<tr class='border-b '>";  
                    echo "<td class='py-2 px-4'>{$row[0]}</td>";  
                    echo "<td class='py-2 px-4'>{$row[1]}</td>";  
                    echo "</tr>";  
                }  
                ?>  
            </tbody>  
        </table> 
        <img src="<?php echo BASE_URL; ?>assets/images/about/AGMA.bmp" alt="District Map" class="mx-auto rounded shadow-md w-3/4"> 
        <h6 class="text-5 mb-2 text-center">The first BILECO Annual General Membership Assembly meeting.</h6> 
         <!-- Image Section -->  
         <p class="text-gray-700 text-justify py-3 s"> In early 1985, BILECO held its first regular district election in the seven districts. Those elected replaced the Interim Board who served for more than ten years since the organization and incorporation in 1973. It was also in March 1985 where the first Annual General Meeting was held in Naval, the capital town of the province."</p>   

         <p class="text-gray-700 text-justify py-3 s"> October 21, 2006 marked one of BILECO’s energization milestone after it obtained a 100% barangay energization. It concluded with the ceremonial switch-on of two island barangays of Mabini and Libertad in Higatangan Island, Naval."</p>

         <p class="text-gray-700 text-justify py-3 s">With the continued commitment to missionary electrification, BILECO has energized roughly 70% of the total potential sitios in the area coverage including Sitio Palayan in Brgy. Caucab, Almeria, the farthest sitio energized on July 12, 2009 with a total funding requirement of P2.1 million pesos."</p>

         <p class="text-gray-700 text-justify py-3 s">In November 25, 2009, BILECO held an inauguration ceremony of the new 10 mVA sub-station transformer located in San Roque, Biliran, Biliran."</p>

         <img src="<?php echo BASE_URL; ?>assets/images/about/bileco.bmp" alt="District Map" class="mx-auto rounded shadow-md w-3/4"> 
         <h6 class="text-5 mb-2 text-center">BILECO's 5 MVA sub-station</h6> 

         <p class="text-gray-700 text-justify py-3 s"> Being a proactive organization towards customer service, BILECO instituted the BILECO integrated system in 2009 to enhance customer services and operations. Likewise, it introduced an EDP-based customer service monitoring system to ascertain that all customer complaints and requests are properly addressed in accordance with approved standards. Said innovation has earned BILECO a special citation for implementing an effective and innovative Information and Communication Technology in April 27, 2012 from the National Electrification Administration (NEA)."</p>

         <p class="text-gray-700 text-justify py-3 s"> Guided by its vision, BILECO was able to achieve numerous citations and recognitions for its improved operational performance. In 2008, BILECO was elevated from Yellow to Green, the highest color code given by the NEA to electric cooperatives based on its overall performance. From 2007-2011 categorization, BILECO was recognized as A+ electric cooperative, the highest recognition to ECs under the enhanced categorization by NEA. With its insistent pursuit to progress, the coop was then awarded a Triple A (AAA) status in the 2012 categorization, the highest rank given to ECs using the Key Performance Standards."</p>

         <p class="text-gray-700 text-justify py-3 s">As of April 2023, BILECO posted a total actual house connection of 46,032 registering a total membership of 40,480. Naval, the largest of the seven districts, comprise thirty-four percent (34%) of the total house connection. BILECO is presently categorized as a LARGE electric cooperative and color coded Green with a rating of AAA based on the 2021 EC Categorization."</p>
</ol>
</ol></div>
        <!-- Left Sidebar Section -->
        <div class="order-2 md:order-1 w-full md:w-1/5 bg-white border-r p-6 rounded-md md:pt-20">
            <ul class="space-y-4 text-right font-bold">
                <li><a href="<?php echo BASE_URL; ?>user/about/history.php" class="text-blue-800 hover:text-blue-800 text-sm">Brief History</a></li>
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