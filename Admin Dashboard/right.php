
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
                        <p>Yo, <b>RupKoPes</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="/BBMS/images/rupkopes.jpg" alt="Profile">
                    </div>
                </div>
            </div>
            <!------------------------------------- End of Top --------------------------------------->
            <div class="recent-updates">
                <h2>Comments&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="comments/comments.php"><span class="material-symbols-sharp">draw</span></a></h2>
                <div class="updates">
                

                <?php
// Include database connection
include_once("comments/comment_connect.php");

// Fetch comments from the database, limited to four latest comments
$sql = "SELECT * FROM comments ORDER BY id DESC LIMIT 4";
$result = mysqli_query($conn, $sql);

// Check if there are any comments
if (mysqli_num_rows($result) > 0) {
    // Loop through each row of the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Get the current time on your laptop
        $current_time = new DateTime();

        // Get the timestamp from the database
        $timestamp = new DateTime($row['timestamp']);

        // Calculate the time difference
        $interval = $current_time->diff($timestamp);

        // Convert the time difference to a human-readable format
        $time_message = "";
        if ($interval->y > 0) {
            $time_message = $interval->y . " year" . ($interval->y > 1 ? 's' : '') . " ago";
        } elseif ($interval->m > 0) {
            $time_message = $interval->m . " month" . ($interval->m > 1 ? 's' : '') . " ago";
        } elseif ($interval->d > 0) {
            $time_message = $interval->d . " day" . ($interval->d > 1 ? 's' : '') . " ago";
        } elseif ($interval->h > 0) {
            $time_message = $interval->h . " hour" . ($interval->h > 1 ? 's' : '') . " ago";
        } elseif ($interval->i > 0) {
            $time_message = $interval->i . " minute" . ($interval->i > 1 ? 's' : '') . " ago";
        } else {
            $time_message = $interval->s . " second" . ($interval->s > 1 ? 's' : '') . " ago";
        }

        ?>
        <div class="update">
            <div class="profile-photo">
                <img src="/BBMS/images/<?php echo $row['photo']; ?>">
            </div>
            <div class="message">
                <p><b><?php echo $row['name']; ?></b> <?php echo $row['message']; ?></p>
                <small class="text-muted"><?php echo $time_message; ?></small>
            </div>
        </div>
        <?php
    }
} else {
    echo "<span style='color:pink;'>No comments found.</span>";
}

// Close database connection
mysqli_close($conn);
?>



                </div>
            </div>

            <!--------------------------- End of Comments ------------------------------>
        </div>