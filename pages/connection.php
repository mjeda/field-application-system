<?php
    try {
        $host = 'localhost';
        $user = 'mjeda';
        $pass = 'mjeda';
        $dbname ='internship';

        $dns = 'mysql:host ='. $host .';dbname ='. $dbname;
        $pdo = new PDO($dns, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $event) {
        echo $event->getMessage();
    }
    
    