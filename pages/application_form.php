<div class="row">
    <div class=" card col-12 col-sm-12 col-md-12 col-lg-12 my-5">
      <div class="card-title text-center h4 p-3">
        APPLICATION FORM
      </div>
      <form action="application_handler.php" method="POST" class="pb-3">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
            <label for="appName">Program Application</label>
            <input type="text" class="form-control" name="appName" id="appName" placeholder="enter application program eg: networking" required>
          </div>
          <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
            <label for="date">Date</label>
             <input type="date" class="form-control" name="date" max="<?php echo date('Y-m-d') ?>" id="date" placeholder="Select date" required>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6 pt-3 pr-3 pl-3">
          <label for="level">Level</label>
              <input type="text" class="form-control" name="level" id="level" placeholder="enter your level" required>
          </div>
          <div class="col-12 col-md-6 pt-3 pr-3 pl-3">
            <label for="depName">Department Name</label>
            <select name="depID" id="depID" class="form-control" required>
            <option value="">select depatment</option>
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
</div>