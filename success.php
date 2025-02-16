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
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gender</title>
        <link rel="icon" type="image/png" href="image/logo6.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
            body {
                background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('image/genderbg.jpg');
                background-attachment: fixed;
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;
                margin: 0;
                padding: 0;
            }

            .card1 {
                width: 700px;
                height: 600px;
                margin: 10px 850px 10px 30px;
            }

            .card-img {
                border-radius: 20px;
            }

            .card-image {
                background-color: rgba(0, 0, 0, 0.3);
            }
            .card {
                color:white;
                border-radius: 20px;
                background: var(--bg-color);
                transition: .4s;
                position: relative;
            }

            .card:hover {
            transform: scale(1.02);
            box-shadow: 0px 0px 12px 4px #AE445A;
            }

            .card2 {
                width: 700px;
                height: 600px;
                margin: 10px 0px 10px 780px;
            }

            .col-1 {
                margin: 30px 0px 0px 0px;
            }

            .col-2 {
                margin: 30px 0px 0px 0px;
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
            
        </style>
    </head>

    <body>
    <nav class="navbar">
        <a href="main.php" target="_self">
            <div class="logo">
                <img src="image/logo6.png" width="100px">
            </div>
        </a>
        <ul class="nav-links">
            <li><a href="main.php" target="_self">Home</a></li>
            <li><a href="about us.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
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

        <div class="row" style="width: 100px;">
            <div class="col-1">
                <a href="m cat.php" target="_self">
                    <div class="card1">
                        <div class="card text-bg-dark text-center">
                            <img src="image/m.jpg" class="card-img" style="height: 600px;">
                            <div class="card-img-overlay">
                                <h3 class="card-title ">MALE</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-2">
                <a href="f cat.php" target="_self">
                    <div class="card2">
                        <div class="card text-bg-light text-center">
                            <img src="image/f .jpg" class="card-img" style="height: 600px;">
                            <div class="card-img-overlay">
                                <h3 class="card-title">FEMALE</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
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

    </body>
    </html>