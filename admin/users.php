<?php
    ob_start();
    include_once '../includes/header.php';
    include_once 'side_panel.php';

    // if(@$_GET['operation'] == 'delete_user'){
        if (isset($_POST['delete_user_submit'])) {
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
                header("location: users.php?msg=$msg&alertClass=$alertClass");
                exit();
            } else {
                $msg =  'Unable to delete user';
                $alertClass = 'alert-success';
                header("location: users.php?msg=$msg&alertClass=$alertClass");
                exit();
                echo "<script>alert('User Not Deleted');</script>";
            }
        }
    // }
?>

<main class="mt-5 pt-3">
    <div class="container">
        <div class="row">
            <h3 class="text-center text-primary fw-bold">All Users</h3>
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
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Date Joined</th>
                            <th colspan="" class="text-center">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM userstable ORDER BY id DESC";
                            $result = mysqli_query($con, $sql);
                            $count = 1;
                            while($data = mysqli_fetch_array($result)){ 
                                $name = $data['surname'].' '.$data['firstname'];
                        ?>
                        <tr>            
                            <th><?= $count; ?></th>
                            <td><?= $name; ?></td>
                            <td><?= $data['email']; ?></td>
                            <td><?= $data['phone']; ?></td>
                            <td class="text-uppercase"><?= $data['gender']; ?></td>
                            <td><?= $data['date_created']; ?></td>
                            <!-- <td><button class="btn btn-sm btn-primary">View History</button></td> -->
                            <td class="text-center"><button type="button" class="btn btn-sm btn-danger deleteBtn">Delete</button></td>
                            <!-- <td><a href="users.php?operation=delete_user&email=<?= $data['email']; ?>" class="btn btn-sm btn-danger">Delete</a></td> -->
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
                      <form action="users.php" id="delete_user_form" method="post">
                            <div class="modal-body text-center">
                                <i class="fas fa-exclamation-circle fa-5x text-danger"></i>
                                <input type="hidden" name="delete_id" id="delete_id">
                                <h4 class="text-danger">Do You realy Want to delete this user?</h4>
                                <h4 class="text-primary">This action is Irreversible</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                <button type="submit" name="delete_user_submit" class="btn btn-zoom">Yes! Delete</button>
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