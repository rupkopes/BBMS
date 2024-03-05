// Function to display blood requests
function displayBloodRequests() {
    fetch('get_blood_request.php')
        .then(response => response.json())
        .then(data => {
            const bloodRequestsTable = document.getElementById('bloodRequestTable').getElementsByTagName('tbody')[0];
            bloodRequestsTable.innerHTML = '';

            data.forEach(request => {
                const row = bloodRequestsTable.insertRow();
                row.innerHTML = `
                    <td>${request.hospital}</td>
                    <td>${request.bloodType}</td>
                    <td>${request.bloodUnits}</td>
                    <td class="${getStatusClass(request.status)}">${request.status}</td>
                    <td>
                        <button onclick="toggleApproval(${request.id}, '${request.status}')">${getActionText(request.status)}</button>
                    </td>
                `;
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Function to toggle approval status
function toggleApproval(requestId, currentStatus) {
    const newStatus = currentStatus === 'Approved' ? 'Not Approved' : 'Approved';
    fetch('toggle_approval.php', {
        method: 'POST',
        body: JSON.stringify({ id: requestId, status: newStatus }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            displayBloodRequests(); // Update table after successful status change
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Function to mark a blood request as "Not Approved"
function notApproveRequest(requestId) {
    fetch('toggle_approval.php', {
        method: 'POST',
        body: JSON.stringify({ id: requestId, status: 'Not Approved' }), // Set status to 'Not Approved'
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            displayBloodRequests(); // Update table after successful not approval
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}


// Function to get CSS class based on status
function getStatusClass(status) {
    switch (status) {
        case 'Approved':
            return 'approved';
        case 'Not Approved':
            return 'unapproved';
        case 'Pending':
            return 'pending';
        default:
            return '';
    }
}

// Function to get action button text based on status
function getActionText(status) {
    return status === 'Approved' ? 'Not Approve' : 'Approve';
}

// Initial display of blood requests
displayBloodRequests();
