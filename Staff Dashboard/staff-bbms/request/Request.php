<?php
            include_once("../profile_name.php");        
        ?>    


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBMS Staff</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        /* Basic CSS styles for the application */
        .body1 {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        /* header {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 10px;
            margin-bottom: 10px;
        } */
        
        

        h1 {
            margin: 0;
        }
        .blood-request {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            
        }
        .approved {
            background-color: #8BC34A; /* Green */
            color: #fff;
        }
        .unapproved {
            background-color: #FF5733; /* Red */
            color: #fff;
        }
        .pending {
            background-color: #3498db; /* Blue */
            color: #fff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        
        th {
            background-color: #2c3e50;
            color: #ccc;
        }
        button {
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }

        .request{
            max-width: 800px;
            padding: 20px;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
            background-color: var(--color-white); /* Change section background color using CSS variables */
            border-radius: var(--card-border-radius); /* Utilize CSS variable for border radius */
            box-shadow: var(--box-shadow); /* Utilize CSS variable for box shadow */
        }  
        

        label {
            font-weight: bold;
            font-size: 14px;
            
        }


        input[type="text"],
        input[type="number"] {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 20px;
        }
        #searchHospital{
            /* margin-left: 340px; */
            font-family: Arial, sans-serif;
            width: 71%;
        }
        button.delete {
    background-color: #e74c3c;
}

#bloodType{
    width: 100%;
    font-size: 18px;
}

    </style>
</head>
<body>
    <div class="bbms">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../logo1.png" alt="person">
                    <h2>BB<span class="danger">MS</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-sharp">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="../index.php">
                    <span class="material-symbols-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../inventory/Inventory.php">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Available Blood Inventory</h3>
                </a>
                <a href="../appointment/Appointment.php">
                    <span class="material-symbols-sharp">calendar_today</span>
                    <h3>Appointment</h3>
                </a>
                <a href="../donor/Donor.php">
                    <span class="material-symbols-sharp">person</span>
                    <h3>Donor Records</h3>
                </a>
                <a href="../camp/Camp.php">
                    <span class="material-symbols-sharp">campaign</span>
                    <h3>Camps</h3>
                </a>
                <a href="Request.php"  class="active">
                    <span class="material-symbols-sharp">local_hospital</span>
                    <h3>Blood Request by Hospital</h3>
                </a>
                <a href="../receiver/receiver.php">
                    <span class="material-symbols-sharp">local_hospital</span>
                    <h3>Blood Request by User</h3>
                </a>
                <a href="../request_inventory/request_inventory.php">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Blood Request Inventory</h3>
                </a>
                <a href="../request_inventory/all.php">
                    <span class="material-symbols-sharp">bloodtype</span>
                    <h3>Available And Request Blood Inventory</h3>
                </a>
                <a href="../logout/logout.php" id="logout-btn">
                    <span class="material-symbols-sharp">logout</span>
                    <h3>Logout</h3>
                </a>

            </div>
        </aside>


    <main>
        <div class="date">
            <div class="current-time" id="current-time"></div>

            <div class="current-date" id="current-date"></div>

            <script src="../../home page bbms/time.js"></script>
        </div>
    <br>
    <br>

<header>
    <h1>Blood Request Management-Hospital</h1>
</header>
<br>
<br>


<div id="addRequestForm" class="request">
    <h2>Add New Blood Request</h2>
    <br><br>
    <form id="bloodRequestForm">
        <label for="hospital">Hospital:</label>
        <input type="text" id="hospital" name="hospital" required><br><br>
        
        <label for="bloodType">Blood Type:</label>
        <select id="bloodType" name="bloodType" required>
            <option value="" disabled selected>Please select Blood Type</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select><br><br>
        
        <label for="bloodUnits">Blood Units:</label>
        <input type="number" id="bloodUnits" name="bloodUnits" required><br><br>
        
        <button type="submit">Submit</button>
    </form>
</div>

<br>

<div id="bloodRequests">
    <h2>Blood Requests Data For Hospital</h2>
<br>

    <div id="searchHospital">
        <label for="searchHospitalInput" class="search-hospital">Search by Hospital:</label><br><br>
        <input type="text" id="searchHospitalInput" name="searchHospitalInput">
        <br><br>
        <button onclick="searchByHospital()">Search</button>
        
    </div>
    <br>
    <table id="bloodRequestTable">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Hospital</th>
                <th>Blood Type</th>
                <th>Blood Units</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Blood requests will be dynamically added here using JavaScript -->
        </tbody>
    </table>
</div>

<script>
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
                        <td>${request.id}</td>                   
                        <td>${request.hospital}</td>
                        <td>${request.bloodType}</td>
                        <td>${request.bloodUnits}</td>
                        <td class="${getStatusClass(request.status)}">${request.status}</td>
                        <td>
    <button onclick="performAction(${request.id}, 'approve')">Approve</button>
    <button onclick="performAction(${request.id}, 'not_approve')">Not Approve</button>
</td>

                        <!-- Inside the <td> for action -->
<td>
    <button class="delete" onclick="deleteRequest(${request.id})">Delete</button>

</td>

                    `;
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    // Function to add a new blood request
    document.getElementById('bloodRequestForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const hospital = document.getElementById('hospital').value;
        const bloodType = document.getElementById('bloodType').value;
        const bloodUnits = document.getElementById('bloodUnits').value;

        const formData = new FormData();
        formData.append('hospital', hospital);
        formData.append('bloodType', bloodType);
        formData.append('bloodUnits', bloodUnits);

        fetch('add_blood_request.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                alert(data.message);
                displayBloodRequests(); // Update table after successful request addition
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });

        document.getElementById('bloodRequestForm').reset();
    });

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

// Function to delete a blood request
function deleteRequest(requestId) {
    if (confirm('Are you sure you want to delete this request?')) {
        fetch('delete_request.php', {
            method: 'POST',
            body: JSON.stringify({ id: requestId }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                displayBloodRequests(); // Update table after successful deletion
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
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

    // Function to perform action (approve/not approve) for a blood request
function performAction(requestId, action) {
    const newStatus = action === 'approve' ? 'Approved' : 'Not Approved';
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

    // Function to filter blood requests by hospital
    function searchByHospital() {
            const searchValue = document.getElementById('searchHospitalInput').value.toUpperCase();
            const rows = document.getElementById('bloodRequestTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            
            for (let i = 0; i < rows.length; i++) {
                const hospital = rows[i].getElementsByTagName('td')[1].innerText.toUpperCase();
                
                if (hospital.includes(searchValue)) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
        
        // Initial display of blood requests
    displayBloodRequests();

</script>
    </main>

<div class="right">
        <div class="top">
            <button id="menu-btn">
                <span class="material-symbols-sharp">menu</span>
            </button>
            <div class="theme-toggler">
                <span class="material-symbols-sharp active">light_mode</span>
                <span class="material-symbols-sharp">dark_mode</span>
            </div>
            <div class="profile">
                <div class="info">
                    <br>
                    <?php
                    // Check if user is logged in and show appropriate greeting
                    if (isset($_SESSION['username'])) {
                        echo "<p>Yo, <b>" . $userData['first_name'] . "</b></p>";
                        echo "<button class=\"button\" onclick=\"location.href='edit_profile.php';\">Edit Profile</button>";
                    } else {
                        echo "<p>You are not logged in</p>";
                        // Add some debugging information to see if session variables are set
                        var_dump($_SESSION);
                    }
                    ?>
                </div>
                <div class="profile-photo">
    <a href="../edit_profile/edit_profile_page.php?staff_id=<?php echo $_SESSION['staff_id']; ?>">
        <img src="../person.png" alt="Profile">
    </a>
</div>
            </div>
        </div>
        <!-- End of Top -->
    </div>
</div>
    <script src="../script.js"></script>
</body>

</html>