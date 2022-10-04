<?php include_once 'includes/header.php'; ?>

<div class="container">
    <div class="row mt-5">
        <?php
        if (@$_GET['msg']) {
            if (@$_GET['alertClass']) { ?>
                <div class="alert  alert-dismissible fade show <?= $_GET['alertClass']; ?> text-center" role="alert"><?= $_GET['msg']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            <?php }
        }
            $sql = "SELECT * FROM userstable WHERE email = '$email'";
            $data = mysqli_fetch_assoc(mysqli_query($con, $sql));
            if (strtolower($data['gender']) == 'm') {
                $gender = "Male";
            } else {
                $gender = "Female";
            }
        ?>
        <h2 class="text-center text-zoom mt-2">My Account</h2>
        <hr>
        <div class="col-md-4">
            <div class="card bg-zoom mt-5" style="width: 20rem;">
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
            <h2 class="text-center text-zoom mt-3">Update Your Account</h2>
            <h3 class="text-center text-zoom mt-3">Your Personal Information</h3>

            <form action="handlers/account_handler.php" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" name="surname" id="surname" value="<?= $data['surname']; ?>" class="form-control form-control-lg border border-primary">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" name="firstname" id="firstname" value="<?= $data['firstname']; ?>" class="form-control form-control-lg border border-primary">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" value="<?= $data['email']; ?>" class="form-control form-control-lg border border-primary">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" name="phone" id="phone" value="<?= $data['phone']; ?>" class="form-control form-control-lg border border-primary">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <!-- <input type="tel" name="phone" id="phone" class="form-control form-control-lg border border-primary"> -->
                        <select name="gender" id="gender" class="form-select form-select-lg border border-primary">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <h3 class="text-center text-zoom mt-3">Your House Information</h3>
                    <?php
                        $sql = "SELECT * FROM house_info WHERE email = '$email'";
                        $data = mysqli_fetch_assoc(mysqli_query($con, $sql));
                    ?>
                    <div class="col-md-6 mb-3">
                        <label for="houseName" class="form-label">House Name</label>
                        <input type="text" name="houseName" id="houseName" value="<?= $data['house_name']; ?>" class="form-control form-control-lg border border-primary">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="houseNo" class="form-label">House No</label>
                        <input type="text" name="houseNo" id="houseNo" value="<?= $data['house_no']; ?>" class="form-control form-control-lg border border-primary">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" id="location" value="<?= $data['location']; ?>" class="form-control form-control-lg border border-primary">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="landmark" class="form-label">Landmark</label>
                        <input type="text" name="landmark" id="landmark" value="<?= $data['landmark']; ?>" class="form-control form-control-lg border border-primary">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="region" class="form-label">Region</label>
                        <input type="text" name="region" id="region" value="<?= $data['region']; ?>" class="form-control form-control-lg border border-primary">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="district" class="form-label">District</label>
                        <input type="text" name="district" id="district" value="<?= $data['district']; ?>" class="form-control form-control-lg border border-primary">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="town" class="form-label">Town</label>
                        <input type="text" name="town" id="town" value="<?= $data['town']; ?>" class="form-control form-control-lg border border-primary">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="area" class="form-label">Area</label>
                        <input type="text" name="area" id="area" value="<?= $data['area']; ?>" class="form-control form-control-lg border border-primary">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="desc" class="form-label">House Description</label>
                        <!-- <input type="text" name="desc" id="desc" class="form-control form-control-lg border border-primary"> -->
                        <textarea name="desc" id="desc" cols="" rows="3" class="form-control form-control-lg border border-primary"><?= $data['desc']; ?></textarea>
                    </div>
                    <div class="row">
                        <button type="submit" name="accUpdSubmit" id="accUpdSubmit" class="btn btn-zoom btn-lg btn-block">Update</button>
                    </div>
                    <h6 class="text-center text-zoom mt-3">Your position on google map based on location you provided</h6>
                    <h6 class="text-center text-zoom mt-3">Please make sure you provide accurate location</h6> 
                    <div class="row">
                        <iframe src="https://maps.google.com/maps?q=<?php echo $data['location']; ?>&output=embed" frameborder="2" width="100%" height="500" class=""></iframe>
                    </div>
                </div>
            </form>
        </div>
            
    </div>
</div>











<?php include_once 'includes/footer.php'; ?>