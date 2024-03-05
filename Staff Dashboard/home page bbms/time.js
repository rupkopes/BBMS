function updateDateTime() {
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();

    // Ensure two digits for hours, minutes, and seconds
    hours = (hours < 10) ? "0" + hours : hours;
    minutes = (minutes < 10) ? "0" + minutes : minutes;
    seconds = (seconds < 10) ? "0" + seconds : seconds;

    // Display the current time in the specified format
    var formattedTime = hours + ":" + minutes + ":" + seconds;

    // Update the content of the div for current time
    document.getElementById("current-time").innerHTML = "Current Time: " + formattedTime;

    // Display today's date
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    var formattedDate = currentTime.toLocaleDateString('en-US', options);
    
    // Update the content of the div for today's date
    document.getElementById("current-date").innerHTML = "Today's Date: " + formattedDate;

    // Update the time and date every second (1000 milliseconds)
    setTimeout(updateDateTime, 1000);
}

// Call the updateDateTime function to initiate the update
updateDateTime();