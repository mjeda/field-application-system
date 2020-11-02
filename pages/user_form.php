<div class="row">
    <div class=" card col-12 col-sm-12 col-md-12 col-lg-12 my-5">
      <div class="card-title text-center h4 p-3">
        ADD NEW USER 
      </div>
      <form action="user_handler.php" method="POST" class="pb-3">
         <div class="row pt-3 pr-3 pl-3">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="enter user name" required>
         </div>
         <div class="row">
            <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
               <label for="email">Email</label>
             <input type="email" class="form-control" name="email" id="email" placeholder="enter your email" required>
            </div>
          <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
            <label for="role">Role</label>
            <select class="form-control" name="role" id="role" placeholder="enter your user name" required>
               <option value="">select role</option>
               <option value="supervisor">Supervisor</option>
               <option value="student">Student</option>
            </select>
          </div>
         </div>
        <div class="row">
          <div class="col-12 col-md-6 pt-3 pr-3 pl-3">
          <label for="password">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="enter password" required>
          </div>
          <div class="col-12 col-md-6 pt-3 pr-3 pl-3">
            <label for="conf_password">Confirm Password</label>
            <input type="password" class="form-control" name="conf_password" id="conf_password" placeholder="confirm your password" required>
          </div>
        </div>
        <div class="row  pt-3 pr-4 pl-4">
          <div class="col-12 col-md-4 col-lg-4"></div>
          <div class="col-12 col-md-4 col-lg-4">
            <button type="submit" class="btn btn-primary btn-block" name ="a-user">Save Info...</button>
          </div>
        </div>
      </form>
      </p>
    </div>
</div>