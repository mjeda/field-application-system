<?php
  include("connection.php");
  if(isset($_GET['e-app-form'])){
    $sql_se = "select * from internship.applicationdepertment, internship.application, internship.department
          WHERE applicationdepertment.AppID = application.AppID AND applicationdepertment.DepID = department.DepID
          AND applicationdepertment.appdepID = ? AND application.stuID = ?";
    $stmt_se = $pdo->prepare($sql_se);  
    $stmt_se->execute([ $_GET['e-app-form'], $_SESSION['studentID'] ]);
    $row = $stmt_se->fetch(PDO::FETCH_ASSOC);
?>
<div class="row">
    <div class=" card col-12 col-sm-12 col-md-12 col-lg-12 my-5">
      <div class="card-title text-center h4 p-3">
        APPLICATION FORM
      </div>
      <form action="edit_application_handler.php" method="POST" class="pb-3">
        <input type="hidden" name="appdepID" value="<?php echo $row['appdepID'] ?>">
        <input type="hidden" name="appID" value="<?php echo $row['AppID'] ?>">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
            <label for="appName">Program Application</label>
            <input type="text" class="form-control" name="appName" value="<?php echo $row['applName'] ?>" id="appName" placeholder="enter application program eg: networking" required>
          </div>
          <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
            <label for="date">Date</label>
             <input type="date" class="form-control" name="date" max="<?php echo date('Y-m-d') ?>" value="<?php echo $row['AppDate'] ?>" id="date" placeholder="Select date" required>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6 pt-3 pr-3 pl-3">
          <label for="level">Level</label>
              <input type="text" class="form-control" name="level" value="<?php echo $row['level'] ?>" id="level" placeholder="enter your level" required>
          </div>
          <div class="col-12 col-md-6 pt-3 pr-3 pl-3">
            <label for="depName">Department Name</label>
            <select name="depID" id="depID" class="form-control" required>
            <option value="<?php echo $row['DepID'] ?>"><?php echo $row['DepName'] ?></option>
            <?php
                include("connection.php");
                $sql_se = "select * from internship.department";
                $stmt_se = $pdo->prepare($sql_se);  
                $stmt_se->execute();
                $rows = $stmt_se->fetchAll(PDO::FETCH_ASSOC);
                foreach ($rows as $row ) {
                    ?>
                        <option value="<?php echo $row['DepID'] ?>"><?php echo $row['DepName'] ?></option>
                    <?php
                }
            ?>
            </select>
          </div>
        </div>
        <div class="row  pt-3 pr-4 pl-4">
          <div class="col-12 col-md-4 col-lg-4"></div>
          <div class="col-12 col-md-4 col-lg-4">
            <button type="submit" class="btn btn-primary btn-block" name ="apply">Apply</button>
          </div>
        </div>
      </form>
      </p>
    </div>
</div><?php
}
?>