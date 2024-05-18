<?php
// Include database connection
include('dbconnection.php');

// Function to fetch service details
function getServiceDetails() {
    global $conn;
    $services = array();
    $sql = "SELECT * FROM services";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $services[] = $row;
        }
    }
    return $services;
}

// Call the function to get service details
$serviceDetails = getServiceDetails();
?>

<!-- Display service details on admin dashboard -->
<div class="services">
    <h2>Services</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Service Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($serviceDetails as $service) { ?>
                <tr>
                    <td><?= $service['id'] ?></td>
                    <td><?= $service['service_name'] ?></td>
                    <td><?= $service['price'] ?></td>
                    <td>
                        <button class="edit-btn" data-id="<?= $service['id'] ?>">Edit</button>
                        <button class="delete-btn" data-id="<?= $service['id'] ?>">Delete</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="service.js"></script>

