<?php
session_start();
include '../conn.php';

$db = new conn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['email'])) {
        $_SESSION['error_message'] = "Session expired. Please try again.";
        header("Location: forgot-password.php");
        exit();
    }

    $email = $_SESSION['email'];  // Get email from session after OTP verification
    $new_password = $_POST['new_password'];

    // Validate password length (at least 6 characters)
    if (strlen($new_password) < 6) {
        $_SESSION['error_message'] = "Password must be at least 6 characters long.";
    } else {
        try {
            // Hash the new password securely
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Prepare and execute password update query
            $sql = "UPDATE tbl_users SET password = :password WHERE email = :email";
            $stmt = $db->conn->prepare($sql);
            $stmt->execute([':password' => $hashed_password, ':email' => $email]);

            // Check if update was successful
            if ($stmt->rowCount() > 0) {
                $_SESSION['success_message'] = "Your password has been reset successfully!";
                unset($_SESSION['email']);  // Remove email from session
                $_SESSION['redirect'] = true; // Flag for redirecting after delay
            } else {
                $_SESSION['error_message'] = "Failed to reset password. Please try again.";
            }
        } catch (PDOException $e) {
            $_SESSION['error_message'] = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Toastify for notifications -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <script>
        window.onload = function() {
            <?php if (!empty($_SESSION['success_message'])): ?>
                Toastify({
                    text: "<?php echo $_SESSION['success_message']; ?>",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#4caf50",
                }).showToast();

                <?php unset($_SESSION['success_message']); ?>

                // Delay before redirecting to login page
                setTimeout(function() {
                    window.location.href = "login.php";
                }, 3500);
            <?php elseif (!empty($_SESSION['error_message'])): ?>
                Toastify({
                    text: "<?php echo $_SESSION['error_message']; ?>",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#f44336",
                }).showToast();

                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>
        }

        function validatePassword() {
            var password = document.getElementById("new_password").value;
            if (password.length < 6) {
                Toastify({
                    text: "Password must be at least 6 characters long.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#f44336",
                }).showToast();
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Reset Password</h2>

        <form method="POST" class="space-y-4" onsubmit="return validatePassword();">
            <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required
                   class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" name="submit"
                    class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition duration-300">
                Reset Password
            </button>
        </form>

        <p class="text-center text-gray-600 mt-4">
            Remembered your password? <a href="login.php" class="text-blue-500 hover:underline">Login</a>
        </p>
    </div>
</body>
</html>
