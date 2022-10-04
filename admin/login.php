<?php
   // require_once 'includes/header.php';
   $url = $_SERVER['HTTP_HOST'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/zoomlion/styles/bootstrap@5.2.0-beta1.min.css?style=<?= time(); ?>">
    <link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/zoomlion/styles/all.css?style=<?= time(); ?>">
    <link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/zoomlion/styles/style.css?style=<?= time(); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo 'http://'.$url; ?>/zoomlion/styles/style2.css">
    <title>login</title>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row align-items-center mt-5">
            <div class="col-md-6 col-lg-7">
                <img src="<?php echo 'http://'.$url; ?>/zoomlion/img/zoomlion.jpg" class="box-shadow" alt="zoomlion" width="700" heigth="1000">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="alert alert-danger text-center" role="alert" id="alert"></div>
                    <div>
                        <hr>
                        <h2 class="text-center text-primary">Admin Login</h2>
                    </div>
                    <div class="form-group mt-3">
                        <!-- <form action="handlers/login_handler.php" method="post" enctype="multipart/form-data"> -->
                            <div class="input-group custom">
                                <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter Email" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" name="password" id="password" placeholder="Password" required class="form-control form-control-lg">
                                <div class="input-group-append custom">
                                    <span class="input-group-text" onclick="toggle()"><i class="far fa-eye" id="eye"></i></span>
                                </div>
                            </div>
                            <div class="row pb-10">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember">
                                        <label class="custom-control-label" for="remember">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password"><a href="#passwordReset" data-bs-toggle="modal" data-bs-target="#passwordReset">Forgot Password?</a></div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-sm-12"> -->
                                    <!-- <div class="input-group mb-0"> -->
                                        <button class="btn btn-zoom btn-lg btn-block" id="adminLoginSubmit" name="submit" type="submit">Login</button>
                                    <!-- </div> -->
                                <!-- </div> -->
                            </div>
                            <!-- <div class="row mt-2">
                                <div class="col-12 text-center">
                                    <div class="forgot-password text-center">Don't Have Account? <a href="signup.php"> Sign Up</a></div>
                                </div>
                            </div> -->
                        <!-- </form> -->
                    </div>
                    <!-- forgot password Modal start -->
                <div class="modal fade" id="passwordReset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-zoom" id="staticBackdropLabel">Reset Forgot Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="../password_reset.php?step=1" method="post">
                                <div class="modal-body">
                                    <!-- <div class="mb-3"> -->
                                        <label for="passResetEmail" class="form-label">Email address</label>
                                        <!-- <input type="email" name="passResetEmail" id="passResetEmail" class="form-control form-control-lg border border-primary" placeholder="Enter your email address">
                                    </div> -->
                                    <div class="input-group custom">
                                        <input type="email" name="passResetEmail" id="passResetEmail" class="form-control form-control-lg border border-primary" placeholder="Enter Email">
                                        <div class="input-group-append custom">
                                            <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="passwordResetSubmit" class="btn btn-zoom">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- forgot password Modal end -->
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo 'http://'.$url; ?>/zoomlion/js/bootstrap.bundle.min.js?script=<?= time(); ?>"></script>
    <script src="<?php echo 'http://'.$url; ?>/zoomlion/js/bootstrap@5.2.0-beta1.min.js?style=<?= time(); ?>"></script>
    <script src="<?php echo 'http://'.$url; ?>/zoomlion/js/code.jquery.com-jquery-3.6.0.js?script=<?= time(); ?>"></script>
    <script src="<?php echo 'http://'.$url; ?>/zoomlion/js/index.js?script=<?= time(); ?>"></script>
    <?php //include_once 'includes/footer.php'; ?>
</body>
</html>