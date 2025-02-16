<?php
include('config.php');

$result = mysqli_query($db_conn, "SELECT * FROM signup");
$entries = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>User Details</title>
    <link rel="icon" type="image/png" href="image/logo6.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
      @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
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

      table {
        
          width: 80%; /* Adjust the width as needed */
          margin: 0 auto; /* Center the table horizontally */
          border-collapse: collapse;
      }

      th, td {
          padding: 8px 12px;
          text-align: left;
          color: white;
          /* border: 1px solid #ddd; */
      }

      th {
          color: #f5d5d5;
      }
      .maintable{
        margin: 60px 0px 0px 0px;
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
        <li><a href="#">About US</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
    </nav>
    <div class="maintable">
        <table id="user-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($entries as $entry): ?>
                <tr>
                    <td><?php echo $entry['id']; ?></td>
                    <td><?php echo $entry['fname']; ?></td>
                    <td><?php echo $entry['username']; ?></td>
                    <td><?php echo $entry['email']; ?></td>
                    <td><?php echo $entry['pass']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
