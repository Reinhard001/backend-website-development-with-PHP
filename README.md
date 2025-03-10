# Alfa3 Cleaning Agency - Web Application

## Overview

This is a web application developed for Alfa3 Cleaning Agency, a cleaning service provider based in Kenya. The application allows users to browse services, view project information, get in touch with the agency, and request bookings. It also includes login and signup functionality.

## Features

*   **Homepage:** Provides an overview of the agency, its services, and a form to request bookings.
*   **About Us:** Details the agency's mission, vision, and values.
*   **Services:** Showcases the range of cleaning services offered.
*   **Projects:** Displays a portfolio of recent cleaning projects.
*   **Contact:** Provides contact information and a form for inquiries.
*   **Ratings:** Displays customer ratings and testimonials.
*   **Booking:** Enables users to submit booking requests.
*   **Watch Page:** Showcases company achievements
*   **Our Plan:**  Display company vision mission

*   **User Authentication:**
    *   Login: Allows registered users to log in.
    *   Signup: Allows new users to create accounts.
    *   Logout: Allows logged-in users to end their session.

## Technologies Used

*   PHP: Server-side scripting language
*   MySQL: Database management system
*   HTML: Markup language
*   CSS: Styling language
*   Bootstrap: CSS framework
*   JavaScript: Client-side scripting language
*   Font Awesome: Icon toolkit

## Installation

1.  **Prerequisites:**
    *   XAMPP (or another web server with PHP and MySQL) installed.
2.  **Clone the Repository:**

    ```bash
    git clone [repository_url]
    ```

3.  **Database Setup:**
    *   Create a new MySQL database named `cleaning_agency` (or your preferred database name).
    *   Import the `database.sql` file (if available) to create the necessary tables (e.g., `users`, `bookings`).  If no such file exists, you need to manually create your tables in your database
      *  Example SQL Query
         ```sql
          CREATE TABLE users (
          id INT AUTO_INCREMENT PRIMARY KEY,
          username VARCHAR(255) NOT NULL UNIQUE,
          email VARCHAR(255) NOT NULL,
          password VARCHAR(255) NOT NULL
         );
          CREATE TABLE bookings (
          id INT AUTO_INCREMENT PRIMARY KEY,
          booking_details VARCHAR(255),
          booking_date DATE NOT NULL,
          booking_time TIME,
          booking_address TEXT,
          booking_service_type VARCHAR(255)
          );
         ```
4.  **Configuration:**
    *   Edit the `config.php` file and update the database connection details to match your MySQL setup:

    ```php
    <?php
    define('DB_HOST', 'localhost'); // Usually localhost
    define('DB_USER', 'your_mysql_username');
    define('DB_PASS', 'your_mysql_password');
    define('DB_NAME', 'cleaning_agency');
    ?>
    ```

5.  **File Placement:**
    *   Place all the project files (including `index.php`, `login.php`, `signup.php`, `functions.php`, `style.css`, etc.) in the `htdocs` directory of your XAMPP installation (e.g., `C:\xampp\htdocs\cleaning_agency`).
6.  **Access the Application:**
    *   Open your web browser and navigate to `http://localhost/cleaning_agency` (or the appropriate URL based on your XAMPP setup).

## Usage

*   **Browse the Website:** Explore the different pages of the website to learn about Alfa3 Cleaning Agency's services, projects, and contact information.
*   **Sign Up/Log In:** Create an account or log in to access personalized features.
*   **Request a Booking:** Use the booking form to submit a cleaning service request.

## File Structure
