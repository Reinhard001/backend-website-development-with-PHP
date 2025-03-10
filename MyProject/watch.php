<?php
// watch.php

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
    <title>Alfa3 Cleaning Agency - Watch Our Achievements</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /*  all the styles from index.php's <style> tag here */

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

        /*  styles */
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
            /* Style for achievement timeline */
        .achievement-timeline {
          padding: 20px;
        }

       .achievement-timeline h2 {
          font-size: 2em;
          margin-bottom: 20px;
          text-align: center;
         }

        .timeline-item {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
         }

        .timeline-item h3 {
            margin-bottom: 5px;
            color: #333;
        }

        .timeline-item p {
           color: #666;
        }

        .timeline-item .year {
            font-weight: bold;
            color: #555;
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
    <section class="achievement-timeline">
        <h2>Our Achievements Over The Years</h2>

        <div class="timeline-item">
            <span class="year">2015</span>
            <h3>Founded Alfa3 Cleaning Agency</h3>
            <p>Alfa3 Cleaning Agency was founded with a mission to provide reliable and affordable cleaning services.</p>
        </div>

        <div class="timeline-item">
            <span class="year">2017</span>
            <h3>Expanded Services to Mombasa</h3>
            <p>Expanded our services to the coastal city of Mombasa, Kenya, bringing quality cleaning to a new region.</p>
        </div>

        <div class="timeline-item">
            <span class="year">2019</span>
            <h3>Launched Commercial Cleaning Division</h3>
            <p>Introduced a dedicated commercial cleaning division to cater to offices and businesses.</p>
        </div>

        <div class="timeline-item">
            <span class="year">2021</span>
            <h3>Achieved 95% Customer Satisfaction Rate</h3>
            <p>Consistently achieved a 95% customer satisfaction rate, demonstrating our commitment to excellence.</p>
        </div>

        <div class="timeline-item">
            <span class="year">2023</span>
            <h3>Won "Best Cleaning Agency" Award</h3>
            <p>Received the prestigious "Best Cleaning Agency" award in Kenya for our outstanding services and community involvement.</p>
        </div>
         <!-- Add more achievements -->
         <div class="timeline-item">
            <span class="year">2024</span>
            <h3>Partnered with local Community in Nairobi, 97% satisfaction rate
            <p>Partnered with local Community in Nairobi with satisfaction rate, demonstrating our commitment to excellence.</p>
        </div>
            <div class="timeline-item">
            <span class="year">2024</span>
            <h3>More achievement here 
            <p>More achievement and plans here .</p>
        </div>
    </section>
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