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
?><!DOCTYPE html>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>m weightloss ad</title>
  <link rel="icon" type="image/png" href="image/logo6.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 
  <style>
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
      background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),url('image/genderbg.jpg');
      overflow-x: hidden;
      background-attachment: fixed;
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      margin: 0;
      padding: 0;
    }
    
    .img1{
      height:300px;
    }
   
     .card {
      color:white;
  border-radius: 20px;
  background: var(--bg-color);
  
  /* display: flex; */
  /* flex-direction: column; */
  transition: .4s;
  position: relative;
}

.card:hover {
  transform: scale(1.02);
  box-shadow: 0px 0px 12px 4px #AE445A;
}
.card-img-top {
      border-radius: 20px 20px 0px 0px; 
    }


.a{
  text-decoration:none;
}

    .photo{
    top: 100px;
    float: left;
position: fixed;
left:20px;

}
img{
  border-radius:5%;
}
.other{
  float:left;
  display:flex;
  /* margin: 22px 0px 0px 650px; */
}
.myCard {
  background-color: transparent;
  width: 390px;
  height: 290px;
  perspective: 1000px;
}
.card1{
  margin: 32px 0px 0px 640px; 

}
.card2{
  margin: 32px 10px 0px 30px; 
}
.card3{
  margin: 350px 0px 0px -870px; 
}
.card4{
  margin: 350px 0px 0px -450px; 
}
.card5{
  margin: 680px 0px 0px -920px; 
}
.card6{
  margin: 680px 0px 0px -500px; 
}
.card7{
  margin: 1010px 0px 0px -980px; 
}


.title {
  font-size: 2.5em;
  /* font-weight: ; */
  text-align: center;
  margin: 0;
}
.text{
  font-size:1.5em;
  text-align:left;  
}
.card2{
  /* top:
  right:650px; */
  
}

.innerCard {
  position: relative;
  width: 100%;
  height: 100%;
  /* text-align: center; */
  transition: transform 0.8s;
  transform-style: preserve-3d;
  cursor: pointer;
}

.myCard:hover .innerCard {
  transform: rotateY(180deg);
}

.frontSide,
.backSide {
  position: absolute;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-evenly;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  border: 1px solid rgba(255, 255, 255, 0.8);
  border-radius: 1rem;
  color: white;
  box-shadow: 0 0 0.1em rgba(255, 255, 255, 0.1);
  font-weight: 700;
}

.frontSide,
.frontSide::before {
  background: linear-gradient(43deg, rgb(65, 88, 208) 0%, rgb(200, 80, 192) 46%, rgb(255, 204, 112) 100%);
}

.backSide,
.backSide::before {
  background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
}

.backSide {
  transform: rotateY(180deg);
  
}

.frontSide::before,
.backSide::before {
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  content: '';
  width: 110%;
  height: 110%;
  position: absolute;
  z-index: -1;
  border-radius: 1em;
  filter: blur(20px);
  animation: animate 5s linear infinite;
}

@keyframes animate {
  0% {
    opacity: 0.3;
  }

  80% {
    opacity: -11;
  }

  100% {
    opacity: 0.3;
  }
}
 
 
  </style>
</head>
<body>
  <div class="bg1">
    <div class="stick">
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

</div>
    <div class="main">
        <div class="photo">
            <img src="image/m weightloss.jpg" width="600px" height="670px">
        </div>
      <div class="other">
      <form action="">
     <a href="exercise54.php" class="btn" name="card1">
      <div class="card1">
      <div class="myCard">
        <div class="innerCard">
        
            <div class="frontSide">
                <p class="title">Day 1</p>
                
            </div>
            <div class="backSide">
                <p class="text">1.Mountain Climber<br>
                2.Jumping Jack<br>
                3.Squats<br>
                4.Crunches<br>
                5.Side Plank
                </p>
               
            </div>
        </div>
        </div>
    </div>
    </a>
    </form>
    <form action="">
     <a href="exercise54.php" class="btn" name="card1">
    <div class="card2">
    <div class="myCard">
        <div class="innerCard">
            <div class="frontSide">
                <p class="title">Day 2</p>
                
            </div>
            <div class="backSide">
                <p class="text">1.Mountain Climber<br>
                2.Jumping Jack<br>
                3.Squats<br>
                4.Crunches<br>
                5.Side Plank
                </p>
               
                
            </div>
</div>
        </div>
    </div>
    </a>
    </form>
    <form action="">
     <a href="exercise54.php" class="btn" name="card1">
    <div class="card3">
    <div class="myCard">
        <div class="innerCard">
            <div class="frontSide">
                <p class="title">Day 3</p>
                
            </div>
            <div class="backSide">
            <p class="text">1.Mountain Climber<br>
                2.Jumping Jack<br>
                3.Squats<br>
                4.Crunches<br>
                5.Side Plank
                </p>
            </div>
        </div>
</div>
    </div>
    </a>
    </form>
    <form action="">
     <a href="exercise54.php" class="btn" name="card1">
    <div class="card4">
    <div class="myCard">
        <div class="innerCard">
            <div class="frontSide">
                <p class="title">Day 4</p>
               
            </div>
            <div class="backSide">
            <p class="text">1.Mountain Climber<br>
                2.Jumping Jack<br>
                3.Squats<br>
                4.Crunches<br>
                5.Side Plank
                </p>
            </div>
        </div>
</div>
    </div>
    </a>
    </form>
    <form action="">
     <a href="exercise54.php" class="btn" name="card1">
    <div class="card5">
    <div class="myCard">
        <div class="innerCard">
            <div class="frontSide">
                <p class="title">Day 5</p>
               
            </div>
            <div class="backSide">
            <p class="text">1.Mountain Climber<br>
                2.Jumping Jack<br>
                3.Squats<br>
                4.Crunches<br>
                5.Side Plank
                </p> 
            </div>
        </div>
</div>
    </div>
    </a>
    </form>
    <form action="">
     <a href="exercise54.php" class="btn" name="card1">
    <div class="card6">
    <div class="myCard">
        <div class="innerCard">
            <div class="frontSide">
                <p class="title">Day 6</p>
                
            </div>
            <div class="backSide">
            <p class="text">1.Mountain Climber<br>
                2.Jumping Jack<br>
                3.Squats<br>
                4.Crunches<br>
                5.Side Plank
                </p>
            </div>
        </div>
</div>
    </div>
    </a>
    </form>
    <form action="">
     <a href="exercise54.php" class="btn" name="card1">
    <div class="card7">
    <div class="myCard">
        <div class="innerCard">
            <div class="frontSide">
                <p class="title">Day 7</p>
               
            </div>
            <div class="backSide">
            <p class="text">1.Mountain Climber<br>
                2.Jumping Jack<br>
                3.Squats<br>
                4.Crunches<br>
                5.Side Plank
                </p>
            </div>
        </div>
</div>
    </div>
     </a>
    </form>
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
