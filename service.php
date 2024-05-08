<?php
// Include database connection
include('includes/dbconnection.php');

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

<script>
    // JavaScript code to handle edit button click
    const editButtons = document.querySelectorAll('.edit-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const serviceId = button.getAttribute('data-id');
            // Call a function to handle editing the service with the given ID
            editService(serviceId);
        });
    });

    // JavaScript code to handle delete button click
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            const serviceId = button.getAttribute('data-id');
            // Call a function to confirm deletion and delete the service with the given ID
            deleteService(serviceId);
        });
    });

    // Function to handle editing a service
    function editService(serviceId) {
        // Implement logic to handle editing the service with the given ID
        console.log('Editing service with ID:', serviceId);
    }

    // Function to handle deleting a service
    function deleteService(serviceId) {
        // Implement logic to confirm deletion and delete the service with the given ID
        if (confirm('Are you sure you want to delete this service?')) {
            console.log('Deleting service with ID:', serviceId);
            // Call a function to send a request to the server to delete the service
            // You can use AJAX or fetch API to send the delete request
        }
    }
</script>

