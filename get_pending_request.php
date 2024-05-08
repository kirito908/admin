<?php
// Include database connection
include('includes/dbconnection.php');

// Fetch pending requests from the database
$sql = "SELECT * FROM appointments WHERE status = 'pending'";
$result = $conn->query($sql);

$requests = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $requests[] = $row;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($requests);
?>
