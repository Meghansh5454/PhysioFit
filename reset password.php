<?php include('config.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="icon" type="image/png" href="image/logo6.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <style>

      body {
        text-transform: uppercase;
        background-image: url('image/1.jpg');
        background-attachment: fixed;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
      }
      a {
        margin-left: 20px;
        text-decoration: none;
        color: purple;
      }

      .container {
        background-color: rgba(53, 53, 53, 0.35);
        color: white;
        position: absolute;
        top: 55%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        border-radius: 10px;
        cursor: default;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }

      .logo1 {
        height: 100px;
        display: block;
        margin: 0 auto;
      }

      .container h1 {
        justify-content: center;
        width: 75px;
        height: 80px;
      }

      .container form {
        padding: 0 40px;
        box-sizing: border-box;
      }

      .txt_field {
        display: flex; /* Added */
        align-items: center; /* Added */
        position: relative;
        border-bottom: 2px solid white;
        margin: 30px 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }

      .txt_field input {
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
        caret-color: white;
        color: white;
      }

      .txt_field label {
        position: absolute;
        top: 50%;
        left: 5px;
        color: white;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
        transition: .5s;
      }

      .txt_field span::before {
        content: '';
        position: absolute;
        top: 40px;
        left: 0;
        width: 0%;
        height: 2px;
        background: gray;
      }

      .txt_field input:focus ~ label,
      .txt_field input:valid ~ label {
        top: -5px;
        color: white;
      }

      .txt_field input:focus ~ span::before,
      .txt_field input:valid ~ span::before {
        width: 100%;
      }

      .txt_field button {
        background: none;
        border: none;
        cursor: pointer;
      }

      input[type="submit"] {
        width: 100%;
        height: 50px;
        border: 1px solid;
        background: #AE445A;
        border-radius: 25px;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        outline: none;
        color: #fff;
      }

      input[type="submit"]:hover {
        border-color: white;
        transition: .5s;
      }

      .signup_link {
        margin: 30px 0;
        text-align: container;
        font-size: 16px;
        color: white;
      }

      .signup_link a {
        text-decoration: none;
        color: white;
      }

      .signup_link a:hover {
        text-decoration: underline;
        color: whitesmoke;
      }
      p {
        font-size: medium;
        background-color: white;
        color: rgb(26, 26, 107);
        margin-left: 70px;
        margin-right: 70px;
      }

      nav {
        width: 100%;
        height: 10vh;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-transform: uppercase;
        position: fixed;
      }

      .bg1 {
        width: 100%;
        height: 100vh;
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-origin: content-box;
        background-position: center center;
        margin: auto;
        background-color: rgba(0, 0, 0, 0.5);
      }

      .nav-links {
        display: flex;
        list-style: none;
        text-decoration: none;
      }

      .nav-links li {
        padding: 10px 15px;
        margin: 0 10px;
        position: relative;
        text-decoration: none;
      }

      .nav-links li::before,
      .nav-links li::after {
        position: absolute;
        content: '';
        width: 0;
        height: 2px;
        background-color: #fff;
        transition: 0.5s all ease-in-out;
        left: 0;
      }

      .nav-links li::before {
        bottom: 0;
      }

      .nav-links li.active::before,
      .nav-links li:hover::before {
        right: 0;
        left: auto;
        width: 100%;
        background-color: #fff;
      }

      .nav-links ul li.active::after,
      .nav-links ul li:hover::after {
        right: auto;
        left: 0;
        width: 100%;
        background-color: #fff;
      }

      .nav-links li a {
        text-decoration: none;
        display: flex;
        color: #fff;
        font-size: 20px;
        transition: 0.5s all ease-in-out;
      }

      .nav-links li.active a,
      .nav-links li:hover a {
        color: #fff;
        display: flex;
      }

    </style>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var passwordField = document.getElementById('password');
    var eyeIcon = document.getElementById('eyeIcon');

    function togglePasswordVisibility() {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    }

    // Initially set the eye icon to 'fa-eye-slash'
    eyeIcon.classList.add('fa-eye-slash');

    // Attach event listener to the button
    document.getElementById('showPasswordBtn').addEventListener('click', togglePasswordVisibility);
});
</script>
</head>
<body>
<div class="bg1">
  <nav class="navbar">
      <a href="main.php"target="_self">
      <div class="logo">
        <img src="image/logo6.png" width="100px">
      </div>
      </a>
      <ul class="nav-links">
        <li><a href="main.php" target="_self">Home</a></li>
        <li><a href="about us main.php">About US</a></li>
        <li><a href="contact us main.php">Contact</a></li>
      </ul>
    </nav>
  </div>
  
    <div class="container">
    <img class="logo1" src="image\logo6.png">
    <?php
    if (isset($_POST['submit'])) {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $new_password = isset($_POST['pass']) ? $_POST['pass'] : '';

        // Check if the username exists in the database
        $query = mysqli_query($db_conn, "SELECT * FROM signup WHERE username='$username'");
        $user = mysqli_fetch_assoc($query);

        if ($user) {
            // Hash the new password
            $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the hashed password for the given username
            $update_query = mysqli_query($db_conn, "UPDATE signup SET pass='$new_password_hashed' WHERE username='$username'");
            if ($update_query) {
                echo "<p>Password reset successfully!</p>";
            } else {
                echo "<p>Error updating password. Please try again later.</p>";
            }
        } else {
            echo "<p>Username not found.</p>";
        }
    }
    ?>
        
        <form method="post">
            <div class="txt_field">
                <input type="text" name="username"  required>
                <label>Username</label>
            </div>
            <div class="txt_field">
                      <input type="password" maxlength="20" name="pass" id="password" required>
                      <label> New Password</label>
                      <button type="button" id="showPasswordBtn" onclick="togglePasswordVisibility()"
                              style="border: none; background: none;">
                          <i id="eyeIcon" class="far fa-eye" style="color: white;"></i>
                      </button>
                  </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Reset Password">
            </div>  
        </form>
        <div class="signup_link">
            <a href="login.php">Back to Login</a>
        </div>
    </div>
    </div>
  
</body>
</html>
