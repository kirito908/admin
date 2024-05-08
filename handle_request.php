<?php
// Include database connection
include('includes/dbconnection.php');

// Get appointment ID and action from POST request
$data = json_decode(file_get_contents("php://input"), true);
$appointmentId = $data['id'];
$action = $data['action'];

// Update appointment status based on action
if ($action === 'accept') {
    $sql = "UPDATE appointments SET status = 'accepted' WHERE id = '$appointmentId'";
} elseif ($action === 'cancel') {
    $sql = "UPDATE appointments SET status = 'canceled' WHERE id = '$appointmentId'";
}

// Execute SQL query
if ($conn->query($sql) === TRUE) {
    // Return success response
    echo json_encode(array('success' => true));
} else {
    // Return error response
    echo json_encode(array('success' => false, 'message' a=> 'Error updating appointment status'));
}
?>
