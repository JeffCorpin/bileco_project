<?php
session_start();
include '../conn.php';

$db = new conn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    // Fetch the latest OTP for this email and check expiration
    $sql = "SELECT * FROM tbl_otp WHERE email = :email ORDER BY expiration_time DESC LIMIT 1";
    $stmt = $db->conn->prepare($sql);
    $stmt->execute([':email' => $email]);
    $otp_record = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($otp_record) {
        // Check if OTP matches and is not expired
        if ($otp_record['otp'] == $otp && strtotime($otp_record['expiration_time']) > time()) {
            $_SESSION['otp_verified'] = true;
            $_SESSION['email'] = $email;

            // Delete OTP after successful verification
            $sql = "DELETE FROM tbl_otp WHERE email = :email";
            $stmt = $db->conn->prepare($sql);
            $stmt->execute([':email' => $email]);

            $_SESSION['success_message'] = "OTP Verified Successfully! Redirecting to reset password page...";
            $_SESSION['redirect'] = true; // Flag to handle redirection after delay
        } else {
            $_SESSION['error_message'] = "Invalid or expired OTP. Please try again.";
        }
    } else {
        $_SESSION['error_message'] = "No OTP found for this email.";
    }
}

// Fetch expiration time for countdown
$expiration_time = null;
if (isset($_GET['email'])) {
    $sql = "SELECT expiration_time FROM tbl_otp WHERE email = :email ORDER BY expiration_time DESC LIMIT 1";
    $stmt = $db->conn->prepare($sql);
    $stmt->execute([':email' => $_GET['email']]);
    $otp_data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($otp_data) {
        $expiration_time = strtotime($otp_data['expiration_time']) * 1000;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Toastify for notifications -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <script>
        function startCountdown(expiration) {
            let interval = setInterval(function () {
                let now = new Date().getTime();
                let timeLeft = expiration - now;

                if (timeLeft <= 0) {
                    clearInterval(interval);
                    document.getElementById("timer").innerHTML = "OTP expired!";
                    document.getElementById("otpInput").disabled = true;
                    document.getElementById("submitBtn").disabled = true;
                } else {
                    let minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                    let seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
                    document.getElementById("timer").innerHTML = `OTP expires in ${minutes}m ${seconds}s`;
                }
            }, 1000);
        }

        window.onload = function() {
            <?php if (!empty($_SESSION['success_message'])): ?>
                Toastify({
                    text: "<?php echo $_SESSION['success_message']; ?>",
                    duration: 3000, // Toast duration
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#4caf50",
                }).showToast();
                
                <?php unset($_SESSION['success_message']); ?>

                // Delay before redirecting (3 seconds after toast)
                setTimeout(function() {
                    window.location.href = "reset_password.php";
                }, 3500);
            <?php elseif (!empty($_SESSION['error_message'])): ?>
                Toastify({
                    text: "<?php echo $_SESSION['error_message']; ?>",
                    duration: 3000, // Toast duration
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#f44336",
                }).showToast();

                <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>
        }
    </script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Enter OTP</h2>

        <p id="timer" class="text-center text-gray-600"></p>

        <form method="POST" class="space-y-4">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email'] ?? ''); ?>">
            <input id="otpInput" type="text" name="otp" placeholder="Enter OTP" required
                   class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button id="submitBtn" type="submit" name="submit"
                    class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition duration-300">
                Verify OTP
            </button>
        </form>

        <p class="text-center text-gray-600 mt-4">
            No OTP? <a href="forgotpassword.php" class="text-blue-500 hover:underline">Request Again</a>
        </p>
    </div>

    <script>
        <?php if ($expiration_time) : ?>
            startCountdown(<?php echo $expiration_time; ?>);
        <?php endif; ?>
    </script>
</body>
</html>
