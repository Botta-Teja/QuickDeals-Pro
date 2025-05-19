<?php
// Start the session
session_start();

// Connect to the database
$conn = new mysqli("localhost", "root", "", "quickdeals_pro");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get email and password
$email = $_POST['email'];
$password = $_POST['password'];


// Prevent SQL injection
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Query the user
$sql = "SELECT * FROM customers WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Check password (assuming passwords are hashed)
    if (password_verify($password, $user['password'])) {
        // Set session variables if needed
        $_SESSION['user_id'] = $user['id']; // match what customer.php is checking
        $_SESSION['full_name'] = $user['full_name']; // Match your DB column name
        $_SESSION['email'] = $user['email'];
        $_SESSION['phone'] = $user['phone'];

        // Redirect to customer dashboard
        header("Location: customer.php");
        exit();
    } else {
        echo "<script>alert('Incorrect password'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('No account found with that email'); window.history.back();</script>";
}

$conn->close();
?>
