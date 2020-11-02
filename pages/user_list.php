<div class="row card shadow mt-4">
    <div class="card-body">
        <div class="row pb-2">
            <a href="?user-form" class="btn btn-sm btn-secondary">Add User</a>
        </div>
        <p class="h5 text-center text-bold">List of Users</p>
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <colgroup>
                        <col span="1" style="width:3%">
                        <col span="1" style="width:20%">
                        <col span="1" style="width:30%">
                        <col span="1" style="width:25%">
                        <col span="1" style="width:12%">
                    </colgroup>
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>SN</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("connection.php");
                            $sql_se = "select * from internship.user";
                            $stmt_se = $pdo->prepare($sql_se);  
                            $stmt_se->execute();
                            $rows = $stmt_se->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $key => $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $key + 1 ?></td>
                                        <td><?php echo $row['userName'] ?></td>
                                        <td><?php echo $row['Email'] ?></td>
                                        <td><?php echo $row['Role'] ?></td>
                                        <td>
                                            <div class="pull-right" >
                                            <span><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#user<?php echo $row['userID'] ?>">Edit</a></span>
                                            <span><a onclick="return confirm('Are you sure! \nYou want to delete this <?php echo $row['userName'] ?> Department?')" href="user_handler.php?r-user=<?php echo $row['userID'] ?>" class="btn btn-danger btn-sm">Remove</a></span> 
                                            </div>   
                                        </td>
                                    </tr>
                                    <!-- POPUP MODEL -->
                                    <div class="modal fade" id="user<?php echo $row['userID'] ?>" tabindex="-1" role="dialog" aria-labelledby="laboModalLabel" aria-hidden="true">
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
                                                    <form action="user_handler.php" method="POST" class="pb-3">
                                                        <input type="hidden" name="userID" value="<?php echo $row['userID'] ?>">
                                                        <div class="row pt-3 pr-3 pl-3">
                                                            <label for="username">Username</label>
                                                            <input type="text" class="form-control" name="username" value="<?php echo $row['userName'] ?>" id="username" placeholder="enter user name" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" name="email" value="<?php echo $row['Email'] ?>" id="email" placeholder="enter your email" required>
                                                            </div>
                                                        <div class="col-12 col-md-6 col-lg-6 pt-3 pr-3 pl-3">
                                                            <label for="role">Role</label>
                                                            <select class="form-control" name="role" id="role" placeholder="enter your user name" required>
                                                            <option value="<?php echo $row['userID'] ?>"> <?php echo $row['Role'] ?> </option>
                                                            <option value="supervisor">Supervisor</option>
                                                            <option value="student">Student</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                        <div class="row  pt-3 pr-4 pl-4">
                                                        <div class="col-12 col-md-4 col-lg-4"></div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <button type="submit" class="btn btn-primary btn-block" name ="up_user">Edit User</button>
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