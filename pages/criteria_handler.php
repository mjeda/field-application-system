<?php
include("connection.php");
try{
    $criteriaName = $_POST['criteriaName'];
    

    if(isset($_POST['submit'])){
        $sql = "INSERT INTO internship.prograssreport VALUES('','$criteriaName')";
        $stmt = $pdo->prepre($sql);
        $row = $stmt->excute();
        if($row){
            header('location:dashboard.php');
        }else{
            header('location:criteria_form.php');
        }
    }
catch(PDOException $event){
        echo $event->getMessage();
    }     
}