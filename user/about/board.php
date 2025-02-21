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
            <h2 class="text-2xl font-bold text-[#87CEEB] mb-4">THE BOARD OF DIRECTORS</h2>
            <hr class="border-t-4 border-b-4 border-[ffdb19] mt-1 mb-8">
            <ol class="list-decimal pl-5 text-gray-700 space-y-3">
            
            <div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Card 1 -->
        <div class="text-center">
            <img src="<?php echo BASE_URL; ?>assets/images/about/Dir.Caridad.png" alt="Wilberto B. Caridad" class="w-35 h-40 mx-auto rounded-lg">
            <h2 class="text-lg font-bold mt-2 text-blue-700">DIR. WILBERTO B. CARIDAD</h2>
            <p class="text-sm text-gray-600">Board President<br>Kawayan District Representative</p>
        </div>

        <!-- Card 2 -->
        <div class="text-center">
            <img src="<?php echo BASE_URL; ?>assets/images/about/Dir.Cordeta.png" alt="Cesar D. Cordeta" class="w-35 h-40 mx-auto rounded-lg">
            <h2 class="text-lg font-bold mt-2 text-blue-700">DIR. CESAR D. CORDETA</h2>
            <p class="text-sm text-gray-600">Vice-President<br>Cabucgayan District Representative</p>
        </div>

        <!-- Card 3 -->
        <div class="text-center">
            <img src="<?php echo BASE_URL; ?>assets/images/about/Dir.Jornales.png" alt="Salvacion C. Jornales" class="w-35 h-40 mx-auto rounded-lg">
            <h2 class="text-lg font-bold mt-2 text-blue-700">DIR. SALVACION C. JORNALES</h2>
            <p class="text-sm text-gray-600">Secretary<br>Biliran District Representative</p>
        </div>

        <!-- Card 4 -->
        <div class="text-center">
            <img src="<?php echo BASE_URL; ?>assets/images/about/Dir.Avila.png" alt="Juan R. Avila Jr." class="w-35 h-40 mx-auto rounded-lg">
            <h2 class="text-lg font-bold mt-2 text-blue-700">DIR. JUAN R. AVILA JR.</h2>
            <p class="text-sm text-gray-600">Member<br>Caibiran District Representative</p>
        </div>

        <!-- Card 5 -->
        <div class="text-center">
            <img src="<?php echo BASE_URL; ?>assets/images/about/Dir.Caneja.png" alt="Milagros O. Caneja" class="w-35 h-40 mx-auto rounded-lg">
            <h2 class="text-lg font-bold mt-2 text-blue-700">DIR. MILAGROS O. CANEJA</h2>
            <p class="text-sm text-gray-600">Member<br>Naval District Representative</p>
        </div>

        <!-- Card 6 -->
        <div class="text-center">
            <img src="<?php echo BASE_URL; ?>assets/images/about/Dir.Mecaydor.png" alt="Pastor M. Mecaydor" class="w-35 h-40 mx-auto rounded-lg">
            <h2 class="text-lg font-bold mt-2 text-blue-700">DIR. PASTOR M. MECAYDOR</h2>
            <p class="text-sm text-gray-600">Member<br>Almeria District Representative</p>
        </div>

                <!-- Card 7 -->
                <div class="text-center">
            <img src="<?php echo BASE_URL; ?>assets/images/about/Dir.Devio.png" alt="Rodolfo S. Devio" class="w-35 h-40 mx-auto rounded-lg">
            <h2 class="text-lg font-bold mt-2 text-blue-700">DIR. RODOLFO S. DEVIO</h2>
            <p class="text-sm text-gray-600">Member<br>Culaba District</>
        </div>

        <!-- Card 8 -->
        <div class="text-center">
            <img src="<?php echo BASE_URL; ?>assets/images/about/GM.png" alt="Gerardo N. Oledan" class="w-35 h-40 mx-auto rounded-lg">
            <h2 class="text-lg font-bold mt-2 text-blue-700">ENGR. GERARDO N. OLEDAN</h2>
            <p class="text-sm text-gray-600">Genral Member<br>Ex-Officio Member</>
        </div>
    </div>
</div>

</ol></div>
        <!-- Left Sidebar Section -->
        <div class="order-2 md:order-1 w-full md:w-1/5 bg-white border-r p-6 rounded-md md:pt-20">
            <ul class="space-y-4 text-right font-semibold">
                <li><a href="<?php echo BASE_URL; ?>user/about/history.php" class="text-black hover:text-blue-800 text-sm">Brief History</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/vision.php" class="text-black hover:text-blue-800 text-sm">Vision, Mission, & Values</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/logo.php" class="text-black hover:text-blue-800 text-sm">Our Logo</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/board.php" class="text-blue-800 hover:text-blue-800 text-sm">The Board of Directors</a></li>
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