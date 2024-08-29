<?php
session_start();

if (!isset($_SESSION['admin_loggedin'])) {
    header("Location: admin_login.php");
    exit;
}

// Database connection
include 'inc/db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve posted email and passwords
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match." ;
        exit;
    }

    // Update the email and password in the database
    $stmt = $conn->prepare("UPDATE admin_login SET email = ?, password = ? WHERE id = 1");
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        echo "Settings updated successfully.";
    } else {
        echo "Error updating settings: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin Settings - Malcolm Lismore Photography</title>
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
        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .settings-form {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .settings-form h2 {
            margin-top: 0;
            color: #003d34;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .form-group input[type="submit"] {
            background-color: #003d34;
            color: #ffffff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .form-group input[type="submit"]:hover {
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
    </style>
</head>
<body>
    <header>
        <h1>Edit Admin Settings - Malcolm Lismore Photography</h1>
        <form method="post" action="admin_logout.php">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </header>
    <div class="container">
        <div class="settings-form">
            <h2>Change Email and Password</h2>
            <form method="post" action="update_settings.php">
                <div class="form-group">
                    <label for="email">New Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update Settings">
                </div>
            </form>
        </div>
    </div>
    <footer>
        &copy; 2024 Malcolm Lismore Photography. All rights reserved.
    </footer>
</body>
</html>
