<?php
include("connection.php");
try{
    $AppID = $_POST['AppID'];
    $DepID = $_POST['DepID'];
    

    if(isset($_POST['submit'])){
        $sql = "INSERT INTO internship.applicationdepertment VALUES('','$AppID','$DepID')";
        $stmt = $pdo->prepare($sql);
        $row = $stmt->execute();
        if($row){
            header('location:dashboard.php');
        }else{
            header('location:applicationdeprtment_form.php');
        }
    }
}catch(PDOException $event){
        echo $event->getMessage();
    }     