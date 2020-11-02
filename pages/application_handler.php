<?php
session_start();
include("connection.php");
try {
    $date =$_POST['date'];
    $name =$_POST['appName'];
    $level =$_POST['level'];
    $depID = $_POST['depID'];

    if(isset($_POST['apply'])){
            $sql_app = "INSERT INTO internship.application(applName,level,AppDate,stuID,appStatus ) VALUES(?,?,?,?,?)";
            $stmt_app = $pdo->prepare($sql_app);  
            $stmt_app->execute([$name, $level, $date, $_SESSION['studentID'], "Not confirm" ]);
            $app_id = $pdo->lastInsertId();
            $sql = "INSERT INTO internship.applicationdepertment(AppID, DepID) VALUES(?,?)";
            $stmt = $pdo->prepare($sql);  
            $row = $stmt->execute([$app_id, $depID ]);
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
