<?php
session_start();
include '../conn.php';
include '../components/header.php';

$database = new conn();
$conn = $database->conn;

// Pagination settings
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch total news count
$totalQuery = $conn->query("SELECT COUNT(*) as total FROM news");
$totalResult = $totalQuery->fetch(PDO::FETCH_ASSOC);
$totalNews = $totalResult['total'];
$totalPages = ceil($totalNews / $limit);

// Fetch news for the current page
$stmt = $conn->prepare("SELECT * FROM news ORDER BY STR_TO_DATE(date, '%Y-%m-%d %H:%i:%s') DESC LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$newsList = $stmt->fetchAll();
?>

<title>News & Events</title>
<div class="flex h-screen">
    <?php include 'navbar-a.php'; ?>
    <div class="flex-1 overflow-y-auto p-6 bg-gray-100">
        <div class="max-w-6xl mx-auto bg-white p-6 rounded-md shadow-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">News & Events</h2>
                <a href="addnews.php" class="bg-green-500 text-white px-4 py-2 rounded">Add News & Events</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <?php foreach ($newsList as $news): ?>
                    <div class="bg-white p-4 rounded-md shadow-md">
                        <?php if (!empty($news['image'])): ?>
                            <img src="../uploads/<?php echo htmlspecialchars($news['image']); ?>" class="w-full max-h-96 object-contain mt-2 rounded-md">
                        <?php endif; ?>
                        <h3 class="text-xl font-bold"><?php echo htmlspecialchars($news['title']); ?></h3>
                        <p class="text-gray-600 text-sm"><?php echo htmlspecialchars($news['date']); ?></p>
                        <div class="mt-2 flex space-x-2">
                            <button class="text-blue-500" onclick="showNewsModal(
                                `<?php echo addslashes($news['title']); ?>`, 
                                `<?php echo addslashes($news['content']); ?>`, 
                                `<?php echo $news['date']; ?>`, 
                                `<?php echo $news['image']; ?>`
                            )">
                                Continue Reading
                            </button>
                            <button onclick="editNews(<?php echo $news['id']; ?>)" class="ml-4 text-gray-600 hover:text-blue-500">
                                ✏️Edit
                            </button>


                            <button onclick="confirmDelete(<?php echo $news['id']; ?>)" 
                                class="ml-2 text-gray-600 hover:text-red-500">
                                🗑️Delete
                            </button>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Pagination -->
        <div class="max-w-6xl mx-auto p-4 text-center">
            <?php if ($totalPages > 1): ?>
                <div class="inline-flex -space-x-px">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>" class="px-3 py-1 border rounded-l bg-gray-200">&laquo; Prev</a>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?php echo $i; ?>" class="px-3 py-1 border <?php echo ($i == $page) ? 'bg-blue-500 text-white' : 'bg-gray-200'; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>
                    
                    <?php if ($page < $totalPages): ?>
                        <a href="?page=<?php echo $page + 1; ?>" class="px-3 py-1 border rounded-r bg-gray-200">Next &raquo;</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="newsModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-[1200px] w-full max-h-[90vh] overflow-y-auto relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-black text-2xl">&times;</button>
        <h2 id="modalTitle" class="text-2xl font-bold mb-2"></h2>
        <p class="text-gray-500 text-sm mb-4"><strong>Date:</strong> <span id="modalDate"></span></p>
        <img id="modalImage" class="w-full max-h-96 object-contain mb-4 hidden">
        <p id="modalContent" class="text-gray-700 text-justify"></p>
        <button onclick="closeModal()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded w-full">Close</button>
    </div>
</div>

<script>
function showNewsModal(title, content, date, image) {
    document.getElementById("modalTitle").innerText = title;
    document.getElementById("modalDate").innerText = date;
    document.getElementById("modalContent").innerHTML = content.replace(/\n/g, "<br>");
    const modalImage = document.getElementById("modalImage");
    if (image) {
        modalImage.src = "../uploads/" + image;
        modalImage.classList.remove("hidden");
    } else {
        modalImage.classList.add("hidden");
    }
    document.getElementById("newsModal").classList.remove("hidden");
}

function closeModal() {
    document.getElementById("newsModal").classList.add("hidden");
}
</script>

<script>
function editNews(id) {
    window.location.href = `addnews.php?id=${id}`;
}


function confirmDelete(newsId) {
    if (confirm("Are you sure you want to delete this news?")) {
        window.location.href = "deletenews.php?id=" + newsId;
    }
}
</script>
