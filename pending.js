document.addEventListener("DOMContentLoaded", function() {
    // Fetch pending requests when the page loads
    fetchPendingRequests();

    // Function to fetch pending requests from the server
    function fetchPendingRequests() {
        fetch("get_pending_requests.php")
            .then(response => response.json())
            .then(data => {
                displayPendingRequests(data);
            })
            .catch(error => console.error("Error fetching pending requests:", error));
    }

    // Function to display pending requests
    function displayPendingRequests(requests) {
        const pendingRequestsDiv = document.getElementById("pending-requests");
        pendingRequestsDiv.innerHTML = ""; // Clear previous content

        if (requests.length === 0) {
            pendingRequestsDiv.innerHTML = "<p>No pending requests</p>";
        } else {
            requests.forEach(request => {
                const requestDiv = document.createElement("div");
                requestDiv.classList.add("request");

                const info = document.createElement("p");
                info.textContent = `Appointment ID: ${request.id}, Customer Name: ${request.customer_name}, Service: ${request.service}`;

                const acceptButton = document.createElement("button");
                acceptButton.textContent = "Accept";
                acceptButton.addEventListener("click", () => {
                    handleAction(request.id, "accept");
                });

                const cancelButton = document.createElement("button");
                cancelButton.textContent = "Cancel";
                cancelButton.addEventListener("click", () => {
                    handleAction(request.id, "cancel");
                });

                requestDiv.appendChild(info);
                requestDiv.appendChild(acceptButton);
                requestDiv.appendChild(cancelButton);

                pendingRequestsDiv.appendChild(requestDiv);
            });
        }
    }

    // Function to handle accepting or canceling a request
    function handleAction(appointmentId, action) {
        fetch("handle_request.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ id: appointmentId, action: action })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                fetchPendingRequests(); // Refresh pending requests after action
            } else {
                console.error("Error:", data.message);
            }
        })
        .catch(error => console.error("Error handling action:", error));
    }
});
