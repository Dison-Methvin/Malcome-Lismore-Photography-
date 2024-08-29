<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing - Malcolm Lismore Photography</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to the CSS file -->
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            text-align: center;
            padding: 20px;
            background-color: #003d34;
            color: white;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* Logo Styles */
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            height: 100px; /* Adjust height as needed */
        }

        /* Pricing Container Styles */
        .container.pricing {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        h2, h3 {
            color: #003d34;
        }

        p {
            max-width: 800px;
            text-align: center;
        }

        /* Pricing Options Styles */
        .pricing-options {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }

        .package {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px; /* Fixed width for all packages */
            text-align: center;
        }

        .package-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .package h4 {
            background-color: #003d34;
            color: white;
            padding: 10px;
        }

        .package p {
            padding: 0 15px;
        }

        .package ul {
            list-style: none;
            padding: 0;
            margin: 10px 0;
        }

        .package ul li {
            padding: 5px 0;
        }

        .package .price {
            font-size: 24px;
            font-weight: bold;
            color: #003d34;
            margin: 15px 0;
        }
         /* Additional Information Section */
         .additional-info, .call-to-action {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 40px 0;
        }

        .call-to-action a.button {
            display: inline-block;
            background-color: #003d34;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .call-to-action a.button:hover {
            background-color: #026554;
        }

        /* Footer Styles */
footer {
    background-color: #003d34; /* Deep Teal Background */
    color: #ffffff; /* White Text */
    padding: 20px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
}

.footer-content {
    text-align: center;
}

        footer a:hover {
            text-decoration: underline;
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

<div class="container pricing">
    <h2>Pricing Information</h2>
    <p>At Malcolm Lismore Photography, we offer a range of services to suit your needs, whether you're looking for stunning landscape shots, memorable portraits, or beautiful event photography. Below is a breakdown of our pricing packages:</p>

    <section class="pricing-options">
        <div class="package">
            <img src="images/pricing landscape.jpg" alt="Landscape Photography" class="package-image">
            <h4>Landscape Photography</h4>
            <p><b>Capture the beauty of the Scottish landscape with our dedicated landscape photography sessions.</b></p>
            <ul>
                <li>Up to 3 hours of shooting</li>
                <li>High-resolution digital images</li>
                <li>1 large print included</li>
            </ul>
            <p class="price">£300</p>
        </div>

        <div class="package">
            <img src="images/pricing wildlife.jpg" alt="Wildlife Photography" class="package-image">
            <h4>Wildlife Photography</h4>
            <p><b>Get up close with Scotland’s wildlife in their natural habitat.</b></p>
            <ul>
                <li>Up to 4 hours of shooting</li>
                <li>High-resolution digital images</li>
                <li>2 large prints included</li>
            </ul>
            <p class="price">£400</p>
        </div>

        <div class="package">
            <img src="images/pricing wedding.jpg" alt="Wedding Photography" class="package-image">
            <h4>Wedding Photography</h4>
            <p><b>Document your special day with comprehensive wedding photography coverage.</b></p>
            <ul>
                <li>Full-day coverage (up to 8 hours)</li>
                <li>High-resolution digital images</li>
                <li>Professional photo album included</li>
            </ul>
            <p class="price">£1200</p>
        </div>

        <div class="package">
            <img src="images/pricing portrait.jpg" alt="Portrait Photography" class="package-image">
            <h4>Portrait Photography</h4>
            <p><b>Perfect for individual or family portraits with a personal touch.</b></p>
            <ul>
                <li>1 hour of shooting</li>
                <li>High-resolution digital images</li>
                <li>1 large print included</li>
            </ul>
            <p class="price">£200</p>
        </div>

        <div class="package">
            <img src="images/pricing events.jpg" alt="Event Photography" class="package-image">
            <h4>Event Photography</h4>
            <p><b>Capture the moments of your special event with professional photography.</b></p>
            <ul>
                <li>Up to 5 hours of coverage</li>
                <li>High-resolution digital images</li>
                <li>Custom photo book included</li>
            </ul>
            <p class="price">£500</p>
        </div>
    </section>

    <section class="additional-info">
        <h3>Additional Services</h3>
        <p>We also offer additional services such as photo editing, extra prints, and travel fees for locations outside our primary service area. Please contact us for a detailed quote based on your specific requirements.</p>
    </section>

    <section class="call-to-action">
        <h3>Book Your Session</h3>
        <p>Ready to book a session or have questions about our pricing? <a href="enquiry.php" class="button">Get in Touch</a></p>
    </section>
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