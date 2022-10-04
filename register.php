<?php ob_start();
    require_once 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/core.css?style=<?= time(); ?>">
        <link rel="stylesheet" type="text/css" href="styles/style2.css?style=<?= time(); ?>">
        <!-- <link rel="stylesheet" type="text/css" href="styles/style.css"> -->
        <title>login</title>
    </head>
    <body class="bg-light">
        <div class="container">
            <div class="row align--center mt-5">
                <!-- <div class="col-md-6 col-lg-7">
                    <img src="img/tace vs morning starts.jpg" class="box-shadow" alt="zoomlion">
                </div> -->
                <?php
                    // $sql = "SELECT * FROM house_info WHERE email = '$email'";
                    // $result = mysqli_query($con, $sql);
                    // if (mysqli_num_rows($result) > 0) {
                    //     $msg = 'You have Already Registered';
                    //     header("location: index.php?msg=$msg");
                    //     exit();
                    // } else { ?>
                        <div class="alert alert-danger text-center" role="alert" id="alert">
                            <?php if(@$_GET['error']){ echo $_GET['error']; }?>
                        </div>
                    <div class="col-md-6 mt-3 box-shadow border-radius-10">
                        <h4 class="text-center text-zoom">Your Location on Google Map</h4>
                        <div class="loc bg-light">
                            <iframe src="https://maps.google.com/maps?q=<?php echo $location; ?>&output=embed" frameborder="2" width="100%" height="700"></iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="signup-box box-shadow border-radius-10 mt-3">
                            <div>
                                <hr>
                                <h2 class="text-center text-zoom">Complete Your Profile</h2>
                                <h5 class="text-center text-danger">This information will help us locate your place </h5>
                            </div>
                            <div class="form-group mt-2">
                                <!-- <form action="handlers/signup_handler.php" method="post" enctype="multipart/form-data"> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group custom">
                                                <input type="text" name="houseName" id="houseName" class="form-control form-control-lg" placeholder="Enter House Name">
                                                <div class="input-group-append custom">
                                                    <span class="input-group-text"><i class="fas fa-landmark"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group custom">
                                                <input type="text" name="houseNo" id="houseNo" class="form-control form-control-lg" placeholder="Enter House Number">
                                                <div class="input-group-append custom">
                                                    <span class="input-group-text"><i class="fas fa-hashtag sm"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                                <sup>We use address to find you on google map</sup>
                                            <div class="input-group custom">
                                                <input type="text" name="location" id="location" class="form-control form-control-lg" placeholder="Enter address">
                                                <div class="input-group-append custom">
                                                    <span class="input-group-text"><i class="fas fa-directions"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <div class="input-group custom">
                                                <input type="text" name="gps" id="gps" class="form-control form-control-lg" placeholder="Enter gps code">
                                                <div class="input-group-append custom">
                                                    <span class="input-group-text"><i class="fas fa-hospital"></i></span>
                                                </div>
                                            </div>
                                        </div>
 -->                                        <div class="col-md-6">
                                            <div class="input-group custom">
                                                <input type="text" name="landmark" id="landmark" class="form-control form-control-lg" placeholder="Enter any landmark near you">
                                                <div class="input-group-append custom">
                                                    <span class="input-group-text"><i class="fas fa-hospital"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group custom">
                                                <input type="text" name="region" id="region" class="form-control form-control-lg" placeholder="Enter your region">
                                                <div class="input-group-append custom">
                                                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group custom">
                                                <input type="text" name="district" id="district" class="form-control form-control-lg" placeholder="Enter your district">
                                                <div class="input-group-append custom">
                                                    <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group custom">
                                                <input type="text" name="town" id="town" class="form-control form-control-lg" placeholder="Enter your town">
                                                <div class="input-group-append custom">
                                                    <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group custom">
                                                <input type="text" name="area" id="area" class="form-control form-control-lg" placeholder="Enter your area">
                                                <div class="input-group-append custom">
                                                    <span class="input-group-text"><i class="fas fa-share"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="desc" class="form-label">Description of house</label>
                                            <div class="input-group custom">
                                                <!-- <input type="text" name="area" id="area" class="form-control form-control-lg" placeholder="Enter your area"> -->
                                                <textarea name="desc" id="desc" cols="" class="form-control" rows="100">Give A little description of your house</textarea>
                                                <div class="input-group-append custom">
                                                    <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="input-group mb-0">
                                                    <button class="btn btn-primary btn-lg btn-block" id="registerSubmit" name="submit" type="button">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row mt-2">
                                            <div class="col-12 text-center">
                                                <div class="forgot-password text-center">Already Have Account? <a href="login.php"> Log In</a></div>
                                            </div>
                                        </div> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php    //}
                ?>
            </div>
        </div>
<?php
    require_once 'includes/footer.php';
?>