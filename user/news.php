<?php
session_start();
include '../conn.php'; 
include '../components/header.php';

$database = new conn();
$conn = $database->conn;

$conn = new mysqli("localhost", "root", "", "project_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the number of news items per page
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch the total count of news articles
$totalQuery = $conn->query("SELECT COUNT(*) as total FROM news");

// Check if the query executed successfully
if (!$totalQuery) {
    die("Query failed: " . $conn->error);
}
$totalResult = $totalQuery->fetch_assoc();
$totalNews = $totalResult['total'];
$totalPages = ceil($totalNews / $limit);

// Fetch news items for the current page
$newsQuery = $conn->query("SELECT * FROM news ORDER BY date DESC LIMIT $limit OFFSET $offset");
$newsList = $newsQuery->fetch_all(MYSQLI_ASSOC);

    include '../components/navbar.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News & Events</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 font-sans">
    
    <div class="header-image w-full h-[250px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1534504969382-fec3d9ffdd73?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDE4fHx8ZW58MHx8fHx8" 
             alt="Bridge" class="w-full h-full object-cover" />
    </div>

    <div class="container mx-auto py-6 flex flex-col md:flex-row md:space-x-4">
    <div class="order-1 md:order-2 w-full md:w-4/5 bg-white p-6 rounded-md">
    <h2 class="text-2xl font-bold text-[#87CEEB] mb-4">NEWS & EVENTS</h2>
    <hr class="border-t-4 border-b-4 border-[#ffdb19] mt-1 mb-8">
    
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <?php foreach ($newsList as $news): ?>
            <div class="bg-white p-4 rounded-md shadow-md">
                <?php if (!empty($news['image'])): ?>
                    <img src="../uploads/<?php echo htmlspecialchars($news['image']); ?>" class="w-full max-h-96 object-contain mt-2 rounded-md">
                <?php endif; ?>
                
                <h3 class="text-xl font-bold"><?php echo htmlspecialchars($news['title']); ?></h3>
                
                <p class="text-sm text-gray-600 flex items-center">
                    <i class="fas fa-clock mr-2"></i> <?php echo htmlspecialchars($news['date']); ?>
                </p>
                
                <?php
                    $content = nl2br(htmlspecialchars($news['content']));
                    $shortContent = strlen($news['content']) > 200 ? substr($news['content'], 0, 200) . "..." : $news['content'];
                ?>
                
                <p class="mt-2 content-preview">
                    <?php echo nl2br(htmlspecialchars($shortContent)); ?>
                </p>

                <?php if (strlen($news['content']) > 200): ?>
                    <button class="text-blue-500 continue-reading" 
        onclick="openModal('<?php echo addslashes($news['title']); ?>', 
                           `<?php echo addslashes($content); ?>`, 
                           '<?php echo addslashes($news['date']); ?>', 
                           '<?php echo !empty($news['image']) ? '../uploads/' . addslashes($news['image']) : ''; ?>')">
    Continue Reading
</button>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-6 space-x-2">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo ($page - 1); ?>" class="px-4 py-2 bg-gray-200 rounded-md">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>" class="px-4 py-2 <?php echo ($i == $page) ? 'bg-blue-500 text-white' : 'bg-gray-200'; ?> rounded-md"><?php echo $i; ?></a>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo ($page + 1); ?>" class="px-4 py-2 bg-gray-200 rounded-md">Next</a>
        <?php endif; ?>
    </div>
</div>

        <div class="order-3 md:order-3 w-full md:w-1/5 bg-white p-6 rounded-md border-l">
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

  <!-- Modal -->
<div id="newsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg max-w-[1200px] w-full max-h-[90vh] overflow-y-auto relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-black text-xl">&times;</button>
        <h2 id="modalTitle" class="text-2xl font-bold mb-2"></h2>
        <p id="modalDate" class="text-gray-500 text-sm mb-4"></p> <!-- Added date display -->
        <img id="modalImage" src="" alt="News Image" class="w-full max-h-96 object-contain rounded-md mb-4 hidden">
        <p id="modalContent" class="text-gray-700 text-justify"></p>
        <button onclick="closeModal()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded w-full">Close</button>
    </div>
</div>

<script>
    function openModal(title, content, date, image) {
        document.getElementById('modalTitle').innerText = title;
        document.getElementById('modalDate').innerText = "Published on: " + date; // Display the date
        document.getElementById('modalContent').innerHTML = content;

        const imgElement = document.getElementById('modalImage');
        if (image) {
            imgElement.src = image;
            imgElement.classList.remove('hidden');
        } else {
            imgElement.classList.add('hidden');
        }

        document.getElementById('newsModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('newsModal').classList.add('hidden');
    }
</script>



    <?php
    include '../components/links.php';
    include '../components/footer.php';
    ?>
</body>
</html>
