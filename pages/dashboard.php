<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Student Internship</title>
    <link rel="stylesheet" href="../asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/css/slide_manu.css">
    
</head>
<body class="bg-light">
    <div id="viewport">
        <!-- Sidebar -->
        <?php include("menu.php") ?>
        <!-- Content -->
        <div id="content">
          <!-- Nav tabs -->
          <nav clas="shadow">
            <ul class="nav nav-tabs p-2" id="">
              <li class="mr-auto pr-2 pt-1 text-black-50">
                welcome back! <a href="#"></a> <?php print($_SESSION['user_name']); ?>
              </li>
              <li class="nav-item m-1">
                <a href="#" class="btn btn-sm btn-secondary">Profile</a>
              </li>
              <li class="nav-item m-1">
                <a href="logout.php" class="btn btn-sm btn-secondary">log-out</a>
              </li>
            </ul>
          </nav>
          
          <div class="container-fluid pt-3">
            <?php 
              if (isset($_SESSION['msg_type'])) {
                ?>
                  <div class="alert alert-<?php echo $_SESSION['msg_type']; ?>" role="alert">
                  <?php echo $_SESSION['msg']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                unset($_SESSION['msg_type']);
              }
            ?>
            <h5>Dashboard</h5>
            <div class="px-3 py-1">
              <?php
                if (isset($_GET['application-list'])) {
                  include 'application_list.php';
                }else if (isset($_GET['user-form'])&& $_SESSION['role'] == "admin") {
                  include 'user_form.php';
                }else if (isset($_GET['r-prog-form'])) {
                  include 'report_progress_form.php';
                }else if (isset($_GET['e-prog-rep'])) {
                  include 'edit_prograss_report.php';
                }else if (isset($_GET['prog-rep-list-list'])) {
                  include 'prograss_report_list.php';
                } else if(isset($_GET['student-form'])){
                  include 'student_form.php';
                }else if(isset($_GET['student-list']) && $_SESSION['role'] == "admin"){
                  include 'student_list.php';
                }else if(isset($_GET['edit-student-form'])){
                  include 'edit_student_form.php';
                }else if (isset($_GET['supervisor-form'])){
                  include 'supervisor_form.php';
                }else if (isset($_GET['supervisor-list'])&& $_SESSION['role'] == "admin"){
                  include 'supervisor_list.php';
                }else if (isset($_GET['user-list']) && $_SESSION['role'] == "admin"){
                  include 'user_list.php';
                }else if (isset($_GET['application'])){
                  include 'application_form.php';
                }else if (isset($_GET['e-app-form'])){
                  include 'edit_application_form.php';
                }else if (isset($_GET['dashboard'])){
                  if($_SESSION['role'] == 'student'){
                    include 'student_dashboard_content.php';
                  } else if($_SESSION['role'] == 'admin'){
                    include 'admin_dashboard_content.php';
                  }else if($_SESSION['role'] == 'supervisor'){
                    include 'supervisor_dashboard_content.php';
                  }
                }else{
                    if($_SESSION['role'] == 'student'){
                      include 'student_dashboard_content.php';
                    } else if($_SESSION['role'] == 'admin'){
                      include 'admin_dashboard_content.php';
                    }else if($_SESSION['role'] == 'supervisor'){
                      include 'supervisor_dashboard_content.php';
                    }
                }
                
              ?>
            </div>
          </div>
        </div>
      </div>

<script src="../asset/jquery/jquery.min.js"></script>
<script src="../asset/bootstrap/js/bootstrap.min.js"></script>
<script src="./asset/js/slide_menu.js"></script>
<script>
  $('#navId a').click(e => {
    e.preventDefault();
    $(this).tab('show');
  });
</script>
</body>
</html>