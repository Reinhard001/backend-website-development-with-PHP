<?php
// functions.php - Utility functions

// Database connection function (using PDO)
function connectDB() {
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
}


// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to redirect
function redirect($url) {
    header("Location: " . $url);
    exit;
}

// Function to display a message
function displayMessage($message, $type = 'info') {
    echo '<div class="alert alert-' . $type . '">' . $message . '</div>';
}

function getLoggedInUsername() {
    if (isLoggedIn()) {
        $username = $_SESSION['username'];
        $initial = strtoupper(substr($username, 0, 1)); // Get the first initial in uppercase
        return '<span class="user-initials">' . $initial . '</span>';
    } else {
        return '+254712345678'; // Default phone number/text
    }
}

?>