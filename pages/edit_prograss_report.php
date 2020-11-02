<?php
include("connection.php");

if (isset($_POST['rep-prog-btn'])) {
  session_start();
  $appID = $_POST['appID'];
  $repTitle = $_POST['repTitle'];
  $repDate = $_POST['repDate'];
  $repDesc = $_POST['repDesc'];

  $sql = "update internship.prograssreport set Date = ?, title = ?, Report = ? where ReportID = ?";
  $stmt = $pdo->prepare($sql);  
  $row = $stmt->execute([ $repDate, $repTitle, $repDesc, $appID ]);
  if($row){
      $_SESSION['msg_type'] = "success";
      $_SESSION['msg'] = "Successfull to insert information. Congradulation...";
      header('location:dashboard.php?prog-rep-list-list');
  } else{
      $_SESSION['msg_type'] = "danger";
      $_SESSION['msg'] = "Not successfull to insert your information please try again!";
      header('Location:report_progress_form.php?e-prog-rep');
  }
}

if (isset($_GET['e-prog-rep'])) {
  $sql = "select * from internship.prograssreport where ReportID = ?";
  $stmt = $pdo->prepare($sql);  
  $stmt->execute([ $_GET['e-prog-rep'] ]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="row">
    <div class=" card col-12 col-sm-12 col-md-12 col-lg-12 my-5">
      <div class="card-title text-center h4 p-3">
        REPORT PROGRASS FORM 
      </div>
      <form action="edit_prograss_report.php" method="POST" class="pb-3">
        <input type="hidden" name="appID" value="<?php echo $row['ReportID']?>">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
            <label for="repTitle">Report Title</label>
            <input type="text" class="form-control" value="<?php echo $row['title']?>" name="repTitle" id="repTitle" placeholder="enter your title" required>
          </div>
          <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
            <label for="repDate">Report Date</label>
             <input type="date" max="<?php echo date('Y-m-d')?>" value="<?php echo $row['Date']?>" class="form-control" name="repDate" id="repDate" placeholder="enter report date" required>
          </div>
        </div>
        <div class="row pt-3 pr-3 pl-3">
          <label for="repDesc">Report Description</label>
          <textarea name="repDesc" id="repDesc" cols="30" rows="10" class="form-control" placeholder="enter description..."><?php echo $row['Report']?></textarea>
        </div>
        <div class="row  pt-3 pr-4 pl-4">
          <div class="col-12 col-md-4 col-lg-4"></div>
          <div class="col-12 col-md-4 col-lg-4">
            <button type="submit" class="btn btn-primary btn-block" name ="rep-prog-btn">Edit Report</button>
          </div>
        </div>
      </form>
      </p>
    </div>
</div><?php
}
?>