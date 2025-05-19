<?php
session_start();
$conn = new mysqli("localhost", "root", "", "quickdeals_pro");

$email = $_POST['email'];
$password = $_POST['password'];

$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * FROM sellers WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    if (password_verify($password, $user['password'])) {
        $_SESSION['seller_id'] = $user['id'];
$_SESSION['business_name'] = $user['business_name'];
$_SESSION['email'] = $user['email'];
$_SESSION['address'] = $user['address']; // Add this line


        header("Location: seller.php");
        exit();
    } else {
        echo "<script>alert('Incorrect password'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('No account found'); window.history.back();</script>";
}
?>
