<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHYSIO FIT</title>
  <link rel="icon" type="image/png" href="image/logo6.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: 'Raleway', sans-serif;
      /* text-transform: uppercase; */
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
      background-image: url("image/1.jpg");
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
    .hope{text-transform: uppercase;}
.physio{
  font-size:80px;
  font-family:metal;
}
input[type="submit"] {
      width: 170px;
      height: 50px;
      border: 0px solid;
      background-color:  rgba(52,132,159,0);
      border-radius: 25px;
      font-size: 18px;
      font-weight: 100;
      cursor: pointer;
      outline: none;
      color:white;
      left:20%;
    }

    input[type="submit"]:hover {
      border-color:#AE445A;
      transition: .5s;
    }
    input[type="submit"]:hover {
 letter-spacing: 3px;
 background-color:#AE445A;
 color: hsl(0, 0%, 100%);
 box-shadow:  rgba(174,68,90)0px 7px 29px 0px;
 width:230px;
}
.footer {
    background-color:#AE445A ;
    color: white;
    padding: 30px 0;
  }
</style>
</head>
<body>
  <div class="bg1">
    <nav class="navbar">
      <a href="main.php"target="_self">
      <div class="logo">
        <img src="image/logo6.png" width="100px">
      </div>
      </a>
      <ul class="nav-links">
        <li><a href="main.php" target="_self">Home</a></li>
        <li><a href="about us main.php">About US</a></li>
        <li><a href="contact us main.php">Contact</a></li>
      </ul>
    </nav>
    <div class="container">
      <div class="physio"> PHYSIO FIT</div>
      <div class="hope">Hope is good thing,and it keeps you moving.<br>
    We bring that hope to you,We care today for your happy tommorrow.</div>
    <br><br>  <a href="login.php" target="_self"><input type="submit" value="LOG IN / SIGN UP"></a>
   
      </div>
  </div>
</body>
</html>
