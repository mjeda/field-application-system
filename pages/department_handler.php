<?php
include("connection.php");
try{
    $DepName = $_POST['DepName'];
    $AppID = $_POST['AppID'];


    if(isset($_POST['submit'])){
        $sql = "INSERT INTO internship.department VALUES('','$DepName','$AppID')";
        $stmt = $pdo->prepare($sql);
        $row = $stmt->excute();
        if($row){
            header('location:dashboard.php');
        }else{
            header('location:department_form.php');
        }
    }
}catch(PDOException $event){
        echo $event->getMessage();
    }    