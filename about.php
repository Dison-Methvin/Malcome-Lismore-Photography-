<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Malcolm Lismore</title>
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
            height: 100px; /* Adjusted height as needed */
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
        .container {
            padding: 40px 20px;
            text-align: center;
        }
        .profile-photo {
            width: 250px;
            height: 250px;
            background: url('images/Malcome Lismore.jpg') no-repeat center center/cover; /* Profile Image */
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            margin: 20px auto;
            position: relative;
        }
        .profile-photo::before {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 5px solid #a0d6b4; /* Light Green Border */
            border-radius: 50%;
            z-index: -1;
        }
        .about-text {
            max-width: 800px;
            margin: 20px auto;
            text-align: center;
            color: #333;
        }
        .about-text h2 {
            font-size: 36px;
            color: #003d34; /* Deep Teal */
        }
        .about-text p {
            font-size: 18px;
            line-height: 1.6;
            margin: 20px 0;
        }
        .section {
            background-color: #e6f7ec; /* Light Green Background */
            padding: 20px;
            margin: 40px 0;
            border-radius: 10px;
        }
        .section h3 {
            color: #003d34; /* Deep Teal */
        }
        .testimonials {
            background-color: #f0f4f8; /* Light Grayish Blue Background */
            padding: 20px;
            margin: 20px 0;
            border-radius: 10px;
        }
        .testimonial {
            font-size: 18px;
            color: #333;
            padding: 10px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }
        .testimonial p {
            margin: 0;
        }
        footer {
        background-color: #003d34; /* Deep Teal Background */
        color: #ffffff; /* White Text */
        padding: 20px;
        text-align: center;
        }

        .footer-content a {
        color: #FFD700; /* Golden Yellow for Links */
        text-decoration: none;
        }

        .footer-content a:hover {
         text-decoration: underline;
        }

        .footer-content p {
        margin: 10px 0;
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

<div class="container">
    <div class="profile-photo"></div> <!-- Profile Image -->
    <div class="about-text">
        <h2>About Malcolm Lismore</h2>
        <p>Hello! I'm Malcolm Lismore, a freelance photographer based on the North West coast of Scotland. My passion for capturing the natural world has led me to specialize in landscape and wildlife photography, as well as offering services for weddings, portraits, and special events.</p>
        <p>With years of experience and a deep appreciation for the beauty of Scotland, I strive to create stunning images that tell a story and preserve memories for a lifetime. Whether it's the rugged landscapes of the Highlands or the intimate moments of a wedding, my goal is to deliver exceptional photographs that you'll cherish forever.</p>
        <p>Feel free to explore my portfolio and contact me if you're interested in booking a session or learning more about my work.</p>
    </div>
    
    <div class="section">
        <h3>Why I Do What I Do</h3>
        <p>Photography for me is more than just taking pictures; it’s about telling a story and capturing the essence of a moment. My style is influenced by the natural beauty around me and the emotional connections I build with my subjects. Each photograph is a reflection of my passion and dedication to my craft.</p>
    </div>

    <div class="testimonials">
        <h3>What My Clients Say</h3>
        <div class="testimonial">
            <p>"Malcolm's work is simply incredible. He captured our wedding day perfectly, and we couldn’t be happier with the results!" - Emily & John</p>
        </div>
        <div class="testimonial">
            <p>"A true artist with a keen eye for detail. Malcolm’s nature photography has a unique ability to transport you to the scene." - Sarah M.</p>
        </div>
    </div>
    
    <div class="section">
        <h3>Explore My Work</h3>
        <p>Interested in seeing more of my work or have a project in mind?</p>
        <a href="gallery.php" style="display: inline-block; padding: 10px 20px; background-color: #003d34; color: #ffffff; text-decoration: none; border-radius: 5px;">View My Gallery</a>
    </div>
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
