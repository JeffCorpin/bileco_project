<?php $currentPage = basename($_SERVER['REQUEST_URI']); ?>

<!-- Include Alpine.js & Tailwind CSS -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
<script src="https://cdn.tailwindcss.com"></script>

<!-- Side Navbar -->
<div x-data="{ isOpen: false, dropdownOpen: false }" class="flex h-screen">
    <!-- Sidebar -->
    <div :class="isOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed lg:relative inset-y-0 left-0 bg-[#1a1a2e] text-white w-64 transition-transform duration-300 ease-in-out lg:translate-x-0">
        <div class="p-6 flex flex-col items-center">
            <a href="<?php echo BASE_URL; ?>">
                <img src="<?php echo BASE_URL; ?>assets/images/logos/logos.png" alt="Bileco Logo" class="w-auto h-12 max-w-full">
            </a>
            <!-- Added Image -->
             
            

<!-- FontAwesome Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

        </div>
        <div class="flex items-center bg-[#1a1a2e] text-white p-4 rounded-lg w-70">
    <img src="/mnt/data/Screenshot%202025-02-20%20150414.png" alt="User Image" class="w-12 h-12 rounded-full mr-4">
    <div class="flex-1">
        <h2 class="text-lg font-semibold">Bileco</h2>
        <p class="text-gray-400 text-sm">Admin</p>
    </div>
    <button class="text-gray-400 hover:text-white">
        <i class="fas fa-ellipsis-v"></i>
    </button>
</div>
        <hr class="border-white">
        <nav class="p-4 space-y-4">
            <a href="index.php" class="block px-4 py-2 text-lg hover:bg-gray-700">Home</a>
           
            <a href="dashboard.php" class="block px-4 py-2 text-lg hover:bg-gray-700">Dashboard</a>
            <a href="addnews.php" class="block px-4 py-2 text-lg hover:bg-gray-700">News & Events</a>
            <hr class="border-white-200">
            <a href="<?php echo BASE_URL; ?>auth/logout.php" class="block px-4 py-2 text-lg hover:bg-gray-700">Logout</a>
        </nav>
    </div>
    
    <!-- Main Content -->
    <div class="flex-1 bg-black flex flex-col fixed">
        <!-- Top Bar -->
        <div class=" text-white p-4 flex justify-between items-center lg:hidden">
            <button @click="isOpen = !isOpen" class="text-[13274F] text-2xl focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</div>

<!-- FontAwesome Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
