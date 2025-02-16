<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect them to the login page or another page of your choice
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHYSIO FIT</title>
  <link rel="icon" type="image/png" href="image/logo6.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: 'Raleway', sans-serif;
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

    .bg1 {
      width: 100%;
      height: 100vh;
      /* background-image: url("image/1.jpg"); */
      background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('image/1.jpg');
      background-size: cover;
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
    .container {
      color: white;
      position: absolute;
      top: 40%;
      left: 20%;
      transform: translate(-50%, -50%);
      width: 500px;
      border-radius: 10px;
      cursor: default;
      display: flex;
      flex-direction: column;
      align-items: left;
    }

    .physio {
      font-size: 80px;
      font-family: metal;
    }

    .hope {
      text-transform: uppercase;
    }

    input[type="submit"] {
      width: 170px;
      height: 50px;
      border: 0px solid;
      background-color: rgba(52, 132, 159, 0);
      border-radius: 25px;
      font-size: 18px;
      font-weight: 100;
      cursor: pointer;
      outline: none;
      color: white;
      left: 20%;
    }

    input[type="submit"]:hover {
      border-color: #AE445A;
      transition: .5s;
    }

    input[type="submit"]:hover {
      letter-spacing: 3px;
      background-color: #AE445A;
      color: hsl(0, 0%, 100%);
      box-shadow: rgba(174, 68, 90) 0px 7px 29px 0px;
      width: 230px;
    }

    .footer {
      background-color: #AE445A;
      color: white;
      padding: 30px 0;
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
      font-size: 20px;
      font-family: metal;
            width: 60%; /* Adjust the width as needed */
            margin: 500px 0px 50px 130px ; /* Center the table horizontally */
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
          text-decoration: underline;
        }
        .btn-dietloss {
            margin-top: 490px;
           
            margin-left: 1270px; /* Adjust the margin as needed */
            padding: 8px;
            font-size: 20px;
        }
        .btn-dietgain {
            margin-top: 10px; 
            margin-left: 1270px; /* Adjust the margin as needed */
            padding: 8px;
            font-size: 20px;
        }
.exer a {
  text-decoration:none ;
  color: white;
}
.exer a:hover{
color: blue;
transition: 0.5s all ease-in-out;


}
  </style>
</head>
<body>
  <div class="bg1">
    <nav class="navbar">
      <a href="main.php" target="_self">
      <div class="logo">
        <img src="image/logo6.png" width="100px">
      </div>
      </a>
      <ul class="nav-links">
        <li><a href="main.php" target="_self">Home</a></li>
        <li><a href="about us main.php">About US</a></li>
        <li><a href="contact us main.php">Contact</a></li>
        <li>
          <div class="profile" id="profile">
            <img src="image/profile.png" width="50px" height="40px">
            <div class="dropdown">
              <h1 class="name">Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
              <p class="mail">Email:<?php echo $_SESSION["email"]; ?></p>
              <div class="dropdown-item logout-link">Logout</div>
            </div>
          </div>
        </li>
      </ul>
    </nav>
    <div class="container">
      <div class="physio">PHYSIO FIT</div>
      <div class="hope">
        Hope is a good thing, and it keeps you moving. <br>
        We bring that hope to you. We care today for your happy tomorrow.
      </div>
      <br><br>
      <div class="container">
        <div class='text'>Exercise List</div>
        <table class="exer">
            <thead>
                <tr>
                    <th>MALE</th>
                    <th>FEMALE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td ><a href="m body.php">Body Pain</a></td>
                    <td><a href="f body.php">Body Pain</a></td>
                </tr>
                <tr>
                <td><a href="m body.php">Disease</a></td>
                    <td><a href="f body.php">Disease</a></td>
                </tr>
                <tr>
                <td><a href="m body.php">Weight</a></td>
                    <td><a href="f body.php">Weight</a></td>
                </tr>
                <tr>
                <td><a href="m body.php"></a></td>
                    <td><a href="f body.php">Pregnancy</a></td>
                </tr>
                
            </tbody>
        </table>
    </div>
    </div>
    <a href="#" class="btn btn-primary btn-dietloss">Diet Chart for WeightLoss</a>
    <a href="#" class="btn btn-primary btn-dietgain">Diet Chart for WeightGain</a>

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


  </div>
</body>
</html>
