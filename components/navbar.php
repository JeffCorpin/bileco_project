<?php $currentPage = basename($_SERVER['REQUEST_URI']); ?>
<?php
// Get the current file name
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<script src="https://cdn.tailwindcss.com"></script>
<nav x-data="{ isOpen: false }" class="relative bg-[#13274F] text-white sticky top-0 z-30 hidden lg:block">
    <div class="container px-6 py-3 mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="<?php echo BASE_URL; ?>">
            <img src="<?php echo BASE_URL; ?>assets/images/logos/logos.png" alt="Logo" class="w-auto h-12 max-w-full sm-h-auto">
        </a>

<!-- Desktop Menu -->
<div class="hidden lg:flex items-center justify-center space-x-6 font-bold text-[10pxs]">
<a href="<?php echo BASE_URL; ?>index.php" 
   class="relative px-3 py-2 transition-colors duration-300 
          hover:text-yellow-500 
          after:block after:content-[''] after:h-[2px] after:w-full after:bg-yellow-500 
          after:scale-x-0 after:transition-transform after:duration-300 
          after:origin-left hover:after:scale-x-100 
          <?php echo ($currentPage == 'index.php') ? 'text-yellow-500' : ''; ?>">
    HOME
</a>

<!-- About Us Dropdown -->
<div x-data="{ isOpen: false }" x-init="isOpen = <?php echo ($currentPage == 'about.php') ? 'true' : 'false'; ?>" class="relative group">
    <button @click="isOpen = !isOpen"
            :class="{'text-yellow-500': <?php echo ($currentPage == 'about.php') ? 'true' : 'false'; ?>}"
            class="relative px-3 py-2 transition-colors duration-300 hover:text-yellow-500
            after:block after:content-[''] after:h-[2px] after:w-full after:bg-yellow-500 after:scale-x-0 after:transition-transform after:duration-500 after:origin-left hover:after:scale-x-100">
        ABOUT US
    </button>
    <!-- Flyout Menu -->
    <div x-show="isOpen" x-transition:leave="transition-opacity duration-200" class="absolute left-0 mt-2 bg-white text-gray-700 rounded-lg shadow-lg w-96 p-4 hidden group-hover:block">
        <div class="grid grid-cols">
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-200">Services</a>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-200">Careers</a>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-200">Blog</a>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-200">Team</a>
        </div>
    </div>
</div>

<!-- Consumer Corner Dropdown -->
<div x-data="{ isOpen: false }" x-init="isOpen = <?php echo ($currentPage == 'consumer.php') ? 'true' : 'false'; ?>" class="relative group">
    <button @click="isOpen = !isOpen"
            :class="{'text-yellow-500': <?php echo ($currentPage == 'consumer.php') ? 'true' : 'false'; ?>}"
            class="relative px-3 py-2 transition-colors duration-300 hover:text-yellow-500
            after:block after:content-[''] after:h-[2px] after:w-full after:bg-yellow-500 after:scale-x-0 after:transition-transform after:duration-500 after:origin-left hover:after:scale-x-100">
        CONSUMER CORNER
    </button>
    <!-- Flyout Menu -->
    <div x-show="isOpen" x-transition:leave="transition-opacity duration-200" class="absolute left-0 mt-2 bg-white text-gray-700 rounded-lg shadow-lg w-96 p-4 hidden group-hover:block">
        <div class="grid grid-cols">
            <a href="<?php echo BASE_URL; ?>user/consumer/apply.php" class="block px-4 py-2 text-sm hover:bg-gray-200 <?php echo ($currentPage == 'apply.php') ? 'text-yellow-500' : ''; ?>">Apply for New Connection</a>
            <a href="<?php echo BASE_URL; ?>user/consumer/rights.php" class="block px-4 py-2 text-sm hover:bg-gray-200 <?php echo ($currentPage == 'rights.php') ? 'text-yellow-500' : ''; ?>">Rights & Obligations</a>
            <a href="<?php echo BASE_URL; ?>user/consumer/billing.php" class="block px-4 py-2 text-sm hover:bg-gray-200 <?php echo ($currentPage == 'billing.php') ? 'text-yellow-500' : ''; ?>">Billing Information</a>
            <a href="<?php echo BASE_URL; ?>user/consumer/qualification.php" class="block px-4 py-2 text-sm hover:bg-gray-200 <?php echo ($currentPage == 'qualification.php') ? 'text-yellow-500' : ''; ?>">Qualifications of EC Board</a>
            <a href="<?php echo BASE_URL; ?>user/consumer/senior.php" class="block px-4 py-2 text-sm hover:bg-gray-200 <?php echo ($currentPage == 'senior.php') ? 'text-yellow-500' : ''; ?>">Senior Citizen Discount</a>
            <a href="<?php echo BASE_URL; ?>user/consumer/maintenance.php" class="block px-4 py-2 text-sm hover:bg-gray-200 <?php echo ($currentPage == 'maintenance.php') ? 'text-yellow-500' : ''; ?>">Maintenance Schedule</a>
            <a href="<?php echo BASE_URL; ?>user/consumer/power.php" class="block px-4 py-2 text-sm hover:bg-gray-200 <?php echo ($currentPage == 'power.php') ? 'text-yellow-500' : ''; ?>">Power Rates</a>
            <a href="<?php echo BASE_URL; ?>user/consumer/generation.php" class="block px-4 py-2 text-sm hover:bg-gray-200 <?php echo ($currentPage == 'generation.php') ? 'text-yellow-500' : ''; ?>">Generation Mix</a>
            <a href="<?php echo BASE_URL; ?>user/consumer/safety.php" class="block px-4 py-2 text-sm hover:bg-gray-200 <?php echo ($currentPage == 'safety.php') ? 'text-yellow-500' : ''; ?>">Safety Tips</a>
            <a href="<?php echo BASE_URL; ?>user/consumer/tipid.php" class="block px-4 py-2 text-sm hover:bg-gray-200 <?php echo ($currentPage == 'tipid.php') ? 'text-yellow-500' : ''; ?>">Tipid Tips</a>
        </div>
    </div>
</div>



            <a href="<?php echo BASE_URL; ?>user/news.php" class="relative px-3 py-2 transition-colors duration-300 hover:text-yellow-500 after:block after:content-[''] after:h-[2px] after:w-full after:bg-yellow-500 after:scale-x-0 after:transition-transform after:duration-300 after:origin-left hover:after:scale-x-100 <?php echo ($currentPage == 'news.php') ? 'text-yellow-500' : ''; ?>">NEWS & EVENT</a>
            <a href="<?php echo BASE_URL; ?>user/downloads/download.php" class="relative px-3 py-2 transition-colors duration-300 hover:text-yellow-500 after:block after:content-[''] after:h-[2px] after:w-full after:bg-yellow-500 after:scale-x-0 after:transition-transform after:duration-300 after:origin-left hover:after:scale-x-100 <?php echo ($currentPage == 'download.php') ? 'text-yellow-500' : ''; ?>">DOWNLOADS</a>
            <a href="<?php echo BASE_URL; ?>user/contact.php" class="relative px-3 py-2 transition-colors duration-300 hover:text-yellow-500 after:block after:content-[''] after:h-[2px] after:w-full after:bg-yellow-500 after:scale-x-0 after:transition-transform after:duration-300 after:origin-left hover:after:scale-x-100 <?php echo ($currentPage == 'contact.php') ? 'text-yellow-500' : ''; ?>">CONTACT</a>
        
    <!-- Search Bar -->
    <div class="flex items-center space-x-4 ml-6 pt-2">
        <form action="#" method="GET" class="flex items-center">
            <input type="text" name="search" placeholder="Search..." class="border-b-2 border-bottom-[#ffdb19] focus:border-[#ffdb19] outline-none text-[#ffdb19] placeholder-gray-500 bg-transparent w-50">
            
            <button type="submit" class="text-white hover:text-[#ffdb19] focus:outline-none">
                <i class="fas fa-search w-10 h-4"></i> 
            </button>

            
        </form>
    </div>
</div>

<!-- Profile Section Replaced with Login and Sign Up Buttons -->
<div class="flex flex-nowrap items-center space-x-4 justify-center">

    <!-- Login Button -->
    <a href="<?php echo BASE_URL; ?>auth/login.php" class="w-full sm:w-auto px-5 py-2 bg-yellow-500 text-white rounded-md font-medium hover:bg-yellow-600 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 text-center mb-2 sm:mb-0 md:text-sm">
        LOGIN
    </a>

    <!-- Sign Up Button -->
    <a href="<?php echo BASE_URL; ?>auth/registerform.php" class="w-full sm:w-auto px-3 py-1.5 bg-transparent border border-yellow-500 text-yellow-500 rounded-md font-medium hover:bg-yellow-500 hover:text-white transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 text-center sm:ml-4">
        SIGNUP
    </a>
</div>





    </div>
</nav>


<!-- ✅ Mobile Navigation Bar (NO MENU) -->
<div class="lg:hidden sticky top-0 z-30 w-full bg-[#13274F] h-14 flex items-center px-4 z-50">
    <!-- Logo -->
    <a href="<?php echo BASE_URL; ?>" class="flex items-center">
        <img src="<?php echo BASE_URL; ?>assets/images/logos/logos.png" alt="Logo" class="w-auto h-12">
    </a>
</div>


<div class="fixed z-50 w-full max-w-md md:max-w-lg h-16 max-w-full -translate-x-1/2 bg-gray-900 backdrop-blur-lg bg-opacity-50 border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-blue-700 dark:border-blue-600 lg:hidden px-4 sm:px-8">
    <div class="grid h-full max-w-full grid-cols-7 mx-auto">
        <!-- Home -->
        <a href="<?php echo BASE_URL; ?>index.php" 
            class="inline-flex flex-col items-center justify-center px-5 rounded-s-full group">
                <i class="fas fa-home w-5 h-5 
                    <?php echo ($currentPage == 'index.php') ? 'text-white' : 'text-yellow-500'; ?> 
                    group-hover:text-[#13274F]">
                </i>
                <span class="sr-only">Home</span>  
            </a>

        <!-- About Us -->
        <a href="<?php echo BASE_URL; ?>about.php" class="inline-flex flex-col items-center justify-center px-5 rounded-s-full  group">
            <i class="fas fa-users w-5 h-5 <?php echo ($currentPage == 'about.php.php') ? 'text-white' : 'text-yellow-500'; ?> 
              group-hover:text-[#13274F]"></i>
            <span class="sr-only">About Us</span>
        </a>

        <!-- Consumer Corner -->
        <a href="<?php echo BASE_URL; ?>user/consumer/apply.php" class="inline-flex flex-col items-center justify-center px-5  group">
            <i class="fas fa-list w-5 h-5 <?php echo ($currentPage == 'apply.php') ? 'text-white' : 'text-yellow-500'; ?> 
            group-hover:text-[#13274F]"></i>
            <span class="sr-only">Consumer</span>
        </a>

        <!-- Center Search Button -->
        <div class="flex items-center justify-center">
            <button class="inline-flex items-center justify-center w-10 h-10 font-medium bg-[#ffdb19] rounded-full hover:bg-[#13274F] focus:ring-4 focus:ring-[#13274F] focus:outline-none">
                <i class="fas fa-search w-10 h-4 text-[#13274F] hover:text-yellow-500"></i> 
                <span class="sr-only">Search</span>
            </button>
        </div>

        <!-- News -->
        <a href="<?php echo BASE_URL; ?>user/news.php" class="inline-flex flex-col items-center justify-center px-5  group">
            <i class="fas fa-newspaper w-5 h-5 text-yellow-500 group-hover:text-[#13274F]"></i>
            <span class="sr-only">News</span>
        </a>

        <!-- Downloads -->
        <a href="<?php echo BASE_URL; ?>user/news.php" class="inline-flex flex-col items-center justify-center px-5  group">
            <i class="fas fa-download w-5 h-5 text-yellow-500 group-hover:text-[#13274F]"></i>
            <span class="sr-only">Downloads</span>
        </a>

        <!-- Contact -->
        <a href="<?php echo BASE_URL; ?>user/contact.php" class="inline-flex flex-col items-center justify-center px-5 rounded-e-full  group">
            <i class="fas fa-envelope w-5 h-5 text-yellow-500 group-hover:text-[#13274F]"></i>
            <span class="sr-only">Contact</span>
        </a>

    </div>
</div>


<hr class="border-b-2 border-white mt-0 mb-0">

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<!-- Add Font Awesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

