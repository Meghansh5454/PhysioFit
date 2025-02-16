<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>About Us</title>
    <link rel="icon" type="image/png" href="image/logo6.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


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

        * {
            margin: 0;
            padding: 0;
            outline: none;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 10px;
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('image/genderbg.jpg');
            background-attachment: fixed;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .container {
            max-width: 800px;
            background: #fff;
            width: 800px;
            padding: 25px 40px 10px 40px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 110px;
            margin-left: 400px;
            background-color: rgba(53, 53, 53, 0.35);
        }

        .container .text {
            text-align: center;
            font-size: 41px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            background: -webkit-linear-gradient(right, #f9ce34, #ee2a7b, #f9ce34, #ee2a7b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .container p {
            color: white;
            margin-top: 20px;
            text-align: justify;
        }
        .container h2 {
            background: -webkit-linear-gradient(right, #AE445A, #ee2a7b, #AE445A, #ee2a7b); 
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-top: 20px;
            text-align: center;
        }


        /* Other styles remain unchanged */

    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src="image/logo6.png" width="100px">
        </div>
        <ul class="nav-links">
            <li><a href="main.php" target="_self">Home</a></li>
            <li><a href="about us main.php">About US</a></li>
            <li><a href="contact us main.php">Contact</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="text">About Our Website</div>
        <p>
            Welcome to our online platform dedicated to promoting a healthy and pain-free lifestyle through a combination
            of targeted exercises and proper diet plans. Our journey has been one of commitment to the well-being of
            individuals, and here's our story:
        </p>

        <h2>Mission Statement</h2>
        <p>
            Our mission is to empower individuals to reclaim their health and well-being by providing accessible,
            at-home solutions for pain relief, injury recovery, and overall improved quality of life.
        </p>

        <h2>Company Story</h2>
        <p>
            Our story began with the realization that many individuals face challenges in visiting therapy centers due to
            their tight schedules. We set out to create a platform offering web-based physiotherapy videos, catering to a
            diverse range of health needs.
        </p>

  
</body>

</html>
