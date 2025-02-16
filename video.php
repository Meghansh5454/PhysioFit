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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise List</title>
    <link rel="icon" type="image/png" href="image/logo6.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
 @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
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
  background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('image/exbg.jpg');  background-attachment: fixed;
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
  margin-left:300px ;
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

nav {
  width: 100%;
  height: 10vh;
  display: flex;
  justify-content: space-between;
  align-items: center;
  text-transform: uppercase;
  position: fixed;
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

    table {
            width: 80%; /* Adjust the width as needed */
            margin: 0 auto; /* Center the table horizontally */
            border-collapse: collapse;
        }

        th, td {
            padding: 8px 20px;
            text-align: left;
            color:white;
            /* border: 1px solid #ddd; */
        }

        th {
          color: #f5d5d5;
        }

    </style>
</head>
<body>
<nav class="navbar">
    <div class="logo">
        <img src="image/logo6.png" width="100px">
    </div>
    <ul class="nav-links">
        <li><a href="main.php" target="_self">Home</a></li>
        <li><a href="about us.php">About US</a></li>
        <li><a href="#">Contact</a></li>
        <li>
        <div class="profile" id="profile">
        <img src="image/profile.png" width="50px" height="40px">
        <div class="dropdown" id="dropdown">
            <h1 class="name">Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
            <p class="mail">Email: <?php echo $_SESSION["email"]; ?></p>
            <div class="dropdown-item logout-link">Logout</div>
        </div>
    </div>
</div>
        </li>
    </ul>
</nav>
<div class="container">
        <div class='text'>Exercise List</div>
        <table>
            <thead>
                <tr>
                    <th>Exercise Name</th>
                    <th>Video</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Knee to Chest</td>
                    <td><a href="javascript:void(0);" onclick="openVideo('https://www.youtube.com/watch?v=ZKBZjOTsZNc&pp=ygUYa25lZSB0byBjaGVzdCBtYWxlIGRvaW5n')">View Video</a></td>
                </tr>
                <tr>
                    <td>Side Plank</td>
                    <td><a href="javascript:void(0);" onclick="openVideo('https://www.youtube.com/watch?v=cFmA8_uh69U&pp=ygUVc2lkZSBwbGFuayBtYWxlIGRvaW5n')">View Video</a></td>
                </tr>
                <tr>
                    <td>Plank</td>
                    <td><a href="javascript:void(0);" onclick="openVideo('https://www.youtube.com/watch?v=Ehy8G39d_PM&pp=ygURIHBsYW5rIG1hbGUgZG9pbmc%3D')">View Video</a></td>
                </tr>
                <tr>
                    <td>Cobra Pose</td>
                    <td><a href="javascript:void(0);" onclick="openVideo('https://www.youtube.com/watch?v=k48O2CxvZ3o&pp=ygUVY29icmEgcG9zZSBtYWxlIGRvaW5n')">View Video</a></td>
                </tr>
                <tr>
                    <td>Back Extension</td>
                    <td><a href="javascript:void(0);" onclick="openVideo('https://www.youtube.com/watch?v=cIYeKqLqVVs&pp=ygUlYmFjayBleHRlbnNpb24gbWFsZSBkb2luZyB3aXRob3V0IGd5bQ%3D%3D')">View Video</a></td>
                </tr>
            </tbody>
        </table>
    </div>


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
        function openVideo(videoUrl) {
            var width = 800;
            var height = 500;
            var left = screen.width / 2 - width / 2;
            var top = screen.height / 2 - height / 2;
            window.open(videoUrl, 'Exercise Video', 'width=' + width + ', height=' + height + ', top=' + top + ', left=' + left);
        }
    </script>
</body>
</html>