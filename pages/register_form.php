<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
     <link rel="stylesheet" href="../asset/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/css/slide_manu.css">
    <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.css">
    
</head>
<body class="bg-light ">
<div class="container px-5 py-2">
    <div class="container row">
    <div class="col-12 col-sm-2 col-md-3 col-lg-3"></div>
    <div class="col-12 col-sm-8 col-md-6 col-lg-6">
      <div class="card my-5 shadow">
        <div class="card-header card-title text-center bg-primary">
          <h5 class="text-white text-uppercase"> Intern & field system</h5>
        </div>
        <form action="register_handler.php" method="POST" class="pb-3 shadow">
          <div class="col-12 pt-3 pr-3 pl-3">
              <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
          </div>
          <div class="col-12 pt-3 pr-3 pl-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            <?php 
              session_start();
              if(isset($_SESSION['e_msg'])){
                ?><span class="text-center text-danger"><?php print($_SESSION['e_msg']); ?><span><?php
                session_unset();
              }
            ?>
          </div>
          <div class="col-12 p-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          </div>
          <div class="col-12 pb-3 pr-3 pl-3">
            <input type="password" class="form-control" name="conf_password" id="conf_password" placeholder="Confirm Password">
            <?php
              if(isset($_SESSION['p_msg'])){
                ?><span class="text-center text-danger"><?php print($_SESSION['p_msg']); ?><span><?php
                session_unset();
              }
            ?>
          </div>
          <div class="row">
            <div class="col-2"></div>
            <div class="col-8  pt-3 pr-4 pl-4">
              <button type="submit" class="btn btn-primary btn-block" name="login">Sign up</button>
            </div>
          </div>
        </form>
      <div class="text-center small">
        <br>
        <p>If you have account
          <a href="../index.php">Sign in</a>
        </p>
      </div>
    </div>
    </div>
    </div>
  </div>

<script src="../asset/jquery/jquery.min.js"></script>
<script src="../asset/bootstrap/js/bootstrap.min.js"></script>
<script src="../asset/js/slide_menu.js"></script>
</body>
</html>