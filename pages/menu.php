<div id="sidebar">
    <header>
        <a href="#"> STUDENT INTERNSHIP</a>
    </header>
<?php
    //print($_SESSION['role']);
    if($_SESSION['role'] == 'admin'){
        ?><ul id="nav">
            <li>
                <a href="?dashboard" class="nav-link">
                    <i class=""></i> Dashboard
                </a>
            </li>
            <li>
                <a href="?application-list" class="nav-link">
                    <i class=""></i> View Applications
                </a>
            </li>
            <li>
                <a href="?user-list" class="nav-link">
                    <i class=""></i> Manage User
                </a>
            </li>
            <li>
                <a href="?student-list" class="nav-link">
                    <i class=""></i> View Student
                </a>
            </li>
            <li>
                <a href="?supervisor-list" class="nav-link">
                    <i class=""></i> View Supervisor
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class=""></i> Change Password
                </a>
            </li>
        </ul><?php 
    }
    else if($_SESSION['role'] == 'student'){
        ?><ul id="nav">
            <li>
                <a href="?dashboard" class="nav-link">
                    <i class=""></i> Dashboard
                </a>
            </li>
            <li>
                <a href="?application" class="nav-link">
                    <i class=""></i>Application Form
                </a>
            </li>
            <li>
                <a href="?prog-rep-list-list" class="nav-link">
                    <i class=""></i> Manage Prograss Report
                </a>
            </li>
            <li>
                <a href="?change-password" class="nav-link">
                    <i class=""></i> Change Password
                </a>
            </li>
        </ul><?php
    }
    else if($_SESSION['role'] == 'supervisor'){
        ?><ul id="nav">
            <li>
                <a href="?dashboard" class="nav-link">
                    <i class=""></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class=""></i> Manage student
                </a>
            </li>
            <li>
                <a href="#" class="nav-link">
                    <i class=""></i> Change Password
                </a>
            </li>
        </ul><?php
    }
    else{
        header('Location: ../index.php');
    }
?>
</div>