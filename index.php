<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malcolm Lismore Photography</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f0f4f8; /* Light Grayish Blue Background */
            margin: 0;
            font-family: Arial, sans-serif;
        }
        header {
            background-color: #003d34; /* Deep Teal */
            color: #ffffff;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            height: 100px;
        }
        nav {
            margin: 10px 0;
        }
        nav a {
            color: #a0d6b4; /* Light Green */
            text-decoration: none;
            margin: 0 15px;
            padding: 10px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .login-register {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .hero {
        position: relative;
        height: 250px; /* Adjust height as needed */
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #ffffff;
        text-align: center;
        background: #003d34; /* Deep Teal */
        }

        .hero img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0;
        transition: opacity 3s ease-in-out, transform 3s ease-in-out;
        }

        .hero img:nth-child(1) { animation: slide 24s infinite; }
        .hero img:nth-child(2) { animation: slide 24s infinite 6s; }
        .hero img:nth-child(3) { animation: slide 24s infinite 12s; }
        .hero img:nth-child(4) { animation: slide 24s infinite 18s; }

        @keyframes slide {
        0% { opacity: 0; transform: scale(1.05); }
        5% { opacity: 1; transform: scale(1); }
        25% { opacity: 1; transform: scale(1); }
        30% { opacity: 0; transform: scale(1.05); }
        100% { opacity: 0; transform: scale(1.05); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }
        .hero h2 {
            margin: 0;
            font-size: 48px;
            animation: fadeIn 2s ease-out;
        }
        .hero p {
            font-size: 24px;
            animation: fadeIn 3s ease-out;
        }
        .cta {
            background-color: #a0d6b4; /* Light Green */
            color: #003d34; /* Deep Teal */
            text-align: center;
            padding: 30px;
            margin: 20px 0;
            border-radius: 8px;
        }
        .cta h3 {
            margin: 0;
            font-size: 28px;
        }
        .cta a {
            color: #003d34; /* Deep Teal */
            text-decoration: none;
            font-weight: bold;
            border-bottom: 2px solid #003d34;
            transition: all 0.3s ease;
        }
        .cta a:hover {
            color: #a0d6b4; /* Light Green */
            border-bottom: 2px solid #a0d6b4;
        }
        .testimonials {
            padding: 40px 20px;
            text-align: center;
        }
        .testimonials h3 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #003d34; /* Deep Teal */
        }
        
        .testimonials p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #333333; /* Dark Gray */
            animation: fadeInUp 2s ease-out;
        }
         /* Service Cards Section */
         .services {
            padding: 40px 20px;
            text-align: center;
        }
        .services h3 {
            font-size: 32px;
            margin-bottom: 40px;
            color: #003d34; /* Deep Teal */
        }
        .service-cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 250px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-content {
            padding: 20px;
        }
        .card h4 {
            margin: 0;
            font-size: 20px;
            color: #003d34; /* Deep Teal */
        }
        footer {
            background-color: #003d34; /* Deep Teal */
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        footer p {
            margin: 5px 0;
        }
        footer a {
            color: #a0d6b4; /* Light Green */
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }

        /* CSS Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
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
        <div class="login-register">
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <a href="admin_dashboard.php">Admin Dashboard</a>
                <?php endif; ?>
                <a href="user_logout.php">Logout</a>
                <span>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?></span>
            <?php else: ?>
                <a href="user_login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
            <a href="admin_login.php" style="color: #ffcc00; font-weight: bold;">Admin Login</a>
        </div>
    </nav>
</header>

<div class="hero">
    <img src="images/potrait home page 1.jpg" alt="Hero Image 1">
    <img src="images/mountain home page 2.jpg" alt="Hero Image 2">
    <img src="images/wildlife home page 3.jpg" alt="Hero Image 3">
    <img src="images/wedding home page 4.jpg" alt="Hero Image 4">
    <div class="hero-content">
        <h2>Welcome to Malcolm Lismore Photography</h2>
        <p>Capturing the natural beauty of Scotland and life's special moments.</p>
    </div>
</div>

<div class="container">
    <div class="cta">
        <h3>Explore More</h3>
        <button class="button"><a href="gallery.php">See Our Gallery</a></button>
    </div>

    <div class="services">
        <h3>Our Services</h3>
        <div class="service-cards">
            <div class="card">
                <img src="gallery/jakob-owens-TOKJ6zP2sr0-unsplash.jpg" alt="Landscape Photography">
                <div class="card-content">
                    <h4>Landscape</h4>
                </div>
            </div>
            <div class="card">
                <img src="images/service wedding.png" alt="Wedding Photography">
                <div class="card-content">
                    <h4>Wedding</h4>
                </div>
            </div>
            <div class="card">
                <img src="gallery/jan-harder-MozdnRrAZjM-unsplash.jpg" alt="Wildlife Photography">
                <div class="card-content">
                    <h4>Wildlife</h4>
                </div>
            </div>
            <div class="card">
                <img src="images/masoud-razeghi-uGVBxTCx0pI-unsplash.jpg" alt="Portrait Photography">
                <div class="card-content">
                    <h4>Portrait</h4>
                </div>
            </div>
            <div class="card">
                <img src="images/paul-binas-Hi-YWwO2U-0-unsplash.jpg" alt="Wedding Photography">
                <div class="card-content">
                    <h4>Event</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonials">
        <h3>What Our Clients Say</h3>
        <p>"Malcolm's work is exceptional! The photographs of our wedding were stunning and truly captured the essence of our day." - Jane D.</p>
        <p>"A fantastic experience from start to finish. The landscape shots of Scotland are breathtaking." - John S.</p>
    </div>

    <button class="button"><a href="about.php">Learn More</a></button>
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
