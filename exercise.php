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
        <script type="text/javascript" src="path/to/timer.js"></script>
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
                background-image:url('image/exbg.jpg') ;
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
                margin-top: 20px;
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
        
        </style>
 <script>
        $(document).ready(function() {
            var exercises = <?php echo json_encode($exercises); ?>;
            var currentExercise = 0;

            function displayExercise(index) {
                $(".c1 img").attr("src", exercises[index]['imagePath']);
                $(".c1 .card-title1").text(exercises[index]['exerciseName']);
                $(".c2 .card-text").text(exercises[index]['exerciseDescription']);
                $(".c2 .card-text").text(exercises[index]['benefits']);

                // Reset timer display
                $(".timer").html('<span class="hour">00</span>:<span class="minute">00</span>:<span class="second">10</span>');
            }

            function startTimer(seconds) {
                var timerDisplay = $(".timer");

                timerDisplay.timer({
                    countdown: true,
                    duration: seconds,
                    format: '%H:%M:%S',
                    callback: function () {
                        timerDisplay.html("Exercise completed!");
                    }
                });
            }

            $(".btn-next").on("click", function() {
                if (currentExercise < exercises.length - 1) {
                    currentExercise++;
                    displayExercise(currentExercise);
                }
            });

            $(".btn-prev").on("click", function() {
                if (currentExercise > 0) {
                    currentExercise--;
                    displayExercise(currentExercise);
                }
            });

            $(".btn-start-stop").on("click", function() {
                startTimer(30);
            });

            // Initial display of the first exercise
            displayExercise(currentExercise);
        });
    </script>
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
        <li><a href="#footer">About Us</a></li>
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
    // Begineer
    $query = "SELECT * FROM `exercises` WHERE `gender`='Male' AND  `category`='Body Pain' AND `subCategory`='Back Pain' AND `level`='Beginner'";
    $result = $db_conn->query($query);

    if ($result && $result->num_rows > 0) {
        while ($exercise = $result->fetch_assoc()) {
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

                    <!-- Timer and control buttons for each exercise -->
                    <div class="exercise-timer">
                        <span class="hour">00</span>:<span class="minute">00</span>:<span class="second">10</span>
                    </div>
                    <div class="control">
                        <button class="btn btn-primary btn-start-stop">Start Timer</button>
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
    
