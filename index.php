<?php
session_start();
include 'conn.php'; // Include the database connection class
include 'components/header.php';

// Instantiate the database connection class
$database = new conn();
$conn = $database->conn; // Get the PDO connection

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user status and role from the database using PDO
    $query = "SELECT status, role FROM tbl_users WHERE id = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch associative array

    if ($user) {
        $user_status = $user['status'];
        $user_role = $user['role'];

        // Redirect admin users to the admin dashboard
        if ($user_role === 'admin') {
            header("Location: admin/index.php");
            exit(); // Ensure the script stops execution after redirection
        }
    } else {
        $user_status = 'offline'; // Default status for guests
    }
} else {
    $user_status = 'offline'; // Default status for guests
}

// Display the appropriate navbar
if ($user_status === 'online') {
    include 'components/navbar-u.php';
} else {
    include 'components/navbar.php';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BILECO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <style>
        
  @font-face {
    font-family: 'Roaster Brush';
    src: url('assets/font/RoasterBrush.woff2') format('woff2'), /* Best for web */
         url('assets/font/RoasterBrush.woff') format('woff'),
         url('assets/font/RoasterBrush.ttf') format('truetype'),
         url('assets/font/RoasterBrush.otf') format('opentype');
    font-weight: normal;
    font-style: normal;
  }

  .font-roaster {
    font-family: 'Roaster Brush', sans-serif;
  }
  
        .progress-bar {
            width: 0; /* Start from 0% */
            transition: width 2s ease-in-out; /* Smooth animation */
        }
        @keyframes fillBar {
            from { width: 0%; }
            to { width: 100%; }
        }

</style>




</head>
<body class="bg-white font-sans">
    
<!-- Swiper Background Section -->
<section class="relative w-full h-[50vh] md:h-[70vh] lg:h-96 border-b-2 border-white">
    <!-- Swiper Container (Background Images) -->
    <div class="swiper-container h-full absolute inset-0 z-0">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="assets/images/backgrounds/1.jpg" alt="Slide 1" class="w-full h-full object-cover">
            </div>
            <div class="swiper-slide">
                <img src="assets/images/backgrounds/2.jpg" alt="Slide 2" class="w-full h-full object-cover">
            </div>
            <div class="swiper-slide">
                <img src="assets/images/backgrounds/3.jpg" alt="Slide 3" class="w-full h-full object-cover">
            </div>
            <div class="swiper-slide">
                <img src="assets/images/backgrounds/4.jpg" alt="Slide 4" class="w-full h-full object-cover">
            </div>
            <div class="swiper-slide">
                <img src="assets/images/backgrounds/5.jpg" alt="Slide 5" class="w-full h-full object-cover">
            </div>
        </div>
    </div>

    <!-- Overlay Content -->
    <div class="absolute inset-0 z-10 bg-[#002244] bg-opacity-60 flex justify-center items-center text-white px-4 md:px-8">
        <div class="relative flex flex-col md:flex-row items-center justify-between mx-auto w-full" style="max-width: 85rem;">
            <!-- Left Side -->
            <div class="text-center md:text-left md:w-3/5">
                <h1 class="text-center text-lg md:text-2xl lg:text-3xl font-bold uppercase">Biliran Electric Cooperative, Inc.</h1>
                <h2 class="text-center text-sm md:text-lg mt-1 md:mt-2">Brgy. Caraycaray, Naval, Biliran</h2>
                <p class="text-center text-yellow-400 italic text-xl md:text-3xl lg:text-5xl mt-3 md:mt-4 font-roaster">
                    We serve, because we care.
                </p>
            </div>

            <!-- Slanted Line -->
            <div class="hidden md:flex justify-center items-center w-1/5">
                <div class="w-0.5 h-40 md:h-72 lg:h-96 bg-white transform rotate-[20deg]"></div>
            </div>

            <!-- Right Side -->
            <div class="md:w-2/5 space-y-4 md:space-y-8 mt-6 md:mt-0 text-center md:text-right">
                <div>
                    <h3 class="text-xl md:text-2xl lg:text-4xl font-thin font-roaster">Vision</h3>
                    <p class="text-xs md:text-sm lg:text-base mt-1 md:mt-2">
                        An electric distribution utility recognized as a hallmark of excellence by providing premium customer satisfaction by 2030.
                    </p>
                </div>
                <div>
                    <h3 class="text-xl md:text-2xl lg:text-4xl font-thin font-roaster">Mission</h3>
                    <p class="text-xs md:text-sm lg:text-base mt-1 md:mt-2">
                        To provide reliable, safe, quality, and efficient electric service for a developed and progressive Biliran Province.
                    </p>
                </div>
                <div>
                    <h3 class="text-xl md:text-2xl lg:text-4xl font-thin font-roaster">Core Values</h3>
                    <p class="text-xs md:text-sm lg:text-base mt-1 md:mt-2">
                        Godliness | Discipline | Honesty | Excellence | Accountability | Respect | Teamwork
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="relative w-full h-auto md:h-[75vh] flex flex-col md:flex-row border-t-4 border-white">
    <!-- Image Section (Left) with Fading Effect -->
    <div class="relative w-full md:w-3/5 h-64 md:h-full">
        <img src="assets/images/backgrounds/electric.png" alt="Electrician at work"
            class="w-full h-full object-cover">

        <!-- Right Fading for Desktop -->
        <div class="absolute inset-0 bg-gradient-to-l from-white/95 via-transparent hidden md:block"></div>

        <!-- Bottom Fading for Mobile -->
        <div class="absolute inset-0 bg-gradient-to-t from-white/95 via-transparent md:hidden"></div>
    </div>

    <!-- Content Section (Right) -->
    <div class="w-full md:w-2/5 p-8 flex flex-col justify-center h-auto md:h-full">
        <h2 class="text-2xl font-bold text-blue-900">Status of Electrification</h2>
        <p class="text-gray-700 mt-2 text-justify">
            <span class="text-blue-600 font-semibold text-lg">B</span>ILECO has been adamant in fulfilling its mandate on total electrification within its franchise area. Since the start of its operation in 1983, BILECO made significant progress, changing the landscape of electrification in Biliran. Energizing municipalities and barangays one after the other has been a milestone-driven journey, inspiring us to continue until the last household is powered.
        </p>
        <p class="text-gray-700 text-justify mt-4">
            With a strong commitment to missionary electrification, BILECO has successfully energized over <strong>92%</strong> of potential sitios and <strong>94%</strong> of potential house connections within its coverage area.
        </p>

        <!-- Progress Bars -->
        <div class="mt-6 space-y-4">
            <!-- Barangay Energization -->
            <div class="relative w-full bg-gray-300 rounded-full h-6 overflow-hidden">
                <div class="absolute left-0 top-0 h-full bg-[#002D62] rounded-full flex items-center justify-end px-4" style="width: 100%;">
                    <span class="text-white font-bold text-lg">100%</span>
                </div>
                <span class="absolute inset-0 flex items-center justify-center font-semibold text-gray-800">Barangay Energization</span>
            </div>

            <!-- Sitio Energization -->
            <div class="relative w-full bg-gray-300 rounded-full h-6 overflow-hidden">
                <div class="absolute left-0 top-0 h-full bg-[#002D62] rounded-full flex items-center justify-end px-4" style="width: 92%;">
                    <span class="text-white font-bold text-lg">92%</span>
                </div>
                <span class="absolute inset-0 flex items-center justify-center font-semibold text-gray-800">Sitio Energization</span>
            </div>

            <!-- House Connection -->
            <div class="relative w-full bg-gray-300 rounded-full h-6 overflow-hidden">
                <div class="absolute left-0 top-0 h-full bg-[#002D62] rounded-full flex items-center justify-end px-4" style="width: 94%;">
                    <span class="text-white font-bold text-lg">94%</span>
                </div>
                <span class="absolute inset-0 flex items-center justify-center font-semibold text-gray-800">House Connection</span>
            </div>
        </div>
    </div>
</div>



<!-- News & Sidebar Section -->
<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-5 pt-20">
    <!-- News & Events -->
    <div class="bg-[#002D62] p-4 text-white min-h-[250px]">
        <h2 class="text-lg font-bold text-yellow-500">NEWS & EVENTS</h2>
        <ul class="mt-2 space-y-2">
            <li class="border-b pb-1">
                <h3 class="font-semibold text-yellow-300 text-sm">BILECO Notice of District Elections</h3>
                <p class="text-xs">BILECO will be conducting its regular district elections...</p>
            </li>
            <li class="border-b pb-1">
                <h3 class="font-semibold text-yellow-300 text-sm">35th Annual General Membership Assembly</h3>
                <p class="text-xs">BILECO invites all member-consumer-owners...</p>
            </li>
        </ul>
    </div>
    
    <!-- Sidebar Section -->
    <div class="bg-white p-4 border border-gray-300 min-h-[250px]">
        <h2 class="text-md font-bold text-[#13274F]">NATIONAL STORIES</h2>
        <ul class="mt-2 space-y-2 text-xs">
            <li class="border-b pb-1">35th Annual General Membership Assembly (AGMA)</li>
            <li class="border-b pb-1">SEN. TULFO AND SANGGUNIANG BAYAN Recognize Effort...</li>
        </ul>
    </div>
    
    <!-- Additional Section -->
    <div class="bg-white p-4 border border-gray-300 min-h-[450px] flex flex-col items-center w-full mx-auto">
        <img src="assets/images/backgrounds/top-banner.png" alt="Top Banner" class="w-full max-w-md object-cover mb-3">

        <div class="bg-red-600 text-white p-3 rounded-md text-center w-full max-w-sm">
            <a href="user/drives.php" class="block">
                <p class="text-md font-bold">What Drives Electricity Rates to Go Up?</p>
            </a>
        </div>

        <!-- Facebook Page Plugin -->
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0"></script>
        
        <div class="fb-page mt-6" 
            data-href="https://www.facebook.com/bilecoofficial" 
            data-tabs="timeline" 
            data-width="900" 
            data-height="500" 
            data-small-header="true" 
            data-adapt-container-width="true" 
            data-hide-cover="false" 
            data-show-facepile="false">
            <blockquote cite="https://www.facebook.com/bilecoofficial" class="fb-xfbml-parse-ignore">
                <a href="https://www.facebook.com/bilecoofficial">Biliran Electric Cooperative, Inc.</a>
            </blockquote>
        </div>
    </div>
</div>

 </div>



        <div class="bg-blue-200 p-8 mt-10 h-200 pb-0">
        <div class="flex flex-col md:flex-row items-center">
            <iframe class="w-full mt-10 md:w-[900px] h-[300px] md:h-[300px]" src="https://www.youtube.com/embed/zAQL3BvPDr4?autoplay=1&mute=1&loop=1&showinfo=0&modestbranding=1" title="YouTube video player" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <div class="ml-6 flex flex-col w-3/4">
                <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Power for Progress</h2>
                <p class="text-gray-800 text-justify">
                    BILECO’s story of struggle and triumph in the landscape of rural electrification is etched in the strata of its past where bringing light to households and villages is a gargantuan and formidable task. The linemen who have been foot soldiers of BILECO since the beginning stood undaunted as they carpentered line after line even in the midst of harsh conditions. Witnessing how homes mushroomed the towns, how communities flourished one after the other and how sleepy municipalities turned into a vibrant and bustling commercial hub, manifested the vital role of electricity and electric cooperatives in rural development.
                    <br><br>
                    Today, electricity is slowly creeping on the outskirts of rural centers and outlying parts of the province. Thanks to Sitio Electrification Program for illuminating the once lifeless households and enclaves. It can be seen that electricity is the harbinger of development as it creates an environment that stimulates and accelerates economic growth.
                </p>
                </div>  
                </div>
                <div class="flex flex-nowrap justify-center -mt-10">
    <img src="assets/images/backgrounds/posts.png" alt="Descriptive Image" class="max-w-[350px] h-[250px]">
    <img src="assets/images/backgrounds/posts.png" alt="Descriptive Image" class="max-w-[390px] h-[250px]">
    <img src="assets/images/backgrounds/posts.png" alt="Descriptive Image" class="max-w-[390px] h-[250px]">
    <img src="assets/images/backgrounds/posts.png" alt="Descriptive Image" class="max-w-[390px] h-[250px]">
</div>    
        </div>
        
<?php
include 'components/links.php';
include 'components/footer.php';
?>
</body>
</html>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        effect: 'fade',
    });
</script>
