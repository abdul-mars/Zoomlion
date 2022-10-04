<?php
    ob_start();
    include_once '../includes/header.php';
    include_once 'side_panel.php';

    // if(@$_GET['operation'] == 'delete_user'){
        if (isset($_POST['delete_admin_submit'])) {
            $email = $_GET['email'];
            $email = $_POST['delete_id'];

            $sql = "DELETE FROM userstable WHERE email = '$email'";
            if (mysqli_query($con, $sql)) {
                $sql = "DELETE FROM house_info WHERE email = '$email'";
                mysqli_query($con, $sql);
                $sql = "DELETE FROM pickup_requests WHERE email = '$email'";
                mysqli_query($con, $sql);
                $msg =  'User Deleted Successfully';
                $alertClass = 'alert-success';
                header("location: admins.php?msg=$msg&alertClass=$alertClass");
                exit();
            } else {
                $msg =  'Unable to delete user';
                $alertClass = 'alert-success';
                header("location: admins.php?msg=$msg&alertClass=$alertClass");
                exit();
                // echo "<script>alert('User Not Deleted');</script>";
            }
        }
    // }
?>

<main class="mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="mt-2 text-center">
                <div class="row">
                    <a href="admins_operations.php?operation=add_admin" class="btn btn-zoom btn-block btn-lg m-2">Add Admin</a>
                </div>
            </div>
            <h3 class="text-center text-primary fw-bold">All Administrators</h3>
            <hr>
            
            <?php
                if (@$_GET['msg']) {
                    if (@$_GET['alertClass']) { ?>
                      <div class="alert text-center <?= $_GET['alertClass']; ?>" role='alert'>
                          <?= $_GET['msg']; ?>
                      </div> 
            <?php   }
                }
            ?>
            <div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <!-- <th>Phone</th> -->
                            <th>Gender</th>
                            <th>Date Created</th>
                            <th colspan="" class="text-center">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM userstable WHERE role = 1 ORDER BY id DESC";
                            $result = mysqli_query($con, $sql);
                            $count = 1;
                            while($data = mysqli_fetch_array($result)){ 
                                $name = $data['surname'].' '.$data['firstname'];
                        ?>
                        <tr>            
                            <th><?= $count; ?></th>
                            <td><?= $name; ?></td>
                            <td><?= $data['email']; ?></td>
                            <td><?= $data['gender']; ?></td>
                            <td><?= $data['date_created']; ?></td>
                            <!-- <td><button class="btn btn-sm btn-primary">View History</button></td> -->
                            <td><button type="button" class="btn btn-sm btn-danger deleteBtn">Delete</button></td>
                            <!-- <td><a href="admins_operations.php?operation=delete_admin&email=<?= $data['email']; ?>" class="btn btn-sm btn-danger">Delete</a></td> -->
                        </tr>
                        <?php
                            $count++;
                            }
                        ?>
                    </tbody>
                </table>

                <!-- Delete pop up Modal start -->
                <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-danger" id="staticBackdropLabel">Delete User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="admins.php" id="delete_user_form" method="post">
                            <div class="modal-body text-center">
                                <i class="fas fa-exclamation-circle fa-5x text-danger"></i>
                                <input type="hidden" name="delete_id" id="delete_id">
                                <h4 class="text-danger">Do You realy Want to delete this user?</h4>
                                <h4 class="text-primary">This action is Irreversible</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" name="delete_admin_submit" class="btn btn-primary">Yes! Delete</button>
                            </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Delete pop up Modal end -->
            </div>
        </div>
    </div>
</main>






<?php 
    include_once '../includes/footer.php';
?>