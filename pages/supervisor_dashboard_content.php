<?php 
    include("connection.php");
    if(isset($_SESSION['userID']) && $_SESSION['role']="supervisor" ){
        $sql = "SELECT * FROM internship.supervisors WHERE userID = ?";
        $stmt = $pdo->prepare($sql);  
        $stmt->execute([ $_SESSION['userID']]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['supID'] = $row['supID'];
        if(empty($row)){
            header('location:?supervisor-form');
        }
?>
<div class="row">
    <p class="bg-secondary badge-pill col-12 col-sm-6 col-md-4 col-lg-3"><hr></p>
</div>
<div class="row card shadow">
    <div class="card-body">
        <p><a href="?edit-student-form=<?php echo $row['stuID'] ?>" class="btn btn-sm btn-secondary">Edit Profile</a></p>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <strong>Full Name: </strong><?php echo $row['fullname'] ?>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <strong>Phone Number: </strong><?php echo $row['phone'] ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <strong>University Name: </strong><?php echo $row['status'] ?>
            </div>
            <div class="col-12 col-md-6 col-lg-6"><?php
                $sql_se = "select * from internship.department where DepID = ?";
                  $stmt_se = $pdo->prepare($sql_se);  
                  $stmt_se->execute([ $row['depID'] ]);
                  $rows = $stmt_se->fetch(PDO::FETCH_ASSOC); ?>
                <strong>Program: </strong><?php echo $rows['DepName'] ?>
            </div>
        </div>
    </div>
</div>
<div class="row pt-3">
<div class="col-12 col-sm-6 col-md-8 col-lg-9"></div>
    <p class="bg-secondary badge-pill col-12 col-sm-6 col-md-4 col-lg-3"><hr></p>
</div>
<div class="row card shadow">
    <div class="card-body">
        <p class="h5 text-center text-bold">List of Internship Application</p>
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-secondary text-white">
                        <tr>
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
                            $sql_se = "select * from internship.applicationdepertment, internship.application, internship.department
                                    WHERE applicationdepertment.AppID = application.AppID
                                    AND applicationdepertment.DepID = department.DepID
                                    AND application.stuID = ?";
                            $stmt_se = $pdo->prepare($sql_se);  
                            $stmt_se->execute([ $_SESSION['supID'] ]);
                            $rows = $stmt_se->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['applName'] ?></td>
                                        <td><?php echo $row['level'] ?></td>
                                        <td><?php echo $row['DepName'] ?></td>
                                        <td class="text-danger">Pending</td>
                                        <td class="<?php if($row['appStatus'] == "Not confirm"){ echo "text-info";}else{echo "text-success";} ?>"><?php echo $row['appStatus'] ?></td>
                                        <td><?php echo $row['AppDate'] ?></td>
                                        <td>
                                            <div class="">
                                            <span><a href="?e-app-form=<?php echo $row['appdepID'] ?>" class="btn btn-primary btn-sm btn-block">Edit</a></span> 
                                            </div>   
                                        </td>
                                    </tr>
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