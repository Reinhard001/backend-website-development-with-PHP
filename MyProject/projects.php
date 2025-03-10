<?php
// projects.php

session_start();
require_once 'config.php';
require_once 'functions.php';

$pdo = connectDB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Projects - Alfa3 Cleaning Agency</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container">
        <a class="navbar-brand" href="#">Alfa3 Cleaning Agency</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.php">Services</a>
                </li>
                <li class="nav-item active">
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
            </ul>
        </div>
    </div>
</nav>

    <div class="container flex-grow-1">
        <section class="projects-page py-5">
            <h2>Our Recent Projects</h2>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/officecomplexcleaning.jpg" alt="Office Complex Cleaning" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Office Complex Cleaning</h5>
                            <p class="card-text">Complete cleaning of a large office complex in Nairobi.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="images/residentialestatecleaning.jpg" alt="Residential Estate Cleaning" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Residential Estate Cleaning</h5>
                            <p class="card-text">Regular cleaning services for a residential estate.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="images/postconstructioncleaning1.jpg" alt="Post-Construction Cleaning" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Post-Construction Cleaning</h5>
                            <p class="card-text">Post-construction cleaning for a new shopping mall.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Add more projects as needed -->
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
    <script src="script.js"></script>
</body>
</html>
<?php $pdo = null; ?>