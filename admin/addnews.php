<?php
session_start();
include '../conn.php';
include '../components/header.php';

$database = new conn();
$conn = $database->conn;

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Fetch existing news if ID is provided
$newsData = [
    'id' => '',
    'title' => '',
    'content' => '',
    'date' => '',
    'image' => '',
];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM news WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $newsData = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Handle form submission (Add or Edit)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $date = trim($_POST['date']);
    $id = $_POST['id'] ?? null;
    $image = $newsData['image'];

    if (!empty($_FILES["image"]["name"])) {
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        $upload_dir = dirname(__DIR__) . "/uploads/";
        $image_ext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

        if (in_array($image_ext, $allowed_types)) {
            $image = time() . "_" . basename($_FILES["image"]["name"]);
            $target_file = $upload_dir . $image;
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }
    }

    if ($id) {
        $sql = "UPDATE news SET title=:title, content=:content, date=:date, image=:image WHERE id=:id";
    } else {
        $sql = "INSERT INTO news (title, content, date, image) VALUES (:title, :content, :date, :image)";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':image', $image);
    if ($id) $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: newslist.php");
    exit();
}
?>

<title>Add / Edit News & Events</title>
<div class="flex h-screen">
    <?php include 'navbar-a.php'; ?>
    <div class="flex-1 overflow-y-auto p-6 bg-gray-100">
        <div class="max-w-6xl mx-auto bg-white p-6 rounded-md shadow-md">
            <h2 class="text-2xl font-bold mb-4"><?= $newsData['id'] ? "Edit News" : "Add News"; ?></h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <input type="hidden" name="id" value="<?= htmlspecialchars($newsData['id']) ?>">
                
                <input type="text" name="title" value="<?= htmlspecialchars($newsData['title']) ?>" placeholder="News Title" required class="w-full px-4 py-2 border rounded mb-2">
                <textarea name="content" placeholder="News Content" class="w-full px-4 py-2 border rounded mb-2 min-h-[200px]"><?= htmlspecialchars($newsData['content']) ?></textarea>
                <input type="date" name="date" value="<?= htmlspecialchars($newsData['date']) ?>" class="w-full px-4 py-2 border rounded mb-2">
                <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border rounded mb-2">
                
                <?php if ($newsData['image']): ?>
                    <img src="../uploads/<?= htmlspecialchars($newsData['image']) ?>" class="w-40 mt-2">
                <?php endif; ?>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded"><?= $newsData['id'] ? "Update" : "Save"; ?></button>
                <a href="newslist.php" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
            </form>
        </div>
    </div>
</div>
