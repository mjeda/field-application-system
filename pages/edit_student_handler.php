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
    $stuID = $_SESSION['studentID'];

    if(isset($_POST['submit'])){
        //print($userID);
        $sql = "update internship.student set stuName = ?, address = ? , phone = ?, universityName = ?, program =?, userID =?
                where stuID = ?";
        $stmt = $pdo->prepare($sql);  
        $row = $stmt->execute([$stuName, $address, $phone, $universityName, $program, $userID, $stuID]);
        if($row){
            $_SESSION['msg_type'] = "success";
            $_SESSION['msg'] = "Successfull to update information. Congradulation...";
            header('location:dashboard.php');
        } else{
            $_SESSION['msg_type'] = "error";
            $_SESSION['msg'] = "Not successfull to update your information please try again!";
            header('Location:student_form.php');
        }
    }
} catch(PDOException $event) {
    echo $event->getMessage();
}
