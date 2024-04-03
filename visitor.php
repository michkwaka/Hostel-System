<?php
include 'Connection.php';
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $date = $_POST['date_of_arrival'];
    $time = $_POST['time_of_arrival'];
    
    // Insert invitation details into the database
    $sql = "INSERT INTO visitors (email, date_of_arrival, time_of_arrival) 
            VALUES ('$email', '$date', '$time')";
    if ($conn->query($sql) === TRUE) {
        // Send invitation email
        $subject = "Invitation to Hostel";
        $message = "You have been invited to the hostel. Date: $date, Time: $time";
        $headers = "From: your_email@example.com";
        mail($email, $subject, $message, $headers);

        echo "Invitation sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invite Visitor</title>
    <link rel="stylesheet" type="text/css" href="visitor.css">
</head>
<body>
    <div>
        <div class="navbar-container">
     <ul class="navbar">
        <li><a href="home.html">Home</a></li>       
    <li><a href="Profile.php">Profile</a></li>

    </ul>
</div>
    <h1>Invite Visitor</h1>
    <form action="invite.php" method="post">
        <label for="email">Visitor's Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="date">Date of Arrival:</label>
        <input type="date" id="date" name="date" required><br>
        <label for="time">Time of Arrival:</label>
        <input type="time" id="time" name="time" required><br>
        <button type="submit">Invite</button>
    </form>
</body>
</html>