<?php 
    session_start();
    require_once 'connection.php';
    if (isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['role'])) {
        
    // }
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];
    $id = $_SESSION['id'];
    $role = $_SESSION['role'];
    $url = $_SERVER['HTTP_HOST'];
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/zoomlion/styles/bootstrap@5.2.0-beta1.min.css?style=<?= time(); ?>"> -->
    <link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/zoomlion/styles/bootstrap.4.1.3.min.css?style=<?= time(); ?>">
    <link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/zoomlion/styles/all.css?style=<?= time(); ?>">
    <link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/zoomlion/styles/bootstrap 5.0.2.css?style=<?= time(); ?>">
    <link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/zoomlion/styles/style.css?style=<?= time(); ?>">
    <link rel="stylesheet" href="<?php echo 'http://'.$url; ?>/zoomlion/styles/print.css?style=<?= time(); ?>" media="print">
    <title>Zoomlion</title>
</head>

<body>


    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-zoom shadow fixed-top header">
        <div class="container-fluid">
            <?php
                if($role == 1) { ?>
                    <!-- offcanvas trigger button start -->
                    <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
                    </button>
                    <!-- offcanvas trigger button end -->
            <?php    }
            ?>
            
            <a class="navbar-brand fw-bold text-uppercase me-auto" href="<?php if ($role == 1) { echo 'index.php'; } else { echo 'index.php'; } ?>">zoomlion &ThickSpace;
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- navmenu from project start -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="<?php if ($role == 1) { echo 'admin_account.php'; } else { echo './account.php'; } ?>"
                            class="nav-link active">My Account</a>
                    </li>
                    <?php if ($role == 0) { ?>
                        <li class="nav-item">
                            <a href="index.php#about" class="nav-link active"> About</a>
                    </li>'
                    <?php } ?>
                    <?php if ($role == 0) { ?>
                        <li class="nav-item">
                            <a href="index.php#FAQ" class="nav-link active"> Contact</a>
                    </li>'
                    <?php } ?>
                   <!--  <li class="nav-item <?php //if(@$_GET['page'] == 'questions') echo 'active'; ?>">
                        <a href="<?php if ($role == 1) { echo '#'; } else { echo 'index.php#about'; } ?>"
                            class="nav-link <?php //if(@$_GET['default'] == 'questions') echo 'active'; ?> active"> About</a>
                    </li> -->

                    <!-- <li class="nav-item <?php //if(@$_GET['page'] == 'users') echo 'active'; ?> ">
                        <a href="<?php echo 'http://'.$url; ?>/zoomlion/<?php //if($role == 1) echo 'admin/'; ?>contact.php" class="nav-link active"> Contact</a>
                        <a href="index.php#FAQ" class="nav-link active"> Contact</a>
                    </li> -->
                    <?php if ($role == 0) { ?> 
                        <!-- <li class="nav-item <?php //if(@$_GET['page'] == 'questions') echo 'active'; ?>">
                            <a href="#"
                                class="nav-link <?php //if(@$_GET['default'] == 'questions') echo 'active'; ?> active"> Subscriptions</a>
                        </li> -->
                    <?php } ?>
                    
                </ul>
            </div>
            <!-- navmenu from project end -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-auto">
                    <!-- <div class="input-group my-3 my-lg-0" data-bs-toggle="tooltip" data-bs-placement="top" title="">

                        <a href="index.php?page=notifications" class="btn btn- mx-1 notification_btn" type="button"
                            id="button-addon"><i class="fas fa-bell text-light"><sup><span
                                        class="badge bg-warning text-dark" id="notificationCount"></span></sup></i></a>
                        <input type="text" class="form-control" id="adminSearch" placeholder="Search">
                        <button class="btn btn-warning" type="button" id="generalSearchBtn"><i
                                class="fas fa-search"></i></button>
                    </div> -->
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <div class="d-flex ms-auto">
                        <li class="nav-item " id="<?php if ($role == 1) { echo 'notifBtn'; } else { echo 'userNotifBtn'; } ?>">
                            <a href="<?php if ($role == 1) { echo 'notifications.php'; } else { echo './user_notif.php'; } ?>" class="nav-link active"><i class="far fa-bell"></i><sup id="<?php if ($role == 1) { echo 'notifCount'; } else { echo 'userNotifCount'; } ?>"></sup> </a>
                        </li>
                    </div>   
                    <div class="d-flex ms-auto">
                        <li class="nav-item text-capitalize">
                            <a href="<?php if ($role == 1) { echo 'admin_account.php'; } else { echo './account.php'; } ?>" class="nav-link active"><i class="far fa-user"></i> <?= $name; ?>  </a>
                        </li>
                    </div>   
                    <div class="d-flex ms-auto">  
                        <li class="nav-item">
                            <a href="<?php if ($role == 1) { echo '../logout.php'; } else { echo 'logout.php'; } ?>" class="nav-link active text-warning"><i class="fas fa-power-off"></i> Logout</a>
                        </li>
                    </div>    
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-center" href="../user_account.php?page=profile"><img
                                        src="../<?php //echo $profilePic; ?>" class="img-thumbnail img-fluid profilePic"
                                        alt="Your Profile Picture Appears Here"> <br>
                                    <?php //echo $fullname; ?>
                                </a></li>
                            <li><a class="dropdown-item text-center" href="user_account.php?page=profile">My Account</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log
                                    out</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->
<?php } else {
    header("location: login.php");
}