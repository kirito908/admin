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