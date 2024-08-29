<?php
session_start();

if (!isset($_SESSION['admin_loggedin'])) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Gallery - Malcolm Lismore Photography</title>
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
        }
        .container {
            padding: 20px;
        }
        .upload-form {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }
        .upload-form h3 {
            margin-top: 0;
            color: #003d34;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #003d34;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group input[type="file"] {
            padding: 3px;
        }
        .submit-btn {
            padding: 10px 20px;
            background-color: #003d34;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .submit-btn:hover {
            background-color: #a0d6b4;
            color: #003d34;
        }
        .back-btn {
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
        .back-btn:hover {
            background-color: #a0d6b4;
            color: #003d34;
        }
    </style>
</head>
<body>
    <header>
        <h1>Manage Gallery</h1>
    </header>
    <div class="container">
        <div class="upload-form">
            <h3>Upload New Image</h3>
            <form action="upload_image.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="image">Select Image:</label>
                    <input type="file" name="image" id="image" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" id="category" required>
                        <option value="Nature Photography">Nature Photography</option>
                        <option value="Wedding Photography">Wedding Photography</option>
                        <option value="Portrait Photography">Portrait Photography</option>
                        <option value="Event Photography">Event Photography</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description">
                </div>
                <button type="submit" class="submit-btn">Upload Image</button>
            </form>
        </div>
    </div>
    <button class="back-btn" onclick="window.history.back()">Go Back</button>
</body>
</html>
