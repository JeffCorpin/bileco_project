<?php
http_response_code(403);
include '../conn.php';
include '../web.php'; // Include database connection
include '../components/header.php'; // Include header
?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 403 - Forbidden</title>


<section class="bg-white dark:bg-gray-900">
    <div class="container flex items-center min-h-screen px-6 py-12 mx-auto">
        <div class="flex flex-col items-center max-w-sm mx-auto text-center">
            <!-- Error Icon -->
            <p class="p-3 text-sm font-medium text-red-500 rounded-full bg-red-50 dark:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
            </p>

            <!-- Error Message -->
            <h1 class="mt-3 text-2xl font-semibold text-gray-800 dark:text-white md:text-3xl">Access Denied</h1>
            <p class="mt-4 text-gray-500 dark:text-gray-400">
                You do not have permission to access this page.
            </p>

            <!-- Buttons -->
            <div class="flex items-center w-full mt-6 gap-x-3 shrink-0 sm:w-auto">
                <!-- Go Back Button -->
                <button onclick="history.back()" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 rtl:rotate-180">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>
                    <span>Go Back</span>
                </button>

                <!-- Take Me Home Button -->
                <a href="<?php echo BASE_URL; ?>" class="w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-red-500 rounded-lg shrink-0 sm:w-auto hover:bg-red-600 dark:hover:bg-red-500 dark:bg-red-600">
                    Take Me Home
                </a>
            </div>
        </div>
    </div>
</section>

<?php include '../components/footer.php'; ?> <!-- Include footer -->
