<?php
session_start();
include '../conn.php'; // Include your database connection file

// Ensure the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Initialize database connection
$db = new conn();
if (!$db) {
    die("Database connection failed.");
}

$email = $_SESSION['email'];

// Fetch OTP expiration time from the database
$sql = "SELECT expiration_time FROM tbl_otp WHERE email = :email";
$stmt = $db->conn->prepare($sql);
$stmt->execute([':email' => $email]);
$otpData = $stmt->fetch(PDO::FETCH_ASSOC);

$remaining_time = 0;
if ($otpData) {
    $expiry_time = strtotime($otpData['expiration_time']);
    $remaining_time = max($expiry_time - time(), 0);
}

// Check for toast message session variables
$otpResentMessage = "";
if (isset($_SESSION['otp_resent'])) {
    $otpResentMessage = "OTP has been resent successfully! Check your email.";
    unset($_SESSION['otp_resent']); // Clear session variable after use
} elseif (isset($_SESSION['otp_error'])) {
    $otpResentMessage = $_SESSION['otp_error'];
    unset($_SESSION['otp_error']); // Clear session variable after use
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        let remainingTime = <?php echo $remaining_time; ?>;
        function startTimer() {
            const timerElement = document.getElementById('timer');
            const resendButton = document.getElementById('resendBtn');
            const interval = setInterval(() => {
                if (remainingTime <= 0) {
                    clearInterval(interval);
                    timerElement.textContent = "00:00";
                    resendButton.disabled = false;
                } else {
                    let minutes = Math.floor(remainingTime / 60);
                    let seconds = remainingTime % 60;
                    timerElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                    remainingTime--;
                }
            }, 1000);
        }
        window.onload = startTimer;
    </script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-96">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">OTP Verification</h2>
        <p class="text-center text-gray-600 mb-4">A One-Time Password has been sent to <b><?php echo $email; ?></b></p>
        
        <form method="POST" action="verifying.php">
            <div class="flex justify-center space-x-2 mb-4">
                <?php for ($i = 0; $i < 6; $i++): ?>
                    <input type="text" name="otp[]" maxlength="1" class="w-10 h-10 text-center text-lg border rounded" required>
                <?php endfor; ?>
            </div>
            <p class="text-center text-gray-500">Resend OTP in <span id="timer" class="text-red-500 font-bold"></span></p>
            <button type="submit" name="verify" class="w-full bg-blue-500 text-white py-2 rounded-lg mt-4">Verify OTP</button>
        </form>
        <form method="POST" action="resend.php" class="text-center mt-4">
            <button type="submit" name="resend" id="resendBtn" class="text-blue-500 hover:underline" disabled>Resend OTP</button>
        </form>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="hidden fixed center-5 top-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg">
        <?php echo $otpResentMessage; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php if (isset($_SESSION['otp_success'])): ?>
            Swal.fire({
                icon: 'success',
                title: '<?php echo $_SESSION['otp_success']; ?>',
                showConfirmButton: false,
                timer: 5000
            });

            setTimeout(() => {
                window.location.href = 'login.php'; // Redirect after success
            }, 5000);
        <?php unset($_SESSION['otp_success']); endif; ?>
</script>
<script>
        <?php if (isset($_SESSION['otp_error'])): ?>
            Swal.fire({
                icon: 'error',
                background: '#f8d7da',
                color: '#721c24'
                title: '<?php echo $_SESSION['otp_error']; ?>'
            });
        <?php unset($_SESSION['otp_error']); endif; ?>
 
        window.onload = function() {
            startTimer(); // Start the timer on page load

            // Show toast message if present
            const toastMessage = "<?php echo $otpResentMessage; ?>";
            if (toastMessage) {
                const toast = document.getElementById('toast');
                toast.classList.remove('hidden');
                setTimeout(() => {
                    toast.classList.add('hidden');
                }, 3000);
            }
        };
    </script>

</body>
</html>
