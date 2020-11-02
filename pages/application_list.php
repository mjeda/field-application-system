<?php
include("connection.php");
if(isset($_GET['app-con']) ){
    session_start();
    if ( $_SESSION['role'] == "admin" ) {
        $sql_app = "update internship.application set appStatus = 'Confirmed' where AppID = ? ";
        $stmt_app = $pdo->prepare($sql_app);  
        $row = $stmt_app->execute([ $_GET['app-con'] ]);
        if($row){
            $_SESSION['msg_type'] = "success";
            $_SESSION['msg'] = "Successfull to insert information. Congradulation...";
            header('location:dashboard.php?application-list');
        } else{
            $_SESSION['msg_type'] = "error";
            $_SESSION['msg'] = "Not successfull to insert your information please try again!";
            header('Location:dashboard.php?application-list');
        }
    }
}

if(isset($_POST['app-sup-btn']) ){
    session_start();
    if ( $_SESSION['role'] == "admin" ) {
        $appID = $_POST['appID'];
        $supID = $_POST['supID'];
        echo $supID." ".$appID;
        $sql_app = "insert into internship.supervisorapplication(supID, appID) values(?,?)";
        $stmt_app = $pdo->prepare($sql_app);  
        $row = $stmt_app->execute([ $supID, $appID ]);
        if($row){
            $_SESSION['msg_type'] = "success";
            $_SESSION['msg'] = "Successfull to insert information. Congradulation...";
            header('location:dashboard.php?application-list');
        } else{
            $_SESSION['msg_type'] = "error";
            $_SESSION['msg'] = "Not successfull to insert your information please try again!";
            header('Location:dashboard.php?application-list');
        }
    }
}

if(isset($_GET['r-app']) ){
    session_start();
    if ( $_SESSION['role'] == "admin" ) {
        $appID = $_GET['r-app'];
        $sql = "delete from internship.application where AppID = ?";
        $stmt = $pdo->prepare($sql);
        $row = $stmt->execute([$appID]);
        if($row){
            $_SESSION['msg_type'] = "success";
            $_SESSION['msg'] = "Successfull to delete information. Congradulation...";
            header('location:dashboard.php?application-list');
        } else{
            $_SESSION['msg_type'] = "danger";
            $_SESSION['msg'] = "Not successfull to delete your information please try again!";
            header('Location:dashboard.php?application-list');
        }
    }
}
?>

<div class="row card shadow">
    <div class="card-body">
        <p class="h5 text-center text-bold">List of Internship Application</p>
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>SN</th>
                            <th>Application_Name</th>
                            <th>Level</th>
                            <th>Department</th>
                            <th>Supervisor_Name</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql_se = "select * from internship.applicationdepertment, internship.application, internship.department, internship.student
                                    WHERE applicationdepertment.AppID = application.AppID AND applicationdepertment.DepID = department.DepID
                                    AND application.stuID = student.stuID";
                            $stmt_se = $pdo->prepare($sql_se);  
                            $stmt_se->execute();
                            $rows = $stmt_se->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $key => $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $key+1 ?></td>
                                        <td><?php echo $row['applName'] ?></td>
                                        <td><?php echo $row['level'] ?></td>
                                        <td><?php echo $row['DepName'] ?></td>
                                        <td>
                                            <?php
                                                $sql_se = "select fullname from internship.supervisors, internship.supervisorapplication 
                                                            WHERE supervisors.supID = supervisorapplication.supID and supervisorapplication.appID = ?";
                                                $stmt_se = $pdo->prepare($sql_se);  
                                                $stmt_se->execute([ $row['AppID'] ]);
                                                $rows = $stmt_se->fetch(PDO::FETCH_ASSOC);
                                                if(empty($rows['fullname'] )){
                                                    ?><span><a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#user<?php echo $row['AppID'] ?>">Add Supervisor</a></span><?php
                                                } else{
                                                    echo $rows['fullname'];
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if($row['appStatus'] == "Not confirm"){
                                                    ?>
                                                        <span><a href="application_list.php?app-con=<?php echo $row['AppID'] ?>" class="btn btn-info btn-sm btn-block">Confirm Now</a></span> 
                                                    <?php
                                                }else{
                                                    echo $row['appStatus'];
                                                } 
                                            ?>
                                        </td>
                                        <td><?php echo $row['AppDate'] ?></td>
                                        <td>
                                            <div class="">
                                            <span><a href="application_list.php?r-app=<?php echo $row['AppID'] ?>" class="btn btn-danger btn-sm btn-block">Remove</a></span> 
                                            </div>   
                                        </td>
                                    </tr>
                                    <!-- POPUP MODEL -->
                                    <div class="modal fade" id="user<?php echo $row['AppID'] ?>" tabindex="-1" role="dialog" aria-labelledby="laboModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h5 class="modal-title" id="laboModalLabel">Internship</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="btn btn-danger">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body pr-4 pl-4">
                                                    <h5 class="text-bold text-center">Edit User Form</h5>
                                                    <form action="application_list.php" method="POST" class="pb-3">
                                                        <input type="hidden" name="appID" value="<?php echo $row['AppID'] ?>">
                                                        <div class="row pt-3 pr-3 pl-3">
                                                            <label for="appName">Application Name</label>
                                                            <input type="text" class="form-control" name="appName" value="<?php echo $row['applName'] ?>" id="appName" readonly>
                                                        </div>
                                                        <div class="row pr-3 pl-3">
                                                            <label for="supID">Supervisor Name</label>
                                                            <select class="form-control" name="supID" id="role" placeholder="enter your user name" required>
                                                            <option value=""> select supervisor </option>
                                                            <?php
                                                                $sql_se = "select * from internship.supervisors";
                                                                $stmt_se = $pdo->prepare($sql_se);  
                                                                $stmt_se->execute();
                                                                $rows = $stmt_se->fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($rows as $row ) {
                                                                    ?>
                                                                        <option value="<?php echo $row['supID'] ?>"><?php echo $row['fullname'] ?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                            </select>
                                                        </div>
                                                        <div class="row  pt-3 pr-4 pl-4">
                                                        <div class="col-12 col-md-2 col-lg-2"></div>
                                                        <div class="col-12 col-md-8 col-lg-8">
                                                            <button type="submit" class="btn btn-primary btn-block" name ="app-sup-btn">Add Supervisor</button>
                                                        </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>