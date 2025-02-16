<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Levels</title>
  <link rel="icon" type="image/png" href="image/logo6.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
 <style>
     body {
      background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),url('image/genderbg.jpg');
      
      background-attachment: fixed;
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      margin: 0;
      padding: 0;
    }
    .col{
     text-decoration:none;
     margin:70px 30px 0px 30px;
    }
    .col a{
     text-decoration:none;
     
    }
    .card-body{
      height:150px;
    }
    .card-title{
      font: 50px metal;
      margin:20px;
      
      
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
  font-family: 'Oswald';
  font-size:100px;

}
 </style> 
<body> 
<nav class="navbar">
      <div class="logo">
        <img src="image/logo6.png" width="100px">
      </div>
      <ul class="nav-links">
      <li><a href="main.php" target="_self">Home</a></li>
        <li><a href="#">About US</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
</nav>

<div class="col" >

<a href="#" class="a">
  <div class="card text-center mb-5" >
  <div class="card-body">
    <h5 class="card-title">Beginner</h5>
    
  </div>  
  </div>
  

  <a href="#">
  <div class="card text-center mb-5" >
  <div class="card-body">
    <h5 class="card-title">Intermediate</h5>
  </div>  
  </div>
  

  <a href="#">
  <div class="card text-center">
  <div class="card-body">
    <h5 class="card-title">Advance</h5>
  </div>  
  </div>
  
</div>
</body>
</html>