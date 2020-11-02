<?php
session_start();
include("connection.php");
try {
    $stuName =$_POST['stuName'];
    $address =$_POST['address'];
    $phone =$_POST['phone'];
    $universityName =$_POST['universityName'];
    $program = $_POST['program'];
    $userID = $_SESSION['userID'];


    if(isset($_POST['submit'])){
        //print($userID);
        $sql = "INSERT INTO internship.student (stuName, address, phone, universityName, program, userID) VALUES(?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);  
        $row = $stmt->execute([$stuName, $address, $phone, $universityName, $program, $userID]);
        if($row){
            $_SESSION['msg_type'] = "success";
            $_SESSION['msg'] = "Successfull to insert information. Congradulation...";
            header('location:dashboard.php');
        } else{
            $_SESSION['msg_type'] = "error";
            $_SESSION['msg'] = "Not successfull to insert your information please try again!";
            header('Location:student_form.php');
        }
    }
} catch(PDOException $event) {
    echo $event->getMessage();
}
