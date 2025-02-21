<?php
session_start();
include '../conn.php'; // Include database connection file

// Ensure the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: verify.php?error=User not logged in.");
    exit();
}

// Initialize database connection
$db = new conn();
if (!$db) {
    header("Location: verify.php?error=Database connection failed.");
    exit();
}

$email = $_SESSION['email'];

// Check if OTP was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['otp'])) {
    $enteredOtp = implode('', $_POST['otp']); // Combine array values

    // Retrieve OTP from the database
    $sql = "SELECT otp, expiration_time FROM tbl_otp WHERE email = :email";
    $stmt = $db->conn->prepare($sql);
    $stmt->execute([':email' => $email]);
    $otpData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($otpData) {
        $storedOtp = $otpData['otp'];
        $expiresAt = strtotime($otpData['expiration_time']);

        // Check if OTP matches and is not expired
        if ($enteredOtp == $storedOtp) {
            if (time() > $expiresAt) {
                $_SESSION['otp_error'] = "OTP has expired. Please request a new one.";
            } else {
                $_SESSION['otp_success'] = "Verified";
                $_SESSION['verified'] = 1; // Set verified to 1

                // ✅ Update `verified` status in tbl_users
                $updateSql = "UPDATE tbl_users SET verified = 1 WHERE email = :email";
                $updateStmt = $db->conn->prepare($updateSql);
                $updateStmt->execute([':email' => $email]);

                // ✅ Delete OTP after successful verification
                $deleteSql = "DELETE FROM tbl_otp WHERE email = :email";
                $stmt = $db->conn->prepare($deleteSql);
                $stmt->execute([':email' => $email]);

                // ✅ Redirect to verify.php first, then to dashboard
                header("Location: verify.php?verified=1");
                exit();
            }
        } else {
            $_SESSION['otp_error'] = "Invalid OTP. Please try again.";
        }
    } else {
        $_SESSION['otp_error'] = "No OTP found for this email."; 
    }
}

// Redirect back to verification page with errors
header("Location: verify.php");
exit();
