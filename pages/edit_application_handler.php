<?php
session_start();
include("connection.php");
try {
    $date =$_POST['date'];
    $name =$_POST['appName'];
    $level =$_POST['level'];
    $depID = $_POST['depID'];
    $appdepID = $_POST['appdepID'];
    $appID = $_POST['appID'];

    if(isset($_POST['apply'])){
            $sql_dep = "update internship.applicationdepertment set DepID = '".$depID."' where appdepID = '".$appdepID."' ";
            $stmt_dep = $pdo->query($sql_dep);
            $sql_app = "update internship.application set applName = ?, level = ?, AppDate =?,stuID = ? where AppID = ? ";
            $stmt_app = $pdo->prepare($sql_app);  
            $row = $stmt_app->execute([$name, $level, $date, $_SESSION['studentID'], $appID ]);
            if($row){
                $_SESSION['msg_type'] = "success";
                $_SESSION['msg'] = "Successfull to insert information. Congradulation...";
                header('location:dashboard.php');
            } else{
                $_SESSION['msg_type'] = "error";
                $_SESSION['msg'] = "Not successfull to insert your information please try again!";
                header('Location:application_form.php');
            }
        }
    }
catch(PDOException $event) {
    echo $event->getMessage();
}
