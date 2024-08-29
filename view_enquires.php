<?php
session_start();

if (!isset($_SESSION['admin_loggedin'])) {
    header("Location: admin_login.php");
    exit;
}

// Database connection
include 'inc/db_connect.php';

// Fetch enquiries from the database
$sql = "SELECT id, name, email, location, date, message, created_at, response_sent FROM enquiry";
$result = $conn->query($sql);

$enquiries = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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
    <title>View Enquiries - Malcolm Lismore Photography</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            padding-bottom: 80px; /* Ensure enough space for the footer */
        }

        header {
            background-color: #003d34;
            color: #ffffff;
            padding: 20px;
            height: 100px;
            text-align: center;
            position: relative;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            height: 100px; /* Adjust height as needed */
        }

        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .enquiry {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .enquiry:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            transform: scale(1.02);
        }

        .enquiry h3 {
            margin-top: 0;
            color: #003d34;
            font-size: 1.4em;
        }

        .enquiry p {
            margin: 10px 0;
            line-height: 1.6;
        }

        .respond-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #003d34;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-align: center;
            margin-right: 10px;
        }

        .respond-btn:hover {
            background-color: #a0d6b4;
            color: #003d34;
        }

        .status-indicator {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            color: #ffffff;
            font-weight: bold;
            text-align: center;
        }

        .status-indicator.pending {
            background-color: #e74c3c;
        }

        .status-indicator.sent {
            background-color: #2ecc71;
        }

        footer {
            background-color: #003d34;
            color: #ffffff;
            text-align: center;
            padding: 20px;
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #a0d6b4;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <img src="images/malcome lismore logo.png" alt="Malcolm Lismore Photography Logo" class="logo">
        <h1>View Enquiries - Malcolm Lismore Photography</h1>
    </header>
    <div class="container">
        <?php foreach ($enquiries as $enquiry): ?>
            <div class="enquiry">
                <h3>Enquiry from <?php echo htmlspecialchars($enquiry['name']); ?></h3>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($enquiry['email']); ?></p>
                <p><strong>Location:</strong> <?php echo htmlspecialchars($enquiry['location']); ?></p>
                <p><strong>Date:</strong> <?php echo htmlspecialchars($enquiry['date']); ?></p>
                <p><strong>Message:</strong> <?php echo nl2br(htmlspecialchars($enquiry['message'])); ?></p>
                <a href="#" class="respond-btn" data-id="<?php echo $enquiry['id']; ?>" data-email="<?php echo htmlspecialchars($enquiry['email']); ?>">Send Response</a>
                <div class="status-indicator <?php echo $enquiry['response_sent'] ? 'sent' : 'pending'; ?>" id="status-<?php echo $enquiry['id']; ?>">
                    <?php echo $enquiry['response_sent'] ? 'Response Sent' : 'Pending Response'; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <footer>
        <p>&copy; 2024 Malcolm Lismore Photography. All rights reserved.</p>
        <p>Contact us: <a href="mailto:info@malcolmlismorephotography.com">info@malcolmlismorephotography.com</a> | Call: +44 123 456 789</p>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.respond-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    let enquiryId = this.getAttribute('data-id');
                    let email = this.getAttribute('data-email');
                    let statusIndicator = document.getElementById('status-' + enquiryId);

                    // Open the Outlook draft
                    window.location.href = `mailto:${email}?subject=Response%20to%20Your%20Enquiry`;

                    // Update the status indicator
                    fetch('update_response_status.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            'enquiry_id': enquiryId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            statusIndicator.textContent = 'Response Sent';
                            statusIndicator.classList.remove('pending');
                            statusIndicator.classList.add('sent');
                        } else {
                            alert('Failed to update status: ' + (data.message || 'Unknown error'));
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
