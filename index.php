<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Internship</title>
    <link rel="stylesheet" href="asset/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/css/slide_manu.css">
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.css">
    
</head>
<body class="bg-light ">
<div class="container px-5 py-2">
    <div class="container row">
    <div class="col-12 col-sm-2 col-md-3 col-lg-3"></div>
    <div class=" card col-12 col-sm-8 col-md-6 col-lg-6 my-5">
      <div class="card-title text-center h2 p-3">
        STUDENT INTERNSHIP
      </div>
      <div class="card-title text-center h2 p-3">
        Log in
      </div>
      <?php 
        session_start();
        if(isset($_SESSION['error_msg'])){
          ?><span class="text-center text-danger"><?php print($_SESSION['error_msg']); ?><span><?php
          session_unset();
        }
      ?>
      <form action="pages/index_handler.php" method="POST" class="pb-3">
      <div class="col-12 pt-3 pr-3 pl-3">
          <input type="text" class="form-control" name="Email" id="email" placeholder="Email" required>
        </div>
        <div class="col-12 pt-3 pr-3 pl-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="row">
          <div class="col-4"></div>
          <div class="col-4  pt-3 pr-4 pl-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Log in</button>
          </div>
        </div>
      </form>
      <p class="text-center">
        <a href="#" class="small">Forget Password</a>
      </p>
      <p class="text-center">
        <a href="pages/register_form.php" class="small">Create Account</a>
      </p>
    </div>
    </div>
  </div>
<script src="asset/jquery/jquery.min.js"></script>
<script src="asset/bootstrap/js/bootstrap.min.js"></script>
<script src="asset/js/slide_menu.js"></script>
</body>
</html>