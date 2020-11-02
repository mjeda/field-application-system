<?php
include("connection.php");
try{
    $date = $_POST['date'];
    $score = $_POST['score'];
    $supID = $_POST['supID'];
    $criteriaID = $_POST['criteriaID'];

    if(isset($_POST['submit'])){
        $sql = "INSERT INTO internship.prograssreport VALUES('','$date','$score','$supID','$criteriaID')";
        $stmt = $pdo->prepre($sql);
        $row = $stmt->excute();
        if($row){
            header('location:dashboard.php');
        }else{
            header('location:evaluation_form.php');
        }
    }
}catch(PDOException $event){
        echo $event->getMessage();
    }     