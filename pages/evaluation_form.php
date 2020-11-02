<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student</title>
     <link rel="stylesheet" href="../asset/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/css/slide_manu.css">
    <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.css">
    
</head>
<body class="bg-light ">
<div class="container px-5 py-2">
    <div class="container row">
    <div class="col-12 col-sm-2 col-md-3 col-lg-3"></div>
    <div class=" card col-12 col-sm-8 col-md-6 col-lg-6 my-5">
    
      <div class="card-title text-center h2 p-3">
        <span class="border-bottom"></span>
        <span>STUDENT INTERSHIP</span>
        <span>CRITERIA FORM</span>
      </div>
      <form action="criteria_handler.php" method="POST" class="pb-3">
        <div class="col_12">
        <div class="row pt-3 pr-3 pl-3">
            <input type="date" class="form-control" name="date" id="date" placeholder="DATE" required>
         </div>
         <div class="row pt-3 pr-3 pl-3">
            <input type="number" class="form-control" name="score" id="score" placeholder="SCORE" required>
         </div>
         <div class="row pt-3 pr-3 pl-3">
            <input type="number" class="form-control" name="supID" id="supID" placeholder="SUPERVISOR ID" required>
         </div>
         <div class="row pt-3 pr-3 pl-3">
            <input type="number" class="form-control" name="criteriaID" id="criteriaID" placeholder="CRITERIA ID" required>
         </div>
         <div class="col-8  pt-3 pr-3 pl-3">
            <button type="submit" class="btn btn-primary btn-block" name =submit>submit</button>
          </div>
      </form>
      </p>
    </div>
    </div>
  </div>

<script src="../asset/jquery/jquery.min.js"></script>
<script src="../asset/bootstrap/js/bootstrap.min.js"></script>
<script src="../asset/js/slide_menu.js"></script>
</body>
</html>