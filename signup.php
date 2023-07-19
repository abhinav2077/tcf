<?php include('db.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>Sign up</title>
  </head>

  <body class="body"style="font-family: Arial, Helvetica, sans-serif;">
    <div class="header">
      <div class="left">
        <img class="logo" src="Logo.png">
      </div>
      <div class="mid">
        <nav class="nav">
          <a class="home" href="index.html">Home</a>
          <a class="hiw" href="howitworks.html">How it works</a>
          <a class="ser" href="services.html">Services</a>
          <a class="cu" href="contact.html">Contact Us</a>
          <a class="blog" href="blog.html">Blog</a>
        </nav>
      </div>
      <div class="right">
        <a href="login.html">
          <button class="loginbutton">LOGIN</button>
        </a>
      </div>
    </div>

    <div class="login-page">
      <div class="form">
        <div class="img-tcf">
          <img src="Logo.png">
        </div>
        <form method="POST" class="login-form" action="signup.php">
          <input type="text" placeholder="username" name="username"/>
          <input type="password" placeholder="password" name="password"/>
          <button>Sign up</button>
          <p class="message">Already a member? <a href="login.php">Login here!</a></p>
        </form>
      </div>
    </div>
  </body>
</html>  