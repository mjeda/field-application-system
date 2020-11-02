<?php
session_start();
include("connection.php");
try {
    if(isset($_POST['a-user']) && $_SESSION['role'] == "admin"){
        $username = $_POST['username'];
        $Role = $_POST['role'];
        $password =$_POST['password'];
        $conf_password =$_POST['conf_password'];
        $Email =$_POST['email'];
        $pass = md5($password);

        if($password == $conf_password){
            $sql = "INSERT INTO internship.user VALUES('$username','','$Role','$pass','$Email')";
            $row = $stmt = $pdo->query($sql);  
            if($row){
                $_SESSION['msg_type'] = "success";
                $_SESSION['msg'] = "Successfull to insert information. Congradulation...";
                header('location:dashboard.php?user-list');
            } else{
                $_SESSION['msg_type'] = "danger";
                $_SESSION['msg'] = "Not successfull to insert your information please try again!";
                header('Location:dashboard.php?user-form');
            }
        } else{
            $_SESSION['msg_type'] = "danger";
            $_SESSION['msg'] = "Password not match, please try again!";
            header('Location:dashboard.php?user-form');
        }
    }

    if(isset($_POST['up_user']) && $_SESSION['role'] == "admin"){
        $username = $_POST['username'];
        $role = $_POST['role'];
        $email =$_POST['email'];
        $userID =$_POST['userID'];
    
        $sql = "update internship.user set userName = ?, Email = ?, Role = ? where userID = ?";
        $stmt = $pdo->prepare($sql);
        $row = $stmt->execute([$username, $email, $role, $userID]);
        if($row){
            $_SESSION['msg_type'] = "success";
            $_SESSION['msg'] = "Successfull to update information. Congradulation...";
            header('location:dashboard.php?user-list');
        } else{
            $_SESSION['msg_type'] = "danger";
            $_SESSION['msg'] = "Not successfull to update your information please try again!";
            header('Location:dashboard.php?user-list');
        }
    }
    if(isset($_GET['r-user']) && $_SESSION['role'] == "admin"){
        $userID = $_GET['r-user'];
    
        $sql = "delete from internship.user where userID = ?";
        $stmt = $pdo->prepare($sql);
        $row = $stmt->execute([$userID]);
        if($row){
            $_SESSION['msg_type'] = "success";
            $_SESSION['msg'] = "Successfull to delete information. Congradulation...";
            header('location:dashboard.php?user-list');
        } else{
            $_SESSION['msg_type'] = "danger";
            $_SESSION['msg'] = "Not successfull to delete your information please try again!";
            header('Location:dashboard.php?user-list');
        }
    }
} catch (PDOException $event) {
    $_SESSION['msg_type'] = "danger";
    $_SESSION['msg'] = $event->getMessage();
    header('Location:dashboard.php?user-list');
}
