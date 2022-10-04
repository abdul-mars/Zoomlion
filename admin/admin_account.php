<?php include_once '../includes/header.php';
    include_once 'side_panel.php';
?>
<head>
    
</head>
<main class="mt-5 pt-3">
    <div class="container">
        <div class="row">
            <?php
                $sql = "SELECT * FROM userstable WHERE email = '$email'";
                $result = mysqli_query($con, $sql);
                $data = mysqli_fetch_assoc($result);
                if (strtolower($data['gender']) == 'm') {
                    $gender = "Male";
                } else {
                    $gender = "Female";
                }
            ?>
            <h2 class="text-center text-zoom m">My Account</h2>
            <hr>
            <div class="col-md-4">
                <div class="card bg-zoom" style="width: 20rem;">
                    <div class="card-header">
                        <h3 class="text-center bg-zoom text-light">Your Information</h3>
                    </div>
                    <table class="table text-light table-sm ml-2">
                        <tr>
                            <th>Surname:</th>
                            <th class="text-warning"><?= $data['surname']; ?></th>
                        </tr>
                        <tr>
                            <th>Firstname:</th>
                            <th class="text-warning"><?= $data['firstname']; ?></th>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <th class="text-warning"><?= $data['email']; ?></th>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <th class="text-warning"><?= $data['phone']; ?></th>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <th class="text-warning"><?= $gender ?></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-8">
                <h3 class="text-center text-zoom">Update Your Information</h3>
                <form action="admins_operations.php?operation=update_account" method="post">
                    <div class="row form-group">
                        <div class="col-md-6 mb-2">
                            <label for="surname" class="form-label">Surname</label>
                            <input type="text" name="surname" id="surname" value="<?= $data['surname']; ?>" class="form-control form-control-lg border border-primary">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" name="firstname" id="firstname" value="<?= $data['firstname']; ?>" class="form-control form-control-lg border border-primary">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" value="<?= $data['email']; ?>" class="form-control form-control-lg border border-primary">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" name="phone" id="phone" value="<?= $data['phone']; ?>" class="form-control form-control-lg border border-primary">
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="gender" class="form-label">Gender</label>
                            <!-- <input type="tel" name="phone" id="phone" class="form-control form-control-lg border border-primary"> -->
                            <select name="gender" id="gender" class="form-select form-select-lg border border-primary">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                        <div class="row">
                            <button type="submit" name="adminUpdSub" class="btn btn-zoom btn-lg ml-2">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>






<?php include_once '../includes/footer.php';
?>