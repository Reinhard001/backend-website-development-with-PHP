<?php
// login.php

session_start();

require_once 'config.php';
require_once 'functions.php';

// Redirect if already logged in
if (isLoggedIn()) {
    redirect('index.php');
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitizeInput($_POST["username"]);
    $password = $_POST["password"];  //No need to sanitize password

    $pdo = connectDB();

    try {
        $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashed_password = $row["password"];

            if (password_verify($password, $hashed_password)) {
                // Password is correct, so start a new session
                session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["username"] = $username;

                // Redirect to index page
                redirect("index.php");
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Alfa3 Cleaning Agency</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light gray background */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Login Page Specific Styles */
        .login-body {
            background: linear-gradient(to bottom, #e0f2f1, #ffffff); /* Gradient background */
            min-height: 100vh; /* Make sure the gradient covers the entire viewport */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 100%;
            max-width: 400px; /* Restrict the width of the login container */
        }

        .login-container h2 {
            color: #37474f; /* Dark gray heading */
            text-align: center; /* Center the heading */
        }

        .login-container label {
            font-weight: 500;
            color: #37474f;
        }

        .login-container .form-control {
            border-radius: 5px;
        }

        .login-container .btn-primary {
            background-color: #4caf50; /* Green button */
            border-color: #4caf50;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 100%; /* Make the button full width */
        }

        .login-container .btn-primary:hover {
            background-color: #388e3c; /* Darker green on hover */
            border-color: #388e3c;
        }

        .login-container a {
            color: #4caf50;
            text-align: center; /* Center the link */
            display: block; /* Make the link a block element */
        }

        .login-container a:hover {
            color: #388e3c;
        }

        /* Other Page Styles (Keep your existing styles) */
        /* Add or modify styles for other elements as needed */
    </style>
</head>
<body class="login-body">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 login-container">
                <h2>Login</h2>
                <?php if ($error): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <p class="mt-3">Don't have an account? <a href="signup.php">Sign up here</a>.</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>