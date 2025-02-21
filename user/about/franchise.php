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
            <h2 class="text-2xl font-bold text-[#87CEEB] mb-4">FRANCISE AREA</h2>
            <hr class="border-t-4 border-b-4 border-[ffdb19] mt-1 mb-8">
            <ol class="list-decimal pl-5 text-gray-700 space-y-3">

            <img src="<?php echo BASE_URL; ?>assets/images/about/biliranmap.jpg" alt="District Map" class="mx-auto w-90 h-90">
            <p class="text-gray-700 text-justify py-3 ">"BILECO was granted authority to operate in the seven districts of the province of Biliran, namely: Biliran, Naval, Almeria, Kawayan, Cabucgayan, Caibiran and Culaba, collectively called its Franchise Area. Likewise, it operates in off-grid island barangays of Mabini and Libertad in Higatangan island under the municipality of Naval through a diesel power plant which operates for 8 hours between 3:00 to 11:00 pm. Its area coverage covers a total land area of 508.18 sq km (196.2 sq mi), comprised of 117 barangays. It achieved its 100% barangay energization on October 21, 2006 after the successful energization of the two island barangays of Mabini and Libertad in Higatangan island."</p>
           <p class="text-gray-700 text-justify py-3">Here are some quick facts about the seven districts as of December 31, 2021:</p>
   
         

<div class="container mx-auto p-6">  
  
    <table class="min-w-full border-gray-300 overflow-hidden ">  
        <thead class=" text-gray-700">  
            <tr>  
                <th class="py-3 px-10 text-left">Districts</th>  
                <th class="py-3 px-6 text-left">Land Area (sq km)</th>  
                <th class="py-3 px-6 text-left">No. of Brgys</th>  
                <th class="py-3 px-6 text-left">House Connections</th>  
            </tr>  
        </thead>  
        <tbody>  
            <?php  
            $districts = [  
                ['name' => 'Almeria', 'land_area' => 57.46, 'brgys' => 13, 'connections' => 5382],  
                ['name' => 'Biliran', 'land_area' => 70.30, 'brgys' => 11, 'connections' => 4900],  
                ['name' => 'Cabucgayan', 'land_area' => 54.19, 'brgys' => 13, 'connections' => 4397],  
                ['name' => 'Caibiran', 'land_area' => 83.55, 'brgys' => 17, 'connections' => 5933],  
                ['name' => 'Culaba', 'land_area' => 73.42, 'brgys' => 17, 'connections' => 3820],  
                ['name' => 'Kawayan', 'land_area' => 61.02, 'brgys' => 20, 'connections' => 4891],  
                ['name' => 'Naval', 'land_area' => 108.24, 'brgys' => 26, 'connections' => 14634],  
            ];  

            $totalLandArea = 0;  
            $totalBrgys = 0;  
            $totalConnections = 0;  

            foreach ($districts as $district) {  
                echo '<tr class="border-b text-gray-700">';  
                echo '<td class="py-3 px-10">' . $district['name'] . '</td>';  
                echo '<td class="py-3 px-10">' . $district['land_area'] . '</td>';  
                echo '<td class="py-3 px-10">' . $district['brgys'] . '</td>';  
                echo '<td class="py-3 px-10">' . $district['connections'] . '</td>';  
                echo '</tr>';  

                // Calculate totals  
                $totalLandArea += $district['land_area'];  
                $totalBrgys += $district['brgys'];  
                $totalConnections += $district['connections'];  
            }  
            ?>  
            <tr class="font-bold ">  
                <td class="py-3 px-10">Total</td>  
                <td class="py-3 px-10"><?php echo number_format($totalLandArea, 2); ?></td>  
                <td class="py-3 px-10"><?php echo $totalBrgys; ?></td>  
                <td class="py-3 px-10"><?php echo $totalConnections; ?></td>  
            </tr>  
        </tbody>  
    </table>  
   </div>
        </div>
        <!-- Left Sidebar Section -->
        <div class="order-2 md:order-1 w-full md:w-1/5 bg-white border-r p-6 rounded-md md:pt-20">
            <ul class="space-y-4 text-right font-bold">
                <li><a href="<?php echo BASE_URL; ?>user/about/history.php" class="text-black hover:text-blue-800 text-sm">Brief History</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/vision.php" class="text-black hover:text-blue-800 text-sm">Vision, Mission, & Values</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/logo.php" class="text-black hover:text-blue-800 text-sm">Our Logo</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/board.php" class="text-black hover:text-blue-800 text-sm">The Board of Directors</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/management.php" class="text-black hover:text-blue-800 text-sm">The Management</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/franchise.php" class="text-blue-800 hover:text-blue-800 text-sm">Franchise Area</a></li>
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