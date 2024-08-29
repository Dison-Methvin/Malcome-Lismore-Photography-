<?php
session_start();

if (!isset($_SESSION['admin_loggedin'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

include 'inc/db_connect.php';

if (isset($_POST['enquiry_id'])) {
    $enquiry_id = intval($_POST['enquiry_id']);
    
    $sql = "UPDATE enquiry SET response_sent = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $enquiry_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update status']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}

$conn->close();
?>
