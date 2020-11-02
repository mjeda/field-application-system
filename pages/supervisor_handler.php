<?php
session_start();
include("connection.php");
try {
    $Name = $_POST['supName'];
    $status = $_POST['status'];
    $DepID = $_POST['depID'];
    $phone = $_POST['phone'];
    $userID =$_SESSION['userID'];

    if(isset($_POST['submit'])){
        $sql = "INSERT INTO internship.supervisors(fullname, status, depID, userID, phone) VALUES('$Name','$status','$DepID','$userID','$phone')";
        $stmt = $pdo->prepare($sql);  
        $row = $stmt->execute();
        if($row){
            $_SESSION['msg_type'] = "success";
            $_SESSION['msg'] = "Successfull to insert information. Congradulation...";
            header('location:dashboard.php');
        } else{
            $_SESSION['msg_type'] = "danger";
            $_SESSION['msg'] = "Not successfull to insert your information please try again!";
            header('Location:dashboard.php?supervisor-form');
        }
    }
   }
catch (PDOException $event) {
    echo $event->getMessage();
}

