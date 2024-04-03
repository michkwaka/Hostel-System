<?php
include 'Connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $sql = "INSERT INTO profile (username, email, phone_number, profile_picture) 
            VALUES (?, ?, ?, ?)";


    // Prepare and bind the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $phone, $profile_picture);
    if ($stmt->execute()) {
    // Redirect to the user profile page after saving profile updates
    header("Location: userProfile.php?username=" . urlencode($username));
    exit();
}

    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href ="Profile.css">

</head>
<body>
    <div class="navbar-container">
    <ul class="navbar">
        <li><a href="home.html">Home</a></li>       
    </ul>
</div>
<br>
<br>
    <div class="container">
        <h1>Profile:</h1>
        <form id="profile-form" enctype="multipart/form-data" method="post" action="process_profile.php">
            <div class="profile-picture-container">
                <label for="profile-picture">Profile Picture:</label>
                <div class="profile-picture-preview"></div>
                <input type="file" id="profile-picture" name="profile-picture" accept="image/*">
            </div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>
            <div class="document-upload">
                <label for="hostel-agreement">Hostel Agreement:</label>
                <input type="file" id="hostel-agreement" name="hostel-agreement" accept=".pdf">
                <label for="id-document">ID Document:</label>
                <input type="file" id="id-document" name="id-document" accept=".pdf, .jpg, .png">
            </div>
            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>

