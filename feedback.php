<?php
session_start();

// Check if the user is logged in, redirect to login page if not
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Logout logic
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<?php
include('config.php');

$alertMessage = '';

if (isset($_POST['submit'])) {
    $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    $query = mysqli_query($db_conn, "INSERT INTO `feedback` (`full_name`, `username`, `email`, `message`) VALUES ('$full_name', '$username', '$email', '$message')");

    if ($query) {
        $feedbackMessage = "Message sent successfully!";
        echo "<script>alert('$feedbackMessage');</script>";
    } else {
        $alertMessage = "Failed to send the message. Please try again. Error: " . mysqli_error($db_conn);
        exit; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Feedback</title>
    <link rel="icon" type="image/png" href="image/logo6.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>

*{
  margin: 0;
  padding: 0;
  outline: none;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  /* display: flex; */
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  padding: 10px;
  font-family: 'Poppins', sans-serif;
  background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('image/genderbg.jpg');
  background-attachment: fixed;
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
}
.container{
  max-width: 800px;
  background: #fff;
  width: 800px;
  padding: 25px 40px 10px 40px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
  margin-top:110px ;
  margin-left:400px ;
  background-color: rgba(53,53,53,0.35);
}
.container .text{
  text-align: center;
  font-size: 41px;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
  background: -webkit-linear-gradient(right, #f9ce34, #ee2a7b, #f9ce34, #ee2a7b);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  
}
.container form{
  padding: 30px 0 0 0;
}
.container form .form-row{
  display: flex;
  margin: 32px 0;
}
form .form-row .input-data{
  width: 100%;
  height: 40px;
  margin: 0 20px;
  position: relative;
}
form .form-row .textarea{
  height: 70px;
}
.input-data input,
.textarea textarea{
  display: block;
  width: 100%;
  height: 100%;
  border: none;
  font-size: 17px;
  border-bottom: 2px solid rgba(0,0,0, 0.12);
  background: none;
  color:white;
}
.input-data input:focus ~ label, .textarea textarea:focus ~ label,
.input-data input:valid ~ label, .textarea textarea:valid ~ label{
  transform: translateY(-20px);
  font-size: 14px;
  color: #AE445A;
  
}
.textarea textarea{
  resize: none;
  padding-top: 10px;
  background: none;
  color:white;
}
.input-data{
  background: none;
  color:white;
}
.input-data label{
  position: absolute;
  pointer-events: none;
  bottom: 10px;
  font-size: 16px;
  transition: all 0.3s ease;
  background: none;
  
}
.textarea label{
  width: 100%;
  bottom: 40px;
  
  background: none;
}
.input-data .underline{
  position: absolute;
  bottom: 0;
  height: 2px;
  width: 100%;
}
.input-data .underline:before{
  position: absolute;
  content: "";
  height: 2px;
  width: 100%;
  background: #AE445A;
  transform: scaleX(0);
  transform-origin: center;
  transition: transform 0.3s ease;
}
.input-data input:focus ~ .underline:before,
.input-data input:valid ~ .underline:before,
.textarea textarea:focus ~ .underline:before,
.textarea textarea:valid ~ .underline:before{
  transform: scale(1);
  
}
.submit-btn .input-data{
  overflow: hidden;
  height: 45px!important;
  width: 25%!important;
}
.submit-btn .input-data .inner{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right,  #f9ce34, #ee2a7b,#6228d7,#f9349a, #ee2a7b,#6228d7);
  transition: all 0.4s;
}
.submit-btn .input-data:hover .inner{
  left: 0;
}
.submit-btn .input-data input{
  background: none;
  border: none;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  position: relative;
  z-index: 2;
}
nav {
      width: 100%;
      height: 10vh;
      display: flex;
      justify-content: space-between;
      align-items: center;
      text-transform: uppercase;
      position: fixed;
      z-index: 1;
    }
/* .bg1 {
  width: 100%;
  height: 100vh;
  background-size: cover;
  background-attachment: fixed;
  background-repeat: no-repeat;
  background-origin: content-box;
  background-position: center center;
  margin: auto;
  background-color: rgba(0, 0, 0, 0.3);
} */

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
    nav {
            width: 100%;
            height: 10vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            /* text-transform: uppercase; */
            position: fixed;
        }

        .nav-links {
            display: flex;
            list-style: none;
            text-decoration: none;
        }

        .nav-links li {
            padding: 10px 15px;
            margin: -5px 10px;
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

        .profile {
            margin: 0 10px 0 10px;
            cursor: pointer;
        }

        .dropdown {
            display: none;
            position: absolute;
            background-color: #000;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            color: #fff;
            margin-left: -10px; /* Adjusted position */
        }

        .show-dropdown {
            display: block !important;
            margin: 20px 0px 0px -90px ;
        }

        .dropdown-item {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: #fff;
        }

        .dropdown-item:hover {
            background-color: #333;

        } 
        .profile {
        margin: 0 10px 0 10px;
        position: relative;
         }

            .dropdown {
            display: none;
            position: absolute;
            top: 60px;
            right: 0;
            background-color: #1a1a1a; /* Dark background color */
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            color: #fff;
            border-radius: 8px;
            overflow: hidden;
            opacity: 0; /* Hidden by default */
            transform: translateY(-10px); /* Slide up initially */
            transition: opacity 0.3s ease, transform 0.3s ease; /* Added transitions for opacity and transform */
        }

        .show-dropdown {
            display: block !important;
            opacity: 1;
            transform: translateY(0);
        }

        .dropdown-content {
            padding: 10px;
            background-color: #333;
            border-radius: 5px; 
        }

        .name, .mail {
            padding: 12px 16px;
            margin: 0;
            text-decoration: none;
            display: block;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .name:hover, .mail:hover {
            background-color: #555; /* Darker background color on hover */
        }

        .dropdown-item {
            font-size: 20px;
            transition: background-color 0.3s ease, color 0.3s ease; /* Added color transition */
        }

        .dropdown-item:hover {
            background-color: #555; /* Darker background color on hover */
            color: #fff; /* Change text color on hover */
        }
@media (max-width: 700px) {
  .container .text{
    font-size: 30px;
  }
  .container form{
    padding: 10px 0 0 0;
  }
  .container form .form-row{
    display: block;
  }
  form .form-row .input-data{
    margin: 35px 0!important;
  }
  .submit-btn .input-data{
    width: 40%!important;
  }
}
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var profile = document.getElementById('profile');

        profile.addEventListener('click', function () {
            var dropdown = document.querySelector('.dropdown');
            dropdown.classList.toggle('show-dropdown');
        });

        var logoutLink = document.querySelector('.logout-link');
        logoutLink.addEventListener('click', function () {
            // Clear session on the client side
            fetch('logout.php', { method: 'POST' })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Redirect to login page
                        window.location.href = 'login.php';
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>
<script>
    function validateEmail(email) {
        // Regular expression for validating email addresses
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('form');

        form.addEventListener('submit', function (event) {
            var emailInput = document.querySelector('input[name="email"]');
            var email = emailInput.value.trim();

            if (!validateEmail(email)) {
                alert('Please enter a valid email address.');
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>

</head>
<body>

<nav class="navbar">
          <div class="logo">
              <img src="image/logo6.png" width="100px">
          </div>
          <ul class="nav-links">
        <li><a href="main.php" target="_self">Home</a></li>
        <li><a href="about us.php">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li>
            <div class="profile" id="profile">
                <img src="image/profile.png" width="50px" height="40px">
                <div class="dropdown">
                    <h1 class="name">Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
                    <p class="mail">Email: <?php echo $_SESSION["email"]; ?></p>
                    <div class="dropdown-item logout-link">Logout</div>
                </div>
            </div>
        </li>
    </ul>
      </nav>
      <div class="container">
        <div class="text">Feedback</div>
        <form  method="post">
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="full_name" required>
                    <div class="underline"></div>
                    <label for="full_name">Full Name</label>
                </div>
                <div class="input-data">
                    <input type="text" name="username" required>
                    <div class="underline"></div>
                    <label for="username">Username</label>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="email" required validateEmail()>
                    <div class="underline"></div>
                    <label for="email">Email Address</label>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data textarea">
                    <textarea rows="8" cols="80" name="message" required></textarea>
                    <div class="underline"></div>
                    <label for="message">Feedback</label>
                </div>
            </div>
            <div class="form-row submit-btn">
                <div class="input-data">
                    <div class="inner"></div>
                    <input type="submit" name="submit" value="Submit">
                    
                </div>
            </div>
        </form>
    </div>
</body>
</html>