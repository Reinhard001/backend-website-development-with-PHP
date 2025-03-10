<?php
// services.php

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
    <title>Our Services - Alfa3 Cleaning Agency</title>
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
                <li class="nav-item active">
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
            </ul>
        </div>
    </div>
    </nav>

    <div class="container flex-grow-1">
        <section class="services-page py-5">
            <h2>Our Cleaning Services</h2>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/residentialcleaning.jpg" alt="Residential Cleaning" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Residential Cleaning</h5>
                            <p class="card-text">We offer comprehensive residential cleaning services to keep your home clean and comfortable.</p>
                            <a href="#" class="btn btn-primary" onclick="toggleService('residential')">Learn More</a>
                        </div>
                        <div id="residential" class="service-details" style="display: none;">
                            <h4>What's Included:</h4>
                            <ul>
                                <li>Dusting of all surfaces</li>
                                <li>Vacuuming carpets and floors</li>
                                <li>Mopping hard floors</li>
                                <li>Bathroom cleaning (toilets, showers, sinks)</li>
                                <li>Kitchen cleaning (countertops, stovetops, microwave)</li>
                            </ul>
                            <p>... and much more!</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="images/officecleaning.jpg" alt="Office Cleaning" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Office Cleaning</h5>
                            <p class="card-text">Professional office cleaning services to ensure a productive and healthy work environment.</p>
                             <a href="#" class="btn btn-primary" onclick="toggleService('office')">Learn More</a>
                        </div>
                         <div id="office" class="service-details" style="display: none;">
                            <h4>What's Included:</h4>
                            <ul>
                                <li>Desk and surface cleaning</li>
                                <li>Trash removal</li>
                                <li>Restroom sanitation</li>
                                <li>Common area cleaning</li>
                                <li>Window washing</li>
                            </ul>
                            <p>... and much more!</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <img src="images/postconstructioncleaning.jpg" alt="Post-Construction Cleaning" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Post-Construction Cleaning</h5>
                            <p class="card-text">Thorough cleaning after construction or renovation, leaving your space ready to use.</p>
                               <a href="#" class="btn btn-primary" onclick="toggleService('post-construction')">Learn More</a>
                        </div>
                         <div id="post-construction" class="service-details" style="display: none;">
                            <h4>What's Included:</h4>
                            <ul>
                                <li>Debris removal</li>
                                <li>Dust and particle extraction</li>
                                <li>Floor cleaning and polishing</li>
                                <li>Window and surface cleaning</li>
                                <li>Final touch-ups</li>
                            </ul>
                            <p>... and much more!</p>
                        </div>
                    </div>
                </div>

                <!-- Add more services as needed -->
            </div>
        </section>
    </div>

    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            © <?php echo date("Y"); ?> Alfa3 Cleaning Agency
        </div>
    </footer>

    <script>
        function toggleService(serviceId) {
            var serviceDetails = document.getElementById(serviceId);
            if (serviceDetails.style.display === "none") {
                serviceDetails.style.display = "block";
            } else {
                serviceDetails.style.display = "none";
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
<?php $pdo = null; ?>