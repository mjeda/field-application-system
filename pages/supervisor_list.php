<div class="row card shadow mt-4">
    <div class="card-body">
        <p class="h5 text-center text-bold">List of Supervisor</p>
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>SN</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Status</th>
                            <th>Departmant</th>
                            <th>Email</th>
                            <th>PhoneNumber</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("connection.php");
                            $sql_se = "select * from internship.supervisors, internship.user, internship.department
                                        WHERE supervisors.userID = user.userID and supervisors.depID = department.DepID";
                            $stmt_se = $pdo->prepare($sql_se);  
                            $stmt_se->execute();
                            $rows = $stmt_se->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rows as $key => $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $key+1 ?></td>
                                        <td><?php echo $row['userName'] ?></td>
                                        <td><?php echo $row['fullname'] ?></td>
                                        <td><?php echo $row['status'] ?></td>
                                        <td><?php echo $row['DepName'] ?></td>
                                        <td><?php echo $row['Email'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td>
                                            <div class="">
                                                <span><a onclick="return confirm('Are you sure! \nYou want to delete this <?php echo $row['userName'] ?> Supervisor?')" href="user_handler.php?r-user=<?php echo $row['userID'] ?>" class="btn btn-danger btn-sm">Remove</a></span>  
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