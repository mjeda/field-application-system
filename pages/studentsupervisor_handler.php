<?php
 include("connection.php");
 try{
     $stuID = $_POST['stuID'];
     $supID = $_POST['supID'];
     $userID = $_POST['userID'];

     if(isset($_POST['submit'])){
         $sql = "INSERT INTO internship.studentsupervisor VALUES('','$stuID','$supID','$userID')";
         $stmt = $pdo->prepare($sql);
         $row = $stmt->excute();
         if($row){
             header('location:dashbaord.php');
         }else{
             header('loction:pages/studentsupervisor.php');
         }
     }
    } catch(PDOexception $event){
          echo $event->getMessage;
    }