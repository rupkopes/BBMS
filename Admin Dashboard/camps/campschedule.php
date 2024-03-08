<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Camp</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp">
    <link rel="stylesheet" href="../style.css">
    <style>

        header {
            background-color: #2c3e50;
            color: #ecf0f1;
            text-align: center;
            padding: 10px;
            margin: 0 20vw 1vw 1.5vw;
            width: 57.5vw;
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

                /* Styling for upcoming camps */
                .upcoming {
            background-color: #ffcccc; /* Red */
        }

        /* Styling for past camps */
        .past {
            background-color: #ccffcc; /* Green */
        }

        .button-link {
            display: inline-block;
            padding: 8.7px 19px;
            margin-left: 10px;
            background-color: #2c3e50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-link:hover {
            background-color: green;
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
        <h1>Upcoming Blood Donation Camps</h1>
    </header>

    <div class="containers">
        <!-- Form for adding new camp details -->
        <div class="camp">
            <h2 class="add">Add New Camp</h2>
            <br><br>
            <form id="campForm" method="post" action="/BBMS/Staff Dashboard/staff-bbms/camp/insert_camp.php">
                <label for="campName">Camp Name:</label>
                <input type="text" id="campName" name="campName" required><br><br>
                <label for="campConductedBy">Camp Conducted By:</label>
                <input type="text" id="campConductedBy" name="campConductedBy" required><br><br>


                <label for="campDate">Date:</label>
                <input type="date" id="campDate" name="campDate" required><br><br>

                <label for="campTime">Time:</label>
                <select id="campTimeHour" name="campTimeHour" required>
                    <option value="00">00</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>

                </select>
                :
                <select id="campTimeMinute" name="campTimeMinute" required>
                    <option value="00">00</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                    <!-- Add more options for minutes if needed -->
                </select>
                <select id="campTimePeriod" name="campTimePeriod" required>
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                </select>
                <br><br>


                <label for="campLocation">Location:</label>
                <input type="text" id="campLocation" name="campLocation" required><br><br>

                <label for="campContact">Contact:</label>
                <input type="text" id="campContact" name="campContact" required><br><br>

                <button type="submit">Add Camp</button>
                <button type="reset" class="reset">Reset Data</button>
                     <a href="#show_list" class="button-link">View Camps</a>
            </form>
        </div>
    </div>

            <!-- Display retrieved camps -->
    <h1 id="show_list" class="list">List of Camps</h1>
    <div class="containers">
        <div class="camp">
    

<!-- <h2 id="show_list" class="list">List of Camps</h2> -->
        <!-- <h1 id="show_list" class="list">List of Camps</h1> -->
<form method="get" action="" class="search">
    <label for="search-date">Search by Date:</label>
    <input type="date" id="search-date" name="search_date">
    <button type="submit">Search</button>
</form>
 <br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Blood_Bank_Management_System";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve search date if submitted
$search_date = isset($_GET['search_date']) ? $_GET['search_date'] : '';

// Retrieve camps from the database
if (!empty($search_date)) {
$sql = "SELECT * FROM camps WHERE date = '$search_date'";
} else {
$sql = "SELECT * FROM camps";
}
$result = $conn->query($sql);

// Display camps
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    $camp_date = strtotime($row["date"]);
    $today_date = strtotime(date("Y-m-d"));

    // Check if the camp date has passed
    $class = ($camp_date < $today_date) ? 'past' : 'upcoming';

    echo "<div class='camp $class'>";
    echo "<h2>" . $row["name"] . "</h2>";
    echo "<p>Date: " . $row["date"] . "</p>";
    echo "<p>Time: " . $row["time"] . "</p>";
    echo "<p>Location: " . $row["location"] . "</p>";
    echo "<p>Contact: " . $row["contact"] . "</p>";
    // Display Camp Conducted By
    echo "<p>Camp Conducted By: " . $row["campConductedBy"] . "</p>";
    // Add a delete button for each camp
    echo "<form style='display: inline-block; margin-right: 10px;' method='post' action='/BBMS/Staff Dashboard/staff-bbms/camp/delete_camp.php'>";
    echo "<input type='hidden' name='camp_id' value='" . $row["id"] . "'>";
    echo "<button type='submit'>Delete</button>";
    echo "</form>";

    // Only show detail button if the camp is green (past)
    if ($class === 'past') {
        // Add a detail button for each camp
        echo "<form style='display: inline-block;' method='get' action='camp_detail.php'>";
        echo "<input type='hidden' name='camp_id' value='" . $row["id"] . "'>"; // Assuming "id" is the camp identifier
        echo "<button type='submit'>Detail</button>";
        echo "</form>";
    }
    echo "</div>";
}
} else {
// Display message if no camps are found
echo "<div class='camp'>";
echo "<p>No camps found</p>";
echo "</div>";
}

// Close connection
$conn->close();
?>
    </div>
</div>
</main>

    <?php
        include_once("../right.php");        
    ?>

        
        
    <!---------------------- order.js must be before script.js -------------->
    <script src="../order.js"></script> 
    <script src="../script.js"></script> 
</body>

</html>