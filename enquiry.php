<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header("Location: user_login.php");
    exit;
}

include 'inc/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry - Malcolm Lismore Photography</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            height: 100px;
        }
    </style>
</head>
<body>

<header>
    <img src="images/malcome lismore logo.png" alt="Malcolm Lismore Photography Logo" class="logo">
    <h1>Malcolm Lismore Photography</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="pricing.php">Pricing</a>
        <a href="gallery.php">Gallery</a>
        <a href="enquiry.php">Enquiry</a>
    </nav>
</header>

<div class="container enquiry">
    <h2>Enquiry Form</h2>
    <p>Interested in booking Malcolm Lismore for your event? Please fill out the form below, and we’ll get back to you as soon as possible.</p>
    <form action="submit_enquiry.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        <label for="date">Date of Event:</label>
        <input type="date" id="date" name="date" required>
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        <button class="button" type="submit">Submit</button>
    </form>
</div>

<footer>
    <div class="footer-content">
        <p>&copy; 2024 Malcolm Lismore Photography. All rights reserved.</p>
        <p>Contact: <a href="mailto:info@malcolmlismore.com">info@malcolmlismore.com</a> | Phone: +44 123 456 789</p>
        <p>Follow Malcolm on social media: 
            <a href="https://twitter.com/malcolmlismore" target="_blank">Twitter</a> |
            <a href="https://facebook.com/malcolmlismore" target="_blank">Facebook</a> |
            <a href="https://instagram.com/malcolmlismore" target="_blank">Instagram</a>
        </p>
    </div>
</footer>
</body>
</html>
