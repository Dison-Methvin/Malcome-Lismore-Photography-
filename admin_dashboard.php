<?php
session_start();

if (!isset($_SESSION['admin_loggedin'])) {
    header("Location: admin_login.php");
    exit;
}

// Database connection
include 'inc/db_connect.php';

// Fetch enquiries from the database
$sql = "SELECT id, name, email, location, date, message, created_at FROM enquiry";
$result = $conn->query($sql);

$enquiries = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $enquiries[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Malcolm Lismore Photography</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #003d34;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logout-btn {
            padding: 10px 20px;
            background-color: #003d34;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .logout-btn:hover {
            background-color: #a0d6b4;
            color: #003d34;
        }

        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
            flex-wrap: wrap;
            gap: 20px;
        }
        .dashboard-section {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .dashboard-section:hover {
            transform: translateY(-10px);
        }
        .dashboard-section h3 {
            margin-top: 0;
            color: #003d34;
        }
        .dashboard-section img {
            width: 100%;
            border-radius: 10px;
        }
        .action-btn {
            padding: 10px 20px;
            background-color: #003d34;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            display: block;
            margin: 10px auto;
        }
        .action-btn:hover {
            background-color: #a0d6b4;
            color: #003d34;
        }
        footer {
            background-color: #003d34;
            color: #ffffff;
            text-align: center;
            padding: 20px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #003d34;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header>
        <h1>Malcolm Lismore Photography Dashboard</h1>
        <form method="post" action="admin_logout.php">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </header>
    <div class="container">
        <div class="dashboard-section">
            <h3>Gallery Management</h3>
            <img src="images/g.png" alt="Gallery Management">
            <button class="action-btn" onclick="window.location.href='manage_gallery.php'">Manage Gallery</button>
        </div>

        <div class="dashboard-section">
            <h3>User Enquiries</h3>
            <img src="images/e.png" alt="User Enquiries">
            <button class="action-btn" onclick="window.location.href='view_enquires.php'">View Enquiries</button>
        </div>

        <div class="dashboard-section">
            <h3>Account Settings</h3>
            <img src="images/s.png" alt="Account Settings">
            <button class="action-btn" onclick="window.location.href='edit_settings.php'">Edit Settings</button>
        </div>
    </div>
    <footer>
        &copy; 2024 Malcolm Lismore Photography. All rights reserved.
    </footer>
</body>
</html>
