<?php
session_start();
include("connection.php");
try {
    $uname =$_POST['username'];
    $email =$_POST['email'];
    $pass =$_POST['password'];
    $confpass =$_POST['conf_password'];

    if(isset($_POST['register'])){
        $sql_check = "SELECT Email FROM internship.user WHERE Email =?";
        $stmt_check = $pdo->prepare($sql_check);  
        $stmt_check->execute([ $email]);
        $row = $stmt_check->fetch(PDO::FETCH_ASSOC);
        if($row){
            $_SESSION['e_msg'] = "email is already exist";
            header('location:register_form.php');
        }else if($pass != $confpass){
            $_SESSION['p_msg'] = "password not match";
            header('Location:register_form.php');
        }else {
            $sql = "INSERT INTO internship.user(userName,Email,password,Role) VALUES(:uname,:email,:pass,:role)";
            $stmt = $pdo->prepare($sql);  
            $row = $stmt->execute(['uname' => $uname, 'email'=>$email,'pass'=> md5($pass), 'role'=> 'student']);
            if($row){
                header('location:dashboard.php');
            }
        }
    }
}catch(PDOException $event) {
    echo $event->getMessage();
}
