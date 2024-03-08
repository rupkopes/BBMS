<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Camp</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../style.css">
    <style>
       /* Style the form container */
.form {
  width: 300px;
  margin-left: 200px;
  /* justify-content: center; */
  /* text-align: center; */
}

header {
    /* margin-left: 350px; */
    /* justify-content: center; */
    text-align: center;
}

/* Style labels */
.form label {
  display: inline-block;
  width: 80px;
  font-weight: bold;
}

/* Style input fields */
.form input[type="number"] {
  width: 150px;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 10px;
}

/* Style submit button */
.form input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #2c3e50;
  color: white;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

/* Style submit button on hover */
.form input[type="submit"]:hover {
  background-color: #45a049;
}


        .blood{
            margin-left: 350px;
        }

        #message {
            margin-left: 350px;
            color: green;
            font-size: large;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            /* margin-left: 340px; */
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #2c3e50;
            color: #ccc;
        }

        tr:hover {
            background-color: #ddd;
        }







        
        .camp {
            /* color: #2c3e50; */
            color: grey;
            background-color: var(--color-background);
            border: 2px solid;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;

        }

        .camp h2 {
            color: #2c3e50;
        }

        .camp label {
            color: #2c3e50;
        }

        .camp input,
        .camp select {
            background-color: #fff;
            border: 1px solid #ccc;
            color: #2c3e50;
        }

        .camp button {
            background-color: #2c3e50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .camp button:hover {
            background-color: blue;
        }

        .camp .reset {
            background-color: #2c3e50;
            color: white;
        }

        .camp .reset:hover {
            background-color: red;
        }

        .camp a {
            color: white;
        }

        input[type="text"] {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            font-family:'Courier New', Courier, monospace;
        }

        button[type="submit"],
        button[type="reset"] {
            margin: 10px;
        }

        button {
            padding: 10px 10px;
            background-color: #2c3e50;
            color: #fff;
        }

        .search {
            margin-left: 350px;
        }

        .camp p {
            margin: 5px 0;
            color: #333;
        }

        .list {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 10px;
            margin: 3vw 20vw 0.5vw 1.5vw;
            width: 57.5vw;
        }
    
        .containers {
            padding: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease-in-out;
            margin: 0 20vw 0 1.5vw;
            width: 57.5vw;
            /* background-color: var(--color-background1); */
            border: 2px solid;
        }


        
        </style>
</head>
<body>

<div class="bbms">

<?php
    include_once("../left.php");        
?>    


    <main>

<header>
<h1>Blood Types - Total Blood Collected</h1>
</header>

<div class="containers">
<div class="camp">
<form method="post" class="form">
    <label for="blood_type_Aplus">A+:</label>
    <input type="number" id="blood_type_Aplus" name="blood_type_Aplus" min="0"><br><br>
    
    <label for="blood_type_Aminus">A-:</label>
    <input type="number" id="blood_type_Aminus" name="blood_type_Aminus" min="0"><br><br>
    
    <label for="blood_type_Bplus">B+:</label>
    <input type="number" id="blood_type_Bplus" name="blood_type_Bplus" min="0"><br><br>
    
    <label for="blood_type_Bminus">B-:</label>
    <input type="number" id="blood_type_Bminus" name="blood_type_Bminus" min="0"><br><br>
    
    <label for="blood_type_ABplus">AB+:</label>
    <input type="number" id="blood_type_ABplus" name="blood_type_ABplus" min="0"><br><br>
    
    <label for="blood_type_ABminus">AB-:</label>
    <input type="number" id="blood_type_ABminus" name="blood_type_ABminus" min="0"><br><br>
    
    <label for="blood_type_Oplus">O+:</label>
    <input type="number" id="blood_type_Oplus" name="blood_type_Oplus" min="0"><br><br>
    
    <label for="blood_type_Ominus">O-:</label>
    <input type="number" id="blood_type_Ominus" name="blood_type_Ominus" min="0"><br><br>

    <input type="submit" value="Submit">
</form>
    </div>
    </div>

    <div class="containers">
<div class="camp">

<div id="message"></div> <!-- This div will display the success message -->

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "Blood_Bank_Management_System";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blood_types = [
        'A+' => $_POST['blood_type_Aplus'],
        'A-' => $_POST['blood_type_Aminus'],
        'B+' => $_POST['blood_type_Bplus'],
        'B-' => $_POST['blood_type_Bminus'],
        'AB+' => $_POST['blood_type_ABplus'],
        'AB-' => $_POST['blood_type_ABminus'],
        'O+' => $_POST['blood_type_Oplus'],
        'O-' => $_POST['blood_type_Ominus']
    ];

    foreach ($blood_types as $type => $units) {
        // Update blood inventory for each blood type
        $update_sql = "UPDATE blood_inventory SET available_units = available_units + ? WHERE blood_type = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("is", $units, $type);
        if ($update_stmt->execute()) {
            echo "Units for blood type $type updated successfully.<br>";
        } else {
            echo "Error updating units for blood type $type: " . $conn->error . "<br>";
        }
        $update_stmt->close();
    }
    // Display success message
    echo '<script>document.getElementById("message").innerHTML = "Units are added successfully";</script>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blood_types = [
        'A+' => $_POST['blood_type_Aplus'],
        'A-' => $_POST['blood_type_Aminus'],
        'B+' => $_POST['blood_type_Bplus'],
        'B-' => $_POST['blood_type_Bminus'],
        'AB+' => $_POST['blood_type_ABplus'],
        'AB-' => $_POST['blood_type_ABminus'],
        'O+' => $_POST['blood_type_Oplus'],
        'O-' => $_POST['blood_type_Ominus']
    ];

    foreach ($blood_types as $type => $units) {
        // Insert data into blood_inventory table
        $insert_sql = "INSERT INTO camp_inventory (blood_type, available_units) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("si", $type, $units);
        if ($insert_stmt->execute()) {
            echo "Units for blood type $type inserted successfully.<br>";
        } else {
            echo "Error inserting units for blood type $type: " . $conn->error . "<br>";
        }
        $insert_stmt->close();
    }
    // Display success message
    echo '<script>document.getElementById("message").innerHTML = "Units are added successfully";</script>';
}


// Close connection
$conn->close();
?>
<br>
<br>
 <table>
        <tr>
            <th>Blood Type</th>
            <th>Collected Blood Units</th>
        </tr>
        <?php
        // PHP code to fetch data from the database and populate the table
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "Blood_Bank_Management_System";

        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM camp_inventory";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["blood_type"] . "</td><td>" . $row["available_units"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>0 results</td></tr>";
        }
        $conn->close();
        ?>
    </table>

    </div>
</div>
</main>

    <?php
        include_once("../right.php");        
    ?>

    <script>
        // JavaScript code to remove the message after 3 seconds
        setTimeout(function(){
            var message = document.getElementById('message');
            if (message) {
                message.parentNode.removeChild(message);
            }
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>

    <script src="../order.js"></script>
    <script src="../script.js"></script>
    </body>

</html>
