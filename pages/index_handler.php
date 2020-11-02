<?php
session_start();
include("connection.php");
try {
    $email = $_POST['Email'];
    $pass =$_POST['password'];
    if(isset($_POST['login'])){
        $sql = "SELECT * FROM internship.user WHERE Email =? and password =?";
        $stmt = $pdo->prepare($sql);  
        $stmt->execute([ $email, md5($pass)]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "";
        if($row){
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['user_name'] = $row['userName'];
            $_SESSION['role'] = $row['Role'];
            header('location:dashboard.php');
        }else{
            $_SESSION['error_msg'] = "Invalide email/password";
            header('Location:../');
        }
    }
}
catch(PDOexception $event){
    echo $event->getMessage;
}

