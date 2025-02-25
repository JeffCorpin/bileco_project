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

// Generate CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Handle form submission (Add or Edit)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $date = trim($_POST['date']);
    $id = $_POST['id'] ?? null;
    $image = null;

    // File Upload Handling
    if (!empty($_FILES["image"]["name"])) {
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        $upload_dir = dirname(__DIR__) . "/uploads/";
        $image_ext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

        if (in_array($image_ext, $allowed_types)) {
            $image = time() . "_" . basename($_FILES["image"]["name"]);
            $target_file = $upload_dir . $image;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // If editing, remove old image
                if ($id) {
                    $stmt = $conn->prepare("SELECT image FROM news WHERE id=:id");
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();
                    $existingNews = $stmt->fetch();

                    if (!empty($existingNews['image'])) {
                        $old_image_path = $upload_dir . $existingNews['image'];
                        if (file_exists($old_image_path)) {
                            unlink($old_image_path);
                        }
                    }
                }
            } else {
                $image = null;
            }
        }
    }

    if ($id) {
        $stmt = $conn->prepare("SELECT image FROM news WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $existingNews = $stmt->fetch();

        if (!$image) {
            $image = $existingNews['image']; 
        }

        $sql = "UPDATE news SET title=:title, content=:content, date=:date" . ($image ? ", image=:image" : "") . " WHERE id=:id";
    } else {
        $sql = "INSERT INTO news (title, content, date, image) VALUES (:title, :content, :date, :image)";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':date', $date);
    if ($image) {
        $stmt->bindParam(':image', $image);
    }
    if ($id) {
        $stmt->bindParam(':id', $id);
    }
    $stmt->execute();

    header("Location: addnews.php");
    exit();
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $conn->prepare("SELECT image FROM news WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $news = $stmt->fetch();

    if (!empty($news['image'])) {
        $image_path = dirname(__DIR__) . "/uploads/" . $news['image'];
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }

    $stmt = $conn->prepare("DELETE FROM news WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: addnews.php");
    exit();
}

// Fetch total news count
$totalQuery = $conn->query("SELECT COUNT(*) as total FROM news");
$totalResult = $totalQuery->fetch(PDO::FETCH_ASSOC);
$totalNews = $totalResult['total'];
$totalPages = ceil($totalNews / $limit);

// Fetch news for the current page
$stmt = $conn->prepare("SELECT * FROM news ORDER BY date DESC LIMIT :limit OFFSET :offset");
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
        <h2 class="text-2xl font-bold mb-4">Add / Edit News & Events</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <input type="hidden" name="id" id="news_id">
            <input type="text" name="title" id="title" placeholder="News Title" required class="w-full px-4 py-2 border rounded mb-2">
            <textarea name="content" id="content" placeholder="News Content" class="w-full px-4 py-2 border rounded mb-2 min-h-[200px]"></textarea>
            <input type="date" name="date" id="date" class="w-full px-4 py-2 border rounded mb-2">
            <input type="file" name="image" accept="image/*" required class="w-full px-4 py-2 border rounded mb-2">
            <div id="imagePreview"></div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            <button type="button" onclick="window.location.reload();" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
        </form>
    </div>

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-md shadow-md">
            <h2 class="text-2xl font-bold mb-4">News & Events</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <?php foreach ($newsList as $news): ?>
                    <div class="bg-white p-4 rounded-md shadow-md">
                        <?php if (!empty($news['image'])): ?>
                            <img src="../uploads/<?php echo htmlspecialchars($news['image']); ?>" class="w-full max-h-96 object-contain mt-2 rounded-md">
                        <?php endif; ?>
                        <h3 class="text-xl font-bold"><?php echo htmlspecialchars($news['title']); ?></h3>
                        <p class="text-gray-600 text-sm"><?php echo htmlspecialchars($news['date']); ?></p>
                        <button class="text-blue-500" onclick="showNewsModal(
                            `<?php echo addslashes($news['title']); ?>`, 
                            `<?php echo addslashes($news['content']); ?>`, 
                            `<?php echo $news['date']; ?>`, 
                            `<?php echo $news['image']; ?>`
                )">
                    Continue Reading
                </button>

                <button onclick="editNews(
                    `<?php echo $news['id']; ?>`, 
                    `<?php echo addslashes($news['title']); ?>`, 
                    `<?php echo addslashes($news['content']); ?>`, 
                    `<?php echo $news['date']; ?>`
                )" class="ml-4 text-gray-600 hover:text-blue-500">
                    ✏️
                </button>

                <button onclick="confirmDelete(`<?php echo $news['id']; ?>`)" class="ml-2 text-gray-600 hover:text-red-500">
                    🗑️
                </button>
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
    document.getElementById("modalDate").innerText = date; // Display date

    // Preserve new lines in content by converting them to <br>
    const formattedContent = content.replace(/\n/g, "<br>");
    document.getElementById("modalContent").innerHTML = formattedContent;

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
    function editNews(id, title, content, date) {
    document.getElementById("news_id").value = id;
    document.getElementById("title").value = title;
    document.getElementById("content").value = content;
    document.getElementById("date").value = date;

    const formContainer = document.querySelector(".max-w-6xl"); // Target the form container
    formContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this news?")) {
        window.location.href = "addnews.php?delete=" + id;
    }
}
</script>

