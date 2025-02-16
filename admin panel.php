<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>main admin panel</title>
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
    body {
      background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),url('image/genderbg.jpg');
      
      background-attachment: fixed;
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      margin: 0;
      padding: 0;
    }
  
.card1{
    color:white;
    background: var(--bg-color);
    height: 300px;
    width: 200px;
    margin: 150px 0px 0px 200px;
    border-radius: 20px;
    transition: .4s;
    position: relative;
    text-decoration: none;
    font-family: 'Oswald';
    font-size:50px; 
    text-align:center;

}
.card1:hover {
  transform: scale(1.02);
  box-shadow: 0px 0px 12px 4px #AE445A;
}
.card2{
    color:white;
    background: var(--bg-color);
    height: 300px;
    width: 200px;
    margin: -300px 0px 0px 500px;
    border-radius: 20px;
    transition: .4s;
    position: relative;
    text-decoration:none;
    font-family: 'Oswald';
    font-size:50px; 
    text-align:center;
    
}
.card2:hover {
  transform: scale(1.02);
  box-shadow: 0px 0px 12px 4px #AE445A;
}
 
.card3{
    color:white;
    background: var(--bg-color);
    height: 300px;
    width: 200px;
    margin: -300px 0px 0px 800px;
    border-radius: 20px;
    transition: .4s;
    position: relative;
    text-decoration:none;
    font-family: 'Oswald';
    font-size:50px; 
    text-align:center;
}
.card3:hover {
  transform: scale(1.02);
  box-shadow: 0px 0px 12px 4px #AE445A;
}
 
.card4{
    color:white;
    background: var(--bg-color);
    height: 300px;
    width: 200px;
    margin: -300px 0px 0px 1100px;
    border-radius: 20px;
    transition: .4s;
    position: relative;
    text-decoration:none;
    font-family: 'Oswald';
    font-size:50px; 
    text-align:center;
}
.card4:hover {
  transform: scale(1.02);
  box-shadow: 0px 0px 12px 4px #AE445A;
}
.p{
    text-decoration:none;
  font-family: 'Oswald';
  font-size:80px;
}
a{
    text-decoration: none;
    color: white;
}
  </style>
  <script>
document.getElementById('logoutBtn').addEventListener('click', function(event) {
    event.preventDefault();
    // Save the admin ID in a session variable
    <?php
    if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') {
        $_SESSION['admin_id'] = 'your_admin_id';
    }
    ?>
    // Redirect to the logout.php file
    window.location.href = 'logout.php';
});
</script>
</head>
<body>
  <div class="bg1">
    <div class="stick">
    <nav class="navbar">
    <a href="main.php" target="_self">
      <div class="logo">
        <img src="image/logo6.png" width="100px">
      </div >
</a>
      <ul class="nav-links">
        <li><a href="main.php" target="_self">Home</a></li>
        <li><a href="about us.php">About Us</a></li>
        <li><a href="contactus.php">Contact</a></li>
        <li><a href="logout1.php">logout</a></li>
      </ul>
    </nav>
</div>
 <div class="maincard">  
<div class="card1">
    <a href="contactfetch.php" target="_self"><br>Check<br>Query</a>
    </div>  
    <div class="card2">
    <a href="admin.php" target="_self"><br>Add<br>Exercise</a>
    </div>  
    <div class="card3">
    <a href="feedback fetch.php" target="_self"><br>Check<br>Feedback</a>
    </div>  
    <div class="card4">
    <a href="userdetails.php" target="_self"><br>User<br>Details</a>
    </div>  
</div>   
</body>
</html>
