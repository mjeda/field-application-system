<div class="row">
    <div class=" card col-12 col-sm-12 col-md-12 col-lg-12 my-5">
      <div class="card-title text-center h4 p-3">
        USER INFORMATION FORM 
      </div>
      <form action="student_handler.php" method="POST" class="pb-3">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
            <label for="stuName">Full name</label>
            <input type="text" class="form-control" name="stuName" id="stuName" placeholder="enter your full name" required>
          </div>
          <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
            <label for="phone">Phone Number</label>
             <input type="number" class="form-control" name="phone" id="phone" placeholder="enter your phone number" required>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6 pt-3 pr-3 pl-3">
          <label for="universityName">University Name</label>
              <input type="text" class="form-control" name="universityName" id="universityName" placeholder="enter latest university name" required>
          </div>
          <div class="col-12 col-md-6 pt-3 pr-3 pl-3">
            <label for="universityName">Program Name</label>
            <input type="text" class="form-control" name="program" id="program" placeholder="enter program/course name" required>
          </div>
        </div>
        <div class="row pt-3 pr-3 pl-3">
          <label for="address">Address</label>
          <textarea name="address" id="address" cols="30" rows="5" class="form-control"></textarea>
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