<?php
include('dbconnection.php');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'], $data['service_name'], $data['price'])) {
    $id = $data['id'];
    $service_name = $data['service_name'];
    $price = $data['price'];

    $sql = "UPDATE services SET service_name = ?, price = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sdi', $service_name, $price, $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
