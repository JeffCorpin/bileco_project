<?php
session_start();  // Start session to store user data
include '../conn.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  

// Show all errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = new conn();  // Initialize database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    try {
        // Sanitize and retrieve input values
        $accountnum = trim($_POST['accountnum']);
        $firstname = trim($_POST['firstname']);
        $middlename = trim($_POST['middlename']);
        $lastname = trim($_POST['lastname']);
        $suffix = trim($_POST['suffix']);
        $address = trim($_POST['address']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $contactnumber = trim($_POST['contactnumber']);
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        // Ensure passwords match
        if ($password !== $confirmpassword) {
            $_SESSION['register_error'] = "Error: Passwords do not match!";
            header("Location: registerform.php");
            exit();
        }

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role = 'user';
        $status = 'offline'; // Default status if not logged in
        $created_at = date('Y-m-d H:i:s');

        // Check if email already exists
        $emailCheckSql = "SELECT email FROM tbl_users WHERE email = :email";
        $stmt = $db->conn->prepare($emailCheckSql);
        $stmt->execute([':email' => $email]);
        if ($stmt->rowCount() > 0) {
            $_SESSION['register_error'] = "Error: Email already exists!";
            header("Location: registerform.php");
            exit();
        }

        // Insert user into database
        $sql = "INSERT INTO tbl_users (accountnum, firstname, middlename, lastname, suffix, address, email, contactnumber, password, role, verified, created_at, status) 
                VALUES (:accountnum, :firstname, :middlename, :lastname, :suffix, :address, :email, :contactnumber, :password, :role, 0, :created_at, :status)";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute([
            ':accountnum' => $accountnum,
            ':firstname' => $firstname,
            ':middlename' => $middlename,
            ':lastname' => $lastname,
            ':suffix' => $suffix,
            ':address' => $address,
            ':email' => $email,
            ':contactnumber' => $contactnumber,
            ':password' => $hashed_password,
            ':role' => $role,
            ':created_at' => $created_at,
            ':status' => $status
        ]);

        // Generate OTP
        $otp = rand(100000, 999999);
        $expiry_time = time() + 300; // OTP expires in 5 minutes

        // Insert OTP record
        $insertOtpSql = "INSERT INTO tbl_otp (email, otp, expiration_time, created_at) VALUES (:email, :otp, :expiration_time, :created_at)";
        $insertOtpStmt = $db->conn->prepare($insertOtpSql);
        $insertOtpStmt->execute([
            ':email' => $email,
            ':otp' => $otp,
            ':expiration_time' => date('Y-m-d H:i:s', $expiry_time),
            ':created_at' => date('Y-m-d H:i:s')
        ]);

        // Send OTP email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hadizy.io@gmail.com';  // Replace with correct email
            $mail->Password = 'czdq kiqz ctsq lkiw';  // Use App Password, not real password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('support@bileco.com', 'Bileco Support');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Account Verification OTP';
            $mail->Body    = "<p>Your OTP for verification is: <b>$otp</b></p>
                              <p>This OTP is valid for 5 minutes.</p>";

            $mail->send();
        } catch (Exception $e) {
            die("Error sending OTP: {$mail->ErrorInfo}");
        }

        // Store success message and email in session
        $_SESSION['register_success'] = "Registration successful! Please check your email for the verification OTP.";
        $_SESSION['email'] = $email;

        // Redirect to register form with success message
        header("Location: registerform.php");
        exit();

    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
} else {
    die("Invalid request");
}
?>