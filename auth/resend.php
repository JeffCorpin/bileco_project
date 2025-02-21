<?php
session_start();
include '../conn.php'; // Include your database connection file
require 'vendor/autoload.php'; // Include PHPMailer via Composer

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

// Function to generate a random 6-digit OTP
function generateOtp() {
    return rand(100000, 999999);
}

// Function to send OTP email using PHPMailer
function sendOtpEmail($toEmail, $otp) {
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hadizy.io@gmail.com';
        $mail->Password = 'czdq kiqz ctsq lkiw';  // Use an app password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        
        $mail->setFrom('your-email@example.com', 'Your App Name');
        $mail->addAddress($toEmail);
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "Your new OTP code is: <b>$otp</b><br>This code will expire in 5 minutes.";
        
        return $mail->send();
    } catch (Exception $e) {
        return false;
    }
}

// Generate new OTP and set expiry time
$newOtp = generateOtp();
$expiresAt = date('Y-m-d H:i:s', strtotime('+5 minutes'));

// Update OTP in database
$sql = "UPDATE tbl_otp SET otp = :otp, expiration_time = :expiration_time WHERE email = :email";
$stmt = $db->conn->prepare($sql);
$updated = $stmt->execute([
    ':otp' => $newOtp,
    ':expiration_time' => $expiresAt,
    ':email' => $email
]);

if ($updated && sendOtpEmail($email, $newOtp)) {
    $_SESSION['otp_resent'] = true; // Store a session variable for toast message
} else {
    $_SESSION['otp_error'] = "Failed to resend OTP.";
}

// Redirect back to verify.php
header("Location: verify.php");
exit();
