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
 <?php include "config.php"; ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exercise </title>
        <link rel="icon" type="image/png" href="image/logo6.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-lZPZR6j/R6aqV9UznUqYsMfsNl0I5/NQ7SZteINtA2H6E5TVrGEQ7Df5Pjxz7PWi" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
        <script src="https://cdn.rawgit.com/jchavannes/jquery-timer/v0.7.0/dist/jquery.timer.min.js"></script>
        <style>
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

            body {
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('image/exbg.jpg');
                background-attachment: fixed;
                background-size: cover;
                background-position: center center;
                background-repeat: no-repeat;
                margin: 0;
                padding: 0;
            }

            .card {
                color: white;
                border-radius: 20px;
                background: var(--bg-color);
                transition: 0.4s;
                position: relative;
                margin-bottom: 20px;
            }

            .card:hover {
                transform: scale(1.02);
                box-shadow: 0px 0px 12px 4px #AE445A;
            }

            .card-img-top {
                border-radius: 20px 20px 0px 0px;
            }

            .card-body {
                padding: 20px;
                font-size: 18px;
            }

            .Start {
                margin: 50px 0px 0px 680px ;
            }

            .stop {
                margin: -37px 0px 0px 780px;
            }

            .feed {
                margin: 150px 0px 0px 1400px;
            }

            .c1 {
                margin: 110px 0px 0px 20px;
                width: 550px;
                height: 550px;
            }

            .card-title1 {
                text-align: center;
            }

            .c2 {
                margin: -570px 0px 0px 600px; 
            }  
            .timer {
            font-size: 24px;
            margin-top: 10px;
        }

        .control button {
            margin-top: 5px;
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
        .exercise-timer {
        font-size: 24px;
        margin-top: 10px;
        text-align: center; /* Center the timer */
    }

    .control button {
        margin-top: 5px;
    }
    .btn-feedback {
            margin-top: 5px;
            margin-left: 1300px; /* Adjust the margin as needed */
            padding: 15px;
            font-size: 20px;
        }
        .control button {
    cursor: pointer;
}

.control button {
    cursor: pointer;
    border-radius: 10px;
}

.startTimerBtn,
.stopTimerBtn {
    margin-right: 10px;
    padding: 10px 20px;
    font-size: 16px;
}

.startTimerBtn {
    background-color: #28a745;
    color: #fff;
    border: 1px solid #218838;
}

.startTimerBtn:hover {
    background-color: #218838;
}

.stopTimerBtn {
    background-color: #dc3545;
    color: #fff;
    border: 1px solid #c82333;
}

.stopTimerBtn:hover {
    background-color: #c82333;
}
.pdf-btn {
  margin-top: 5px;
  padding: 15px;
  font-size: 20px;
  background-color: #007bff; /* Set the background color */
  color: #fff; /* Set the text color */
  border: none; /* Remove the border */
  border-radius: 5px; /* Add rounded corners */
  cursor: pointer; /* Change the cursor to a pointer */
  float:right;
  margin-right: 60px;
}

.pdf-btn:hover {
  background-color: #0069d9; /* Darken the background color on hover */
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
                    <p class="mail">Email: <?php echo $_SESSION["email"]; ?></p>
                    <div class="dropdown-item logout-link">Logout</div>
                </div>
            </div>
        </li>
    </ul>
</nav>

<?php
   
    $query = "SELECT * FROM `exercises` WHERE `gender`='Male' AND  `category`='Weight' AND `subCategory`='Weight Gain' AND `level`='Intermediate'";
    $result = $db_conn->query($query);

    if ($result && $result->num_rows > 0) {
        $index = 0; // Initialize an index variable

        while ($exercise = $result->fetch_assoc()) {
            $index++; // Increment the index for each exercise
    ?>
            <div class="c1">
                <div class="card" style="width: 35rem; height: 25rem;">
                    <img src="<?php echo $exercise['imagePath']; ?>" class="card-img-top" alt="Exercise Image">
                    <h5 class="card-title1"><?php echo $exercise['exerciseName']; ?></h5>
                </div>
            </div>
            <br>
            <div class="c2">
                <div class="card" style="width: 55rem;">
                    <div class="card-body">
                        <h5 class="card-title">How to do it?</h5>
                        <p class="card-text"><?php echo $exercise['exerciseDescription']; ?></p>

                        <h5 class="card-title">Benefits:-</h5>
                        <p class="card-text"><?php echo $exercise['benefits']; ?></p>
                        <div class="exercise-timer">Exercise Timer: <span id="timer<?php echo $index; ?>">30</span> seconds</div>
                        <div class="control">
                            <button class="startTimerBtn" data-index="<?php echo $index; ?>" class="btn btn-primary">Start Timer</button>
                            <button class="stopTimerBtn" data-index="<?php echo $index; ?>" class="btn btn-danger">Stop Timer</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
    <?php
        }
    } else {
        echo "No exercises found.";
    }

    $db_conn->close();
    ?>

    <a href="feedback.php" class="btn btn-success btn-feedback">Give Feedback</a>
    <button onclick="window.open('diet gain.pdf', '_blank');" class="btn btn-primary pdf-btn">View Diet Chart</button>

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
document.addEventListener('DOMContentLoaded', function () {
    var startButtons = document.querySelectorAll('.startTimerBtn');
    var stopButtons = document.querySelectorAll('.stopTimerBtn');
    var timers = [];
    var remainingTime = []; // Array to store remaining time for each timer

    // Load the alarm sound
    var alarmSound = new Audio('Male.mp3');

    function startTimer(index) {
        clearInterval(timers[index]); // Clear the previous interval if it exists

        var timerElement = document.getElementById('timer' + index);
        var initialCountdown = 3; // Countdown from 3 seconds

        // Show the countdown
        timerElement.textContent = initialCountdown;

        // Countdown interval
        var countdownInterval = setInterval(function () {
            initialCountdown--;

            if (initialCountdown === 0) {
                clearInterval(countdownInterval); // Stop the countdown
                startInterval(index); // Start the timer interval
            } else {
                timerElement.textContent = initialCountdown;
            }
        }, 1000);
    }

    function startInterval(index) {
        var timerElement = document.getElementById('timer' + index);
        var initialTime = remainingTime[index] || 30; // Use remaining time if available, otherwise use 30 seconds

        timers[index] = setInterval(function () {
            initialTime--;

            if (initialTime < 0) {
                clearInterval(timers[index]); // Stop the timer
                playAlarm(); // Play the alarm sound when the timer completes
            } else {
                timerElement.textContent = initialTime;
                remainingTime[index] = initialTime; // Update remaining time
            }
        }, 1000); // Update every second
    }

    function stopTimer(index) {
        clearInterval(timers[index]);
        remainingTime[index] = parseInt(document.getElementById('timer' + index).textContent); // Store remaining time
    }

    function playAlarm() {
        // Play the alarm sound
        alarmSound.play();
    }

    startButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var index = this.getAttribute('data-index');
            startTimer(index);
        });
    });

    stopButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var index = this.getAttribute('data-index');
            stopTimer(index);
        });
    });
});
</script>
</body>
</html>
    
