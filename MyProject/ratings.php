<?php
// ratings.php

session_start();

require_once 'config.php';
require_once 'functions.php';

// Connect to the database (you'll need this for any data-driven pages)
$pdo = connectDB();

// Sample ratings data (replace with database data in a real application)
$ratings = [
    [
        'name' => 'Whitney Beatrice',
        'comment' => 'Excellent cleaning service!  My house has never looked better.',
        'rating' => 5, // Star rating (1-5)
        'likes' => 25, // Number of likes
    ],
    [
        'name' => 'Ray Auress',
        'comment' => 'Professional, efficient, and friendly. They did a fantastic job.',
        'rating' => 4,
        'likes' => 18,
    ],
    [
        'name' => 'David Muchai',
        'comment' => 'Phenomenal cleaning in Nairobi. Will use them again!',
        'rating' => 5,
        'likes' => 32,
    ],
    [
        'name' => 'Sarah Wambui',
        'comment' => 'Very thorough and paid attention to detail. Great value!',
        'rating' => 4,
        'likes' => 12,
    ],
    [
        'name' => 'John Kamau',
        'comment' => 'Reliable and trustworthy. Comfortable leaving them in my home.',
        'rating' => 5,
        'likes' => 45,
    ],
    [
        'name' => 'Esther Njeri',
        'comment' => 'Best cleaning service in Mombasa. Very happy with the results.',
        'rating' => 4,
        'likes' => 22,
    ],
    [
        'name' => 'Peter Omondi',
        'comment' => 'Arrived on time and completed the job quickly. Excellent service!',
        'rating' => 5,
        'likes' => 28,
    ],
    [
        'name' => 'Mercy Akinyi',
        'comment' => 'Great communication and easy scheduling. Very polite and professional.',
        'rating' => 4,
        'likes' => 15,
    ],
    [
        'name' => 'James Mwangi',
        'comment' => 'I highly recommend Alfa3 Cleaning Agency!',
        'rating' => 5,
        'likes' => 38,
    ],
    [
        'name' => 'Grace Wanjiku',
        'comment' => 'My house sparkles! Thank you for the wonderful cleaning.',
        'rating' => 5,
        'likes' => 20,
    ],
    [
        'name' => 'Collins Otieno',
        'comment' => 'Excellent customer service and a great cleaning job.',
        'rating' => 4,
        'likes' => 10,
    ],
    [
        'name' => 'Ann Mwende',
        'comment' => 'They are very professional and do an amazing job. Highly recommend them!',
        'rating' => 5,
        'likes' => 33,
    ],
    [
        'name' => 'Sam Kariuki',
        'comment' => 'The team was very efficient and left my house spotless. I am very impressed!',
        'rating' => 5,
        'likes' => 17,
    ],
    [
        'name' => 'Naomi Achieng',
        'comment' => 'So happy with the service. They are very reliable!',
        'rating' => 4,
        'likes' => 19,
    ],
    [
        'name' => 'Joseph Kimani',
        'comment' => 'The best cleaning service in Nairobi. I highly recommend them!',
        'rating' => 5,
        'likes' => 29,
    ],
    [
        'name' => 'Ruth Mbithe',
        'comment' => 'Very satisfied with their service. They are very professional!',
        'rating' => 4,
        'likes' => 11,
    ],
    [
        'name' => 'Daniel Mutua',
        'comment' => 'Excellent cleaning service. I will definitely use them again!',
        'rating' => 5,
        'likes' => 31,
    ],
    [
        'name' => 'Elizabeth Wambui',
        'comment' => 'Very trustworthy and do an amazing job!',
        'rating' => 4,
        'likes' => 16,
    ],
    [
        'name' => 'Stephen Oloo',
        'comment' => 'Thorough and paid attention to detail. Great value!',
        'rating' => 5,
        'likes' => 24,
    ],
    [
        'name' => 'Agnes Nduku',
        'comment' => 'So happy with their service. They are very reliable!',
        'rating' => 4,
        'likes' => 13,
    ],

];

function displayStars($rating) {
    $stars = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $stars .= '<i class="fas fa-star"></i>'; // Full star
        } else {
            $stars .= '<i class="far fa-star"></i>'; // Empty star
        }
    }
    return $stars;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfa3 Cleaning Agency - Ratings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    /* All existing styles from index.php's <style> tag here */

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

        /* Style for summary metrics */
        .summary-metrics {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .summary-metric {
            font-size: 1.1em;
            color: #333;
        }

        .summary-metric i {
            margin-right: 5px;
            color: #555; /* Slightly darker icons */
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
    <h1>Our Ratings</h1>

        <!-- Add summary metrics section -->
    <div class="summary-metrics">
        <div class="summary-metric">
            <i class="fas fa-user-friends"></i> 1 Contributor
        </div>
        <div class="summary-metric">
            <i class="fas fa-exclamation-circle"></i> 0 Issues
        </div>
        <div class="summary-metric">
            <i class="fas fa-star"></i> 4 Stars
        </div>
        <div class="summary-metric">
            <i class="fas fa-code-branch"></i> 5 Forks
        </div>
    </div>

    <?php foreach ($ratings as $rating): ?>
        <div class="rating-item">
            <h4><?php echo htmlspecialchars($rating['name']); ?></h4>
            <div class="stars">
                <?php echo displayStars($rating['rating']); ?>
            </div>
            <p><?php echo htmlspecialchars($rating['comment']); ?></p>
            <div class="like-count">
                <i class="fas fa-thumbs-up"></i> <?php echo $rating['likes']; ?>
            </div>
        </div>
    <?php endforeach; ?>
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