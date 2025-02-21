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
            <h2 class="text-2xl font-bold text-[#87CEEB] mb-4">VISION, MISSION & CORE VALUES</h2>
            <hr class="border-t-4 border-b-4 border-[ffdb19] mt-1 mb-8">
            <ol class="list-decimal pl-5 text-gray-700 space-y-3">
            
<p class="text-2xl font-bold text-sky-600 mb-4"><strong>Vision</strong></p> 
<ol class="list-decimal pl-6 space-y-4 text-blue-700 "></ol> 
<p class="text-gray-700 text-justify py-3 s pt-2"> An electric distribution utility recognized as a hallmark of excellence by providing premium customer satisfaction by 2030."</p>  

<p class="text-2xl font-bold text-sky-600 col-span-1"><strong>Mission</strong></p>  
 <ol class="text-gray-700 text-justify col-span-3 ">
<p class="text-gray-700 text-justify">To provide reliable, safe, quality and efficient electric service for a developed and progressive Biliran province.</p>  

<p class="text-2xl font-bold text-sky-600 mt-6 mb-4"><strong>Core Values</strong></p>  
 <ol class="text-gray-700 text-justify col-span-3 ">
<p class="text-gray-700 text-justify">As an organization which aims to create customers for life, we imbibe and abide by our seven core values which are essential in promoting a positive, innovative and harmonious working environment that supports the company’s objectives. Its acronym is</p> 
<span class="font-bold">GoDHEART.</span>  

<div class="space-y-4 mt-8">
        <!-- Example Core Values (You Can Fetch This from Database) -->
        <?php
        $values = [
            "GODLINESS" => "We acknowledge God as the source of our existence and the source of all power and strength.",
            "DISCIPLINE" => "We abide by the policies and rules and observe propriety in dealing with internal and external customers.",
            "HONESTY" => "We believe that truthfulness and honesty can make the best relationships because it leads to trust and confidence.",
            "EXCELLENCE" => "We strive to provide quality services and continue raising the bar of excellence in all areas of our operation.",
            "ACCOUNTABILITY" => "We take full responsibility in our actions and decisions.",
            "RESPECT" => "We share equal respect to all our associates, peers, stakeholders, and member-consumers.",
            "TEAMWORK" => "We work together as one to achieve our common vision."
        ];

        foreach ($values as $key => $value) {
            echo "
                <div class='flex items-start space-x-10'>
                    <strong class='text-gray-700 py-2 font-bold w-1/4 text-right'>$key</strong>
                    <p class='ml-4 text-gray-700 text-justify w-3/4'>$value</p>
                </div>
                   ";
        }
        ?>
</ol>
</ol></div>
        <!-- Left Sidebar Section -->
        <div class="order-2 md:order-1 w-full md:w-1/5 bg-white border-r p-6 rounded-md md:pt-20">
            <ul class="space-y-4 text-right font-bold">
                <li><a href="<?php echo BASE_URL; ?>user/about/history.php" class="text-black hover:text-blue-800 text-sm">Brief History</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/vision.php" class="text-blue-800 hover:text-blue-800 text-sm">Vision, Mission, & Values</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/logo.php" class="text-black hover:text-blue-800 text-sm">Our Logo</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/board.php" class="text-black hover:text-blue-800 text-sm">The Board of Directors</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/management.php" class="text-black hover:text-blue-800 text-sm">The Management</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/franchise.php" class="text-black hover:text-blue-800 text-sm">Franchise Area</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/practices.php" class="text-black hover:text-blue-800 text-sm">Best Practices</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/awards.php" class="text-black hover:text-blue-800 text-sm">Awards & Citations</a></li>
                <li><a href="<?php echo BASE_URL; ?>user/about/power.php" class="text-black hover:text-blue-800 text-sm">Power Sources</a></li>
            </ul>
        </div>s

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