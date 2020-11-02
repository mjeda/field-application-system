<?php
include("connection.php");
try {
    if(isset($_GET['r-prog-rep']) ){
        session_start();
        if ($_SESSION['role'] == "student") {
            $sql = "delete from internship.prograssreport where ReportID = ?";
            $stmt = $pdo->prepare($sql);
            $row = $stmt->execute([$_GET['r-prog-rep']]);
            if($row){
                $_SESSION['msg_type'] = "success";
                $_SESSION['msg'] = "Successfull to delete information. Congradulation...";
                header('location:dashboard.php?prog-rep-list-list');
            } else{
                $_SESSION['msg_type'] = "danger";
                $_SESSION['msg'] = "Not successfull to delete your information please try again!";
                header('Location:dashboard.php?prog-rep-list-list');
            }
        }
    }
} catch (PDOException $event) {
    $_SESSION['msg_type'] = "danger";
    $_SESSION['msg'] = $event->getMessage();
    header('Location:dashboard.php?user-list');
}
?>
<div class="row card shadow mt-4">
    <div class="card-body">
        <p class="h5 text-center text-bold">List of Progress Report</p>
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <colgroup>
                        <col span="1" style="width:3%">
                        <col span="1" style="width:20%">
                        <col span="1" style="width:20%">
                        <col span="1" style="width:35%">
                        <col span="1" style="width:10%">
                        <col span="1" style="width:12%">
                    </colgroup>
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>SN</th>
                            <th>ApplicationName</th>
                            <th>Title</th>
                            <th>Discription</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql_se = "select * from internship.prograssreport, internship.application
                                        where prograssreport.AppID = application.AppID and stuID = ?";
                            $stmt_se = $pdo->prepare($sql_se);  
                            $stmt_se->execute([ $_SESSION['studentID'] ]);
                            $rows = $stmt_se->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $key => $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $key + 1 ?></td>
                                        <td><?php echo $row['applName'] ?></td>
                                        <td><?php echo $row['title'] ?></td>
                                        <td><?php echo $row['Report'] ?></td>
                                        <td><?php echo $row['Date'] ?></td>
                                        <td>
                                            <div class="pull-right" >
                                            <span><a href="?e-prog-rep=<?php echo $row['ReportID'] ?>" class="btn btn-primary btn-sm">Edit</a></span>
                                            <span><a onclick="return confirm('Are you sure! \nYou want to delete this <?php echo $row['title'] ?> Report?')" href="prograss_report_list.php?r-prog-rep=<?php echo $row['ReportID'] ?>" class="btn btn-danger btn-sm">Remove</a></span> 
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