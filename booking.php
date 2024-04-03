<?php
// Process booking
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];

    // Save booking details to database or perform other actions
    // Here, we're just echoing a message
    echo "Booking confirmed for $name from $checkin to $checkout";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking</title>
    <link rel="stylesheet" type="text/css" href="booking.css">

</head>
<body>
    <div class="navbar-container">
    <ul class="navbar">
        <li><a href="home.html">Home</a></li>       
        <li><a href="User.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
</div>
    <div class="container1">
    <img src="room1.jpg" width="250"><img src="twinroom.jpg" width="270"><img src="Premium.jpg" width="290">

<h3>Select Your desired room:</h3>
 <select>
 <option>Premium Room</option>
 <option>Cluster Room</option>
 <option>Twin Room</option>
</select>
<form action="book.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required placeholder="Enter your Fullname">
            <label>Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email address">
            <label>Phone number:</label>
            <input type="number" name="number" id="number" required placeholder="Enter your PhoneNumber">
            <label for="checkin">Check-in Date:</label>
            <input type="date" id="checkin" name="checkin" required>
            <label for="checkout">Check-out Date:</label>
            <input type="date" id="checkout" name="checkout" required>
            <button type="submit">Book Now</button>
        </form>
        <div id="message"></div>
    </div>
</body>
</html>