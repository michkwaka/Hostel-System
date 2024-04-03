<?php
  include "Connection.php";
  $unsuccess = 0;
  if ($_SERVER['REQUEST_METHOD']=='POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM signup WHERE email='$email'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
      // check if there is any record from executing the query
      if (mysqli_num_rows($result)>0) {
        // check if passwords match
        // fetch the password hash from db
        $account = mysqli_fetch_assoc($result);
        $password_hash = $account['password'];
        //password_verify() - compares the hash password with the password the user has inputed
        if (password_verify($password, $password_hash)) {
          //echo "Login successful";
          //sessions - to store user data(in variables) accross multiple pages
          session_start();//start user session
          $_SESSION['email'] = $email;
          $_SESSION['id'] = $account['id'];
          header("location:User.php");
        }else{
          // echo "Invalid login";
          $unsuccess = 1;
        }
      }
    }

  }



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">

 

</head>
<body>
  <div class="navbar-container">
    <ul class="navbar">
        <li><a href="home.html">Home</a></li>       
        <li><a href="booking.php">Booking</a></li>
        <li><a href="Profile.php">Profile</a></li>
    </ul>
</div>
	<div class="container">
		<h1 id="log">Login</h1>

		<form method="post" id="LogInForm" class="container1">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
  </div>
  <?php
    if ($unsuccess) {
      echo "<div class='error'>Invalid login</div>";
    }
    
  ?>
  <button type="submit" class="loginbutton" >Login</button>
</form>
<div>Don't have an account?
	<a href="User.php">Sign Up</a>
</div>

	</div>

</body>
</html>