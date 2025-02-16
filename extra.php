<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>extra</title>
  <link rel="icon" type="image/png" href="image/logo6.png">
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: 'Raleway', sans-serif;
    }

    body {
      text-transform: uppercase;
      background-image: url('image/genderbg.jpg');
      background-attachment: fixed;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    a {
      margin-left: 20px;
      text-decoration: none;
      color: purple;
    }

    .container {
      background-color: rgba(128, 128, 128, 0.323);
      color: white;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 400px;
      border-radius: 10px;
      cursor: default;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      
    }


    .logo1 {
      height: 100px;
      display: block;
      margin: 0 auto;
    }

    .container h1 {
      justify-content: center;
      width: 75px;
      height: 80px;
    }

    .container form {
      padding: 0 40px;
      box-sizing: border-box;
    }

    .txt_field {
      position: relative;
      border-bottom: 2px solid white;
      margin: 30px 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .txt_field input {
      width: 100%;
      padding: 0 5px;
      height: 40px;
      font-size: 16px;
      border: none;
      background: none;
      outline: none;
      caret-color: white;
      color:white;
    }

    .txt_field label {
      position: absolute;
      top: 50%;
      left: 5px;
      color: white  ;
      transform: translateY(-50%);
      font-size: 16px;
      pointer-events: none;
      transition: .5s;
      
    }

    .txt_field span::before {
      content: '';
      position: absolute;
      top: 40px;
      left: 0;
      width: 0%;
      height: 2px;
      background: gray;
    }

    .txt_field input:focus ~ label,
    .txt_field input:valid ~ label {
      top: -5px;
      color: white;
    }

    .txt_field input:focus ~ span::before,
    .txt_field input:valid ~ span::before {
      width: 100%;
    }

    input[type="submit"] {
      width: 50%;
      height: 20px;
      border: 1px solid;
      background: purple;
      border-radius: 25px;
      font-size: 18px;
      font-weight: 700;
      cursor: pointer;
      outline: none;
      color:white;
    }

    input[type="submit"]:hover {
      border-color: black;
      transition: .5s;
    }

    .signup_link {
      margin: 30px 0;
      text-align: container;
      font-size: 16px;
    }

    .signup_link a {
      text-decoration: none;
      color: white;
    }

    .signup_link a:hover {
      text-decoration: underline;
    }

    p {
      font-size: medium;
      background-color: white;
      color: rgb(26, 26, 107);
      margin-left: 70px;
      margin-right: 70px;
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

    .bg1 {
      width: 100%;
      height: 100vh;
      background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('image/genderbg.jpg'); url("image/2.jpg");
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-origin: content-box;
      background-position: center center;
      margin: auto;
      background-color: rgba(0, 0, 0, 0.7);
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
  </style>
  <script>
    function validateform(){
        let x= document.forms["myform"]["fmane"],value;
        if(x==" "){
            alert("name must be filled out");
            return false;
        }
    }
    </script>
</head>
<body>


  <div class="bg1">
    <nav class="navbar">
      <div class="logo">
        <!-- <img src="image/logo1.png" width="100px"> -->
      </div>
      <ul class="nav-links">
      <li><a href="main.php" target="_self">Home</a></li>
        <li><a href="#">About US</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
  </div>
  <div class="bg">
    <div class="container">
      <form name ="myform" action=" " on submit="return validationsjorm()">
        name:<input type="text" name="fname">
        <input type="submit" values="Submit">
</form>
    </div>
  </div>
</body>
</html>
