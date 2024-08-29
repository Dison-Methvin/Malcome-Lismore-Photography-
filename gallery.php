<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Malcolm Lismore Photography</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #003d34; /* Deep Teal */
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            position: relative;
        }
        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            height: 80px;
        }
        nav {
            margin-top: 10px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            width: 90%;
            margin: 20px auto;
        }
        .gallery-category {
            margin: 40px 0;
        }
        .gallery-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }
        .gallery-item {
            flex: 1 1 calc(20% - 20px);
            box-sizing: border-box;
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            cursor: pointer;
            border: 2px solid #ccc;
            border-radius: 10px;
        }
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
            padding-top: 60px;
        }
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover {
            color: #bbb;
        }
        #caption {
            margin: 10px;
            padding: 10px;
            text-align: center;
            color: #fff;
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

<div class="container gallery">
    <h2>Gallery</h2>

    <?php
    include 'inc/db_connect.php';

    $categories = ["Landscape", "Wildlife", "Wedding", "Portrait", "Event"];

    foreach ($categories as $category) {
        echo "<section class='gallery-category'>";
        echo "<h3>" . ucfirst($category) . " Photography</h3>";
        echo "<div class='gallery-grid'>";

        $stmt = $conn->prepare("SELECT image_path FROM gallery WHERE category = ?");
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo "<div class='gallery-item'>";
            echo "<img src='" . htmlspecialchars($row['image_path']) . "' alt='" . ucfirst($category) . "' class='gallery-image'>";
            echo "</div>";
        }

        echo "</div>";
        echo "</section>";
        
        $stmt->close();
    }

    $conn->close();
    ?>

    <!-- Modal for larger image view -->
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
        <div id="caption"></div>
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

<script>
    // Modal functionality
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modalImage");
    const captionText = document.getElementById("caption");

    document.querySelectorAll(".gallery-image").forEach(image => {
        image.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
    });

    const span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>

</body>
</html>

