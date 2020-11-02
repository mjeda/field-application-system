<?php
    include("connection.php");
    if(isset($_POST['add_dep'])){
        session_start();
        $depName = $_POST['depName'];

        $sql = "INSERT INTO internship.department(DepName) VALUES(?)";
        $stmt = $pdo->prepare($sql);
        $row = $stmt->execute([$depName]);
        if($row){
            $_SESSION['msg_type'] = "success";
            $_SESSION['msg'] = "Successfull to insert information. Congradulation...";
            header('location:dashboard.php');
        } else{
            $_SESSION['msg_type'] = "danger";
            $_SESSION['msg'] = "Not successfull to insert your information please try again!";
            header('Location:dashboard.php');
        }
    }
    if(isset($_POST['dep_dep'])){
        session_start();
        $depName = $_POST['depName'];
        $depID = $_POST['depID'];

        $sql = "update internship.department set DepName = ? where DepID = ?";
        $stmt = $pdo->prepare($sql);
        $row = $stmt->execute([$depName, $depID]);
        if($row){
            $_SESSION['msg_type'] = "success";
            $_SESSION['msg'] = "Successfull to update information. Congradulation...";
            header('location:dashboard.php');
        } else{
            $_SESSION['msg_type'] = "danger";
            $_SESSION['msg'] = "Not successfull to update your information please try again!";
            header('Location:dashboard.php');
        }
    }
    if(isset($_GET['r-dep'])){
        $depID = $_GET['r-dep'];

        $sql = "delete from internship.department where DepID = ?";
        $stmt = $pdo->prepare($sql);
        $row = $stmt->execute([$depID]);
        if($row){
            $_SESSION['msg_type'] = "success";
            $_SESSION['msg'] = "Successfull to delete information. Congradulation...";
            header('location:dashboard.php');
        } else{
            $_SESSION['msg_type'] = "danger";
            $_SESSION['msg'] = "Not successfull to delete your information please try again!";
            header('Location:dashboard.php');
        }
    }

    if(isset($_SESSION['userID'])){
        $sql_user = "SELECT count(*) FROM internship.user";
        $stmt_user = $pdo->query($sql_user);
        $count_user = $stmt_user->fetchColumn();
        //print_r( $count_user);
        $sql_super = "SELECT count(*) FROM internship.supervisors";
        $stmt_super = $pdo->query($sql_super);
        $count_super = $stmt_super->fetchColumn();

        $sql_studen = "SELECT count(*) FROM internship.student";
        $stmt_student = $pdo->query($sql_studen);
        $count_student = $stmt_student->fetchColumn();
        ?>
<div class="row">
    <div class="col-12 col-sm-4 col-md-4 col-lg-3 bg-warning pb-2 pt-2 text-white badge-pill mr-4 mb-1">
        <span class="h5">Total User</span>
        <span class="pull-right">0<?php echo $count_user ?></h5>
    </div>
    <div class="col-12 col-sm-4 col-md-4 col-lg-5 bg-info p-2 text-white badge-pill mr-4 mb-1">
        <span class="h5">Total Supervisor</span>
        <span class="pull-right">0<?php echo $count_super ?></h5>
    </div>
    <div class="col-12 col-sm-4 col-md-4 col-lg-3 bg-success p-2 text-white badge-pill mb-1">
        <span class="h5">Total Student</span>
        <span class="pull-right">0<?php echo $count_student ?></h5>
    </div>
</div>

<div class="row card shadow mt-4">
    <div class="card-body">
        <form action="admin_dashboard_content.php" method="post" class="row pb-4">
            <input type="text" name="depName" id="depName" value="" required placeholder="enter the department name" class="form-control col-12 col-sm-7 col-md-8 col-lg-9 m-1">
            <input type="submit" name="add_dep" id="depName" value="Add Department" class="btn btn-sm btn-secondary col-12 col-sm-4 col-md-3 col-lg-2 my-1 mr-3 ml-1">
        </form>
        <p class="h5 text-center text-bold">List of Department</p>
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <colgroup>
                        <col span="1" style="width:3%">
                        <col span="1" style="width:85%">
                        <col span="1" style="width:12%">
                    </colgroup>
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>SN</th>
                            <th>Department Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql_se = "select * from internship.department";
                            $stmt_se = $pdo->prepare($sql_se);  
                            $stmt_se->execute();
                            $rows = $stmt_se->fetchAll(PDO::FETCH_ASSOC);
                            // for ($i=1; $i<= count($row); $i++) {
                            foreach ($rows as $key => $row ) {
                                ?>
                                    <tr>
                                        <td><?php echo $key + 1 ?></td>
                                        <td><?php echo $row['DepName'] ?></td>
                                        <td>
                                            <div class="pull-right" >
                                            <span><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dep<?php echo $row['DepID'] ?>">Edit</a></span>
                                            <span><a onclick="return confirm('Are you sure! \nYou want to delete this <?php echo $row['DepName'] ?> Department?')" href="?r-dep=<?php echo $row['DepID'] ?>" class="btn btn-danger btn-sm">Remove</a></span> 
                                            </div>   
                                        </td>
                                    </tr>
                                    <!-- POPUP MODEL -->
                                    <div class="modal fade" id="dep<?php echo $row['DepID'] ?>" tabindex="-1" role="dialog" aria-labelledby="laboModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h5 class="modal-title" id="laboModalLabel">Internship</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="btn btn-danger">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body pr-4 pl-4">
                                                    <h5 class="text-bold text-center">Edit Department Form</h5>
                                                    <form action="admin_dashboard_content.php" method="post">
                                                        <div class="row py-3">
                                                            <input type="hidden" name="depID" value="<?php echo $row['DepID'] ?>">
                                                            <input type="text" name="depName" id="depName" value="<?php echo $row['DepName'] ?>" required placeholder="enter the department name" class="form-control col-12">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4"></div>
                                                            <input type="submit" name="dep_dep" id="depName" value="Edit Department" class="btn btn-sm btn-secondary col-4">
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

<?php
    }
?>