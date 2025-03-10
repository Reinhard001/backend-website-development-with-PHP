<?php
// contact.php

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
    <title>Contact Us - Alfa3 Cleaning Agency</title>
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
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="services.php">Services</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="projects.php">Projects</a>
                </li>
                <li class="nav-item active">
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
        <section class="contact-page py-5">
            <h2>Contact Us</h2>

            <div class="row">
                <div class="col-md-8">
                    <form action="send_message.php" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>

                <div class="col-md-4">
                    <h3>Our Address</h3>
                    <p>123 Main Street<br>Nairobi, Kenya</p>
                    <h3>Phone</h3>
                    <p>+254 712 345 678</p>
                    <h3>Email</h3>
                    <p><a href="mailto:info@alfa3cleaning.com">info@alfa3cleaning.com</a></p>
                </div>
            </div>
        </section>

           <section class="google-map py-5">
            <h2>Our Location on Google Maps</h2>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.805067254897!2d36.81565981475738!3d-1.2832538990653234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d68fe32607%3A0xfcf991487e448249!2sNairobi!5e0!3m2!1sen!2ske!4v1626266417908!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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