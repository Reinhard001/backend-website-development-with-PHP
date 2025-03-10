<?php
// our_plan.php

session_start();

require_once 'config.php';
require_once 'functions.php';

// Connect to the database (you'll need this for any data-driven pages)
$pdo = connectDB();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfa3 Cleaning Agency - Our Plan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* all the styles from index.php's <style> tag here */

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: linear-gradient(to bottom, skyblue, white); /* Gradient background */
        }

        .navbar {
            background-color: #fff !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #495057;
            margin-left: 15px;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff;
        }

        .hero-section {
            background-color: #e9ecef;
            padding: 50px 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-content {
            text-align: left;
            padding-right: 50px;
            max-width: 600px;
        }

        .hero-content h1 {
            font-size: 3em;
            margin-bottom: 20px;
            color: #212529;
        }

        .hero-content p {
            font-size: 1.1em;
            color: #495057;
            line-height: 1.6;
        }

        .quote-form {
            margin-top: 30px;
        }

        .quote-form .form-group {
            margin-bottom: 15px;
        }

        .quote-form label {
            font-weight: bold;
            color: #343a40;
        }

        .quote-form .form-control {
            border-radius: 5px;
            padding: 10px;
        }

        .quote-form .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px 25px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .quote-form .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .hero-image img {
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .services-overview {
            padding: 50px 0;
            text-align: center;
        }

        .services-overview h2 {
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #212529;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            justify-items: center;
        }

        .service-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            transition: transform 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .service-button {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            font-weight: bold;
            transition: transform 0.3s ease;
        }

        .service-button:hover {
            background-color: rgba(0, 0, 0, 0.9);
        }

        .ratings-card {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            text-align: center;
        }

        .ratings-card div {
            font-size: 1.2em;
            color: #343a40;
        }

        .ratings-card a { /* Style the link */
            color: #343a40; /* Dark gray color */
            text-decoration: none; /* Remove underline */
            font-weight: bold;
        }

        .ratings-card a:hover { /* Hover effect */
            color: #007bff; /* Blue color on hover */
        }

        .ratings-card i {
            color: #ffc107;
            margin: 0 2px;
        }

        .best-services {
            padding: 50px 0;
            text-align: center;
            background-color: #f1f3f5;
        }

        .best-services h2 {
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #212529;
        }

        footer {
            background-color: #343a40 !important;
        }

        /* Font Awesome Icons */
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');

        /* Add this to your style.css */
        .nav-item .navbar-text {
          margin-left: 15px; /* Adjust the value as needed */
        }

         .rating-item {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
        }

        .rating-item h4 {
            margin-bottom: 5px;
            color: #333;
        }

        .rating-item p {
            color: #666;
            margin-bottom: 0;
        }

        .rating-item .stars {
            font-size: 1.2em;
            color: #ffc107;
            margin-right: 10px;
        }

        .rating-item .like-count {
            margin-left: auto;
            font-size: 1em;
            color: #888;
            display: flex;
            align-items: center;
        }

        .rating-item .like-count i {
            margin-right: 5px;
        }

          /* Style page content */
        .plan-content {
            padding: 20px;
            line-height: 1.6;
        }

        .plan-content h2 {
            font-size: 2em;
            margin-bottom: 15px;
        }

        .plan-content p {
            font-size: 1.1em;
        }
    </style>
     <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            Alfa3 Cleaning Agency
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="projects.php">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <?php if (isLoggedIn()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Signup</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <span class="navbar-text"><?php echo getLoggedInUsername(); ?></span>
                </li>
                 <!-- Remove this -->
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="plan-content">
        <h2>Our Mission, Vision, and Future Plans</h2>

        <h3>Our Mission</h3>
        <p>To provide top-quality cleaning services that enhance the health and well-being of our clients, creating clean, comfortable, and inviting spaces.</p>

        <h3>Our Vision</h3>
        <p>To be the leading and most trusted cleaning agency in Kenya, recognized for our commitment to excellence, innovation, and social responsibility.</p>

        <h3>Future Plans</h3>
        <ul>
            <li>Expand our services to more regions in Kenya and beyond.</li>
            <li>Invest in eco-friendly cleaning solutions and practices.</li>
            <li>Develop specialized cleaning services to meet evolving customer needs.</li>
            <li>Empower our employees with continuous training and development opportunities.</li>
            <li>Engage with local communities through partnerships and support programs.</li>
        </ul>
    </div>
</div>

<footer class="bg-dark text-white py-3">
    <div class="container text-center">
        © <?php echo date("Y"); ?> Alfa3 Cleaning Agency
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>