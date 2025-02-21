<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../conn.php';

$db = new conn();
$success_message = ""; // To store success messages

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error_message = "Please enter both email and password.";
    } else {
        try {
            // Fetch user from database
            $sql = "SELECT * FROM tbl_users WHERE email = :email LIMIT 1";
            $stmt = $db->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                if ($user['verified'] == 1) {
                    // Store session securely
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['user_name'] = $user['firstname'] . " " . $user['lastname'];

                    // Regenerate session ID to prevent fixation attacks
                    session_regenerate_id(true);

                    // Set success message
                    $success_message = "Login successful! Redirecting...";

                    // Update user status to 'online' in the database
                    $update_status_sql = "UPDATE tbl_users SET status = 'online' WHERE id = :id";
                    $update_status_stmt = $db->conn->prepare($update_status_sql);
                    $update_status_stmt->execute([':id' => $user['id']]);

                    // Set redirect URL based on user role
                    if ($user['role'] === 'admin') {
                        $redirect_url = '../admin/index.php';
                    } elseif ($user['role'] === 'user') {
                        $redirect_url = '../index.php';
                    } else {
                        session_destroy();
                        die("Unauthorized access.");
                    }

                    // Echo JavaScript to redirect after 3 seconds
                    echo "<script>
                            setTimeout(function() {
                                window.location.href = '$redirect_url';
                            }, 3000);
                          </script>";
                } else {
                    $error_message = "Your email is not verified. Please check your email.";
                }
            } else {
                $error_message = "Invalid email or password.";
            }
        } catch (PDOException $e) {
            $error_message = "Database error: " . $e->getMessage();
        }
    }
}

// Logout process: Update status to 'offline' and destroy session
if (isset($_GET['logout'])) {
    // Update user status to 'offline' before logging out
    if (isset($_SESSION['user_id'])) {
        $update_status_sql = "UPDATE tbl_users SET status = 'offline' WHERE id = :id";
        $update_status_stmt = $db->conn->prepare($update_status_sql);
        $update_status_stmt->execute([':id' => $_SESSION['user_id']]);
    }

    // Destroy session
    session_destroy();
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gradient-to-br from-yellow-400 via-blue-300 to-blue-800">

    <!-- Notification for Success -->
    <?php if (!empty($success_message)) : ?>
        <div id="success-toast" class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50">
            <p class="font-semibold"><?php echo htmlspecialchars($success_message); ?></p>
        </div>
    <?php endif; ?>

    <!-- Notification for Error -->
    <?php if (!empty($error_message)) : ?>
        <div id="error-toast" class="fixed top-5 left-1/2 transform -translate-x-1/2 bg-red-500 text-white p-4 rounded-lg shadow-lg z-50">
            <p class="font-semibold"><?php echo htmlspecialchars($error_message); ?></p>
        </div>
    <?php endif; ?>

    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
    <img src="<?php echo BASE_URL; ?>assets/images/logos/logo.png" alt="Logo" class="w-40 h-40 max-w-full sm-h-auto mx-auto mb-5">
        
        <form method="POST" class="space-y-4">
            <div>
                <input type="email" name="email" placeholder="Email" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" required
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" name="login"
                class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition duration-300">
                Login
            </button>
        </form>

        <p class="text-center text-gray-600 mt-4">
            Don't have an account? <a href="registerform.php" class="text-blue-500 hover:underline">Sign up</a>
        </p>
        
        <p class="text-center text-gray-600 mt-2">
            <a href="forgotpassword.php" class="text-blue-500 hover:underline">Forgot Password?</a>
        </p>
    </div>

    <script>
        // Hide the success toast after 3 seconds
        if (document.getElementById('success-toast')) {
            setTimeout(function() {
                document.getElementById('success-toast').style.display = 'none';
            }, 3000); // 3 seconds
        }

        // Hide the error toast after 3 seconds
        if (document.getElementById('error-toast')) {
            setTimeout(function() {
                document.getElementById('error-toast').style.display = 'none';
            }, 3000); // 3 seconds
        }
    </script>

</body>
</html>
