<?php
    //require_once 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/bootstrap@5.2.0-beta1.min.css?style=<?= time(); ?>">
        <link rel="stylesheet" href="./styles/all.css?style=<?= time(); ?>">
        <link rel="stylesheet" href="./styles/style.css?style=<?= time(); ?>">
        <link rel="stylesheet" type="text/css" href="styles/style2.css">
        <title>login</title>
    </head>
    <body class="bg-light">
        <div class="container">
            <div class="row align-items-center mt-5">
                <!-- <div class="col-md-6 col-lg-7">
                    <img src="img/tace vs morning starts.jpg" class="box-shadow" alt="zoomlion">
                </div> -->
                <div class="col-md-6 col-lg-12">
                    <div class="signup-box bg-white box-shadow border-radius-10 mt-3">
                        <div>
                            <div class="alert alert-danger text-center" role="alert" id="alert"></div>
                            <hr>
                            <h2 class="text-center text-primary">Sign Up</h2>
                        </div>
                        <div class="form-group mt-2">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group custom">
                                            <input type="text" name="surname" id="surname" class="form-control form-control-lg" placeholder="Enter Surname" required>
                                            <div class="input-group-append custom">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group custom">
                                            <input type="text" name="firstname" id="firstname" class="form-control form-control-lg" placeholder="Enter Firstname" required>
                                            <div class="input-group-append custom">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group custom">
                                            <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter Email" required>
                                            <div class="input-group-append custom">
                                                <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group custom">
                                            <!-- <input type="number" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter phone number"> -->
                                            <select name="gender" id="gender" class="form-select" required>
                                                <option selected>Gender</option>
                                                <option value="m">Male</option>
                                                <option value="f">Female</option>
                                            </select>
                                            <div class="input-group-append custom">
                                                <!-- <span class="input-group-text"><i class="fas fa-phone"></i></span> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group custom">
                                            <input type="number" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter phone number" required>
                                            <div class="input-group-append custom">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <div class="input-group custom">
                                            <input type="text" name="region" id="region" class="form-control form-control-lg" placeholder="Enter your region">
                                            <div class="input-group-append custom">
                                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-md-6">
                                        <div class="input-group custom">
                                            <input type="password" name="password" id="password" placeholder="Enter Password" required class="form-control form-control-lg">
                                            <div class="input-group-append custom">
                                                <span class="input-group-text" onclick="toggle()"><i class="far fa-eye" id="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group custom">
                                            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Re-type Password" required class="form-control form-control-lg">
                                            <div class="input-group-append custom">
                                                <span class="input-group-text" onclick="toggle2()"><i class="far fa-eye" id="eye2"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-1">
                                        <!-- <div class="col-sm-12 col-md-12"> -->
                                            <!-- <div class="input-group mb-0"> -->
                                                <button class="btn btn-primary btn-lg btn-block" id="signupSubmit" name="submit" type="button">Sing Up</button>
                                            <!-- </div> -->
                                        <!-- </div> -->
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12 text-center">
                                            <div class="forgot-password text-center">Already Have Account? <a href="login.php"> Log In</a></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js?script=<?= time(); ?>"></script>
        <script src="js/code.jquery.com-jquery-3.6.0.js?script=<?= time(); ?>"></script>
        <script src="js/index.js?script=<?= time(); ?>"></script>
    </body>
</html>