
<?php
session_start();
header('Content-Type: application/json');

// Default response for non-logged-in users
$response = [
    'loggedIn' => false,
    'userType' => null,
    'userId' => null,
    'email' => null
];

// Check if session variables exist
if (isset($_SESSION['user_id']) && isset($_SESSION['user_type'])) {
    $response = [
        'loggedIn' => true,
        'userType' => $_SESSION['user_type'],
        'userId' => $_SESSION['user_id'],
        'email' => $_SESSION['email'] ?? null,
        'sessionId' => session_id()
    ];
    
    // Additional verification for sensitive operations
    if (isset($_SESSION['last_activity']) {
        $response['lastActive'] = time() - $_SESSION['last_activity'];
    }
}

// Add security headers
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");

echo json_encode($response);
exit();
?>