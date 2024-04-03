<?php
 include 'Connection.php';
 $success = 0;
 $unsuccess = 0;
 if ($_SERVER['REQUEST_METHOD']=='POST') {
   $email = $_POST['email'];
   $password = $_POST['password'];
   //hash user password - password_hash()
   $password_hash = password_hash($password, PASSWORD_DEFAULT);
   //check if email is already in the db
   $mysql = "SELECT * FROM sign up WHERE email='$email'";
   $myresult = mysqli_query($connect, $mysql);
   if ($myresult) {
     // check if there is any record from executing the query
     //mysqli_num_rows()
     if (mysqli_num_rows($myresult)>0) {
       //echo "Email already exists"; //not successful
       $unsuccess = 1;
     } else{
       $sql = "INSERT INTO accounts(email, password) VALUES('$email','$password_hash')";
       $result = mysqli_query($connect, $sql);
       if ($result) {
         //echo "Signup successful"; //success
         $success = 1;
       } else{
         die(mysqli_error($connect));
       }
     }
   }


   
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="user.css">
</head>
<body>

<nav class="navbar">
    <div class="container">
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="User.php">Sign Up</a></li>
            <li><a href="login.php">Login</a></li>
           
        </ul>
    </div>
</nav>

<div class="container6">
    <h1>Sign Up</h1>
    <form id="signupForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit">Sign Up</button>
    </form>
    <div id="message"></div>
</div>

</body>
</html>