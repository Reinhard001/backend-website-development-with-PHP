<?php
// signup.php

session_start();

require_once 'config.php';
require_once 'functions.php';

// Redirect if already logged in
if (isLoggedIn()) {
    redirect('index.php');
}

$error = '';
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitizeInput($_POST["username"]);
    $email = sanitizeInput($_POST["email"]);
    $password = $_POST["password"];  //No need to sanitize password
    $confirm_password = $_POST["confirm_password"]; //No need to sanitize password


    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Please fill in all fields.";
    } elseif ($password != $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        $pdo = connectDB();

        try {
            // Check if username already exists
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $error = "Username already exists.";
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert the new user into the database
                $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->execute();

                $success = true; // Registration successful
                // Optionally, redirect to login page after successful registration:
                // redirect("login.php");
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $pdo = null;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Alfa3 Cleaning Agency</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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

        /* Signup Page Specific Styles */
        .signup-body {
            background: linear-gradient(to bottom, #e0f2f1, #ffffff); /* Gradient background */
            min-height: 100vh; /* Make sure the gradient covers the entire viewport */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .signup-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 100%;
            max-width: 400px; /* Restrict the width of the signup container */
        }

        .signup-container h2 {
            color: #37474f; /* Dark gray heading */
            text-align: center; /* Center the heading */
        }

        .signup-container label {
            font-weight: 500;
            color: #37474f;
        }

        .signup-container .form-control {
            border-radius: 5px;
        }

        .signup-container .btn-primary {
            background-color: #4caf50; /* Green button */
            border-color: #4caf50;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 100%; /* Make the button full width */
        }

        .signup-container .btn-primary:hover {
            background-color: #388e3c; /* Darker green on hover */
            border-color: #388e3c;
        }

        .signup-container a {
            color: #4caf50;
            text-align: center; /* Center the link */
            display: block; /* Make the link a block element */
        }

        .signup-container a:hover {
            color: #388e3c;
        }

        /* Other Page Styles (Keep your existing styles) */
        /* Add or modify styles for other elements as needed */
    </style>
</head>
<body class="signup-body">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 signup-container">
                <h2>Sign Up</h2>
                <?php if ($error): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <?php if ($success): ?>
                    <div class="alert alert-success">Registration successful! You can now <a href="login.php">login</a>.</div>
                <?php endif; ?>

                <form method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
                <p class="mt-3">Already have an account? <a href="login.php">Login here</a>.</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>