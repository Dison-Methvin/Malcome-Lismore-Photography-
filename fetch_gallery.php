<?php
include 'inc/db_connect.php';

$categories = ["Landscape", "Wildlife", "Wedding", "Event"];

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
