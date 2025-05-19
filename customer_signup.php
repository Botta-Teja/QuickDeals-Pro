<?php
require 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $required_fields = ['name', 'email', 'phone', 'password', 'confirm_password'];
    $missing_fields = [];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $missing_fields[] = $field;
        }
    }

    if (!empty($missing_fields)) {
        die("Error: Missing required fields: " . implode(', ', $missing_fields));
    }

    $full_name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Passwords must match
    if ($password !== $confirm_password) {
        die("Error: Passwords do not match.");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format.");
    }

    // Validate phone number (basic 10-digit)
    if (!preg_match('/^\d{10}$/', $phone)) {
        die("Error: Invalid phone number. Must be 10 digits.");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO customers (full_name, email, phone, password, created_at) 
                               VALUES (:full_name, :email, :phone, :password, NOW())");
        $stmt->execute([
            ':full_name' => $full_name,
            ':email' => $email,
            ':phone' => $phone,
            ':password' => $hashed_password
        ]);

        session_start();
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['user_type'] = 'customer';
        $_SESSION['email'] = $email;
        $_SESSION['full_name'] = $full_name;
        $_SESSION['phone'] = $phone;


        header("Location: customer.php");
        exit();

    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            die("Error: This email is already registered.");
        } else {
            die("Registration failed. Please try again later.");
        }
    }
} else {
    die("Error: Invalid request method.");
}
?>
