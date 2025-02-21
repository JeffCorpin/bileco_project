<?php
// header.php
?>
<!-- FontAwesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="icon" href="./assets/favicon.ico" type="image/x-icon">
<script src="https://cdn.tailwindcss.com"></script>
<header class="bg-[#ffdb19] text-white py-2">
    <div class="container mx-auto px-4 flex flex-col items-center md:flex-row md:justify-between text-center">
        <div class="privacy-links md:space-x-4 mb-2 md:mb-0 text-black text-sm">
            <a href="<?php echo BASE_URL; ?>user/privacy.php" class="hover:underline">Privacy Policy</a>
            <a href="<?php echo BASE_URL; ?>user/bids.php" class="hover:underline">Bids & Awards</a>
        </div>
        <div class="social-header flex flex-wrap justify-center space-x-4 text-black">
            <a href="https://facebook.com" target="_blank" class="hover:text-blue-600 inline-flex items-center">
                <i class="fab fa-facebook-f w-5 h-5 mr-1"></i>
                
            </a>
            <a href="https://twitter.com" target="_blank" class="hover:text-blue-400 inline-flex items-center">
                <i class="fab fa-twitter w-5 h-5 mr-1"></i>
                
            </a>
            <a href="mailto:your-email@example.com" class="hover:text-pink-600 inline-flex items-center">
                <i class="fas fa-envelope w-5 h-5 mr-1"></i>
            
            </a>
            <a href="https://linkedin.com" target="_blank" class="hover:text-blue-700 inline-flex items-center">
                <i class="fab fa-linkedin w-5 h-5 mr-1"></i>
                
            </a>
            <a href="https://youtube.com" target="_blank" class="hover:text-red-600 inline-flex items-center">
                <i class="fab fa-youtube w-5 h-5 mr-1"></i>
                
            </a>
        </div>
    </div>
</header>
<?php
// end of header.php
?>
