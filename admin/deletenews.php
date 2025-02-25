<?php
session_start();
include '../conn.php';

$database = new conn();
$conn = $database->conn;

if (isset($_GET['id'])) {
    $newsId = $_GET['id'];

    // Get the image name to delete it from the server
    $stmt = $conn->prepare("SELECT image FROM news WHERE id = :id");
    $stmt->bindParam(':id', $newsId, PDO::PARAM_INT);
    $stmt->execute();
    $news = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($news && !empty($news['image'])) {
        $imagePath = dirname(__DIR__) . "/uploads/" . $news['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }
    }

    // Delete the news record from the database
    $stmt = $conn->prepare("DELETE FROM news WHERE id = :id");
    $stmt->bindParam(':id', $newsId, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        header("Location: newslist.php?deleted=success");
        exit();
    } else {
        header("Location: newslist.php?deleted=error");
        exit();
    }
} else {
    header("Location: newslist.php?deleted=invalid");
    exit();
}
?>
