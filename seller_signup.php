<?php
session_start();
require 'config.php'; // PDO connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $business_name = trim($_POST['business_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check for missing fields
    if (empty($business_name) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
        die("Please fill in all fields.");
    }

    // Email format check
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Phone format check
    if (!preg_match('/^\d{10}$/', $phone)) {
        die("Invalid phone number. Use 10 digits.");
    }

    // Password match check
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    try {
        $stmt = $pdo->prepare("INSERT INTO sellers (business_name, email, phone, password, created_at)
                               VALUES (:business_name, :email, :phone, :password, NOW())");
        $stmt->execute([
            ':business_name' => $business_name,
            ':email' => $email,
            ':phone' => $phone,
            ':password' => $hashed_password
        ]);

        // Store session
        $_SESSION['seller_id'] = $pdo->lastInsertId();
        $_SESSION['business_name'] = $business_name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['address'] = $address;

        header("Location: seller.php");
        exit();
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            die("This email is already registered.");
        } else {
            die("Error registering seller: " . $e->getMessage());
        }
    }
} else {
    die("Invalid request.");
}
?>
