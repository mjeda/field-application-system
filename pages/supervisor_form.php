<div class="row">
    <div class=" card col-12 col-sm-12 col-md-12 col-lg-12 my-5">
      <div class="card-title text-center h4 p-3">
        ADD SUPERVISOR FORM 
      </div>
      <form action="supervisor_handler.php" method="POST" class="pb-3">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
            <label for="supName">Full name</label>
            <input type="text" class="form-control" name="supName" id="supName" placeholder="enter your full name" required>
          </div>
          <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
            <label for="phone">Phone Number</label>
             <input type="number" class="form-control" name="phone" id="phone" placeholder="enter your phone number" required>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6 pt-3 pr-3 pl-3">
          <label for="status">Status</label>
              <input type="text" class="form-control" name="status" id="status" placeholder="enter your status" required>
          </div>
          <div class="col-12 col-md-6 pt-3 pr-3 pl-3">
            <label for="depName">Department Name</label>
            <select name="depID" id="depID" class="form-control" required>
              <option value="" class="text-bold">select depatment</option>
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
            <button type="submit" class="btn btn-primary btn-block" name ="submit">Save Info...</button>
          </div>
        </div>
      </form>
      </p>
    </div>
</div>