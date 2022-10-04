<?php
    session_start();
    require_once 'includes/connection.php';
    $email = $_SESSION['email'];

    if (@$_GET['operation'] == 'request_pickup') {
        // $houseName = $_POST['houseName'];
        $wasteType = $_POST['wasteType'];
        // $location = $_POST['location'];
        // $gps = $_POST['gps'];
        $payment = $_POST['payment'];
        $date = $_POST['date'];
        $size = $_POST['size'];
        $time = $_POST['time'];

        // clean input
        function cleanInput($value){
            global $con;
            $value = strip_tags($value);
            $value = mysqli_real_escape_string($con, $value);
            return $value;
        }
        // call function to clean inputs
        // cleanInput($houseName);
        cleanInput($wasteType);
        // cleanInput($location);
        // cleanInput($gps);
        cleanInput($payment);
        cleanInput($date);
        cleanInput($size);
        cleanInput($time);

        if (strtolower($wasteType) == 'select' || strtolower($payment) == 'select' || strtolower($time) == 'select' || empty($size) || empty($date)) {
            echo 'Please all fields are required';
        } else {
            if ($size < 1) {
                echo "Please enter valid waste size";
            } else {
                $todayDate = date("Y-m-d");
                // $diff = date_diff(date_create($date), date_create($todayDate));
                // if ($diff->format("%y") < 12) {
                if ($todayDate > $date) {
                    echo "Please choose a valid date";
                } else {
                    $sql = "SELECT * FROM `price` WHERE `waste_type` = '$wasteType'";
                    $result = mysqli_query($con, $sql);
                    $data = mysqli_fetch_assoc($result);
                    $dbAmout = $data['amout'];
                    $amout = $size * $dbAmout;
                    // echo $amout;
                    $sql = "INSERT INTO `pickup_requests`(`email`, `waste_type`, `waste_size`, `date`, `time`, `pay_method`, `amount`) VALUES ('$email', '$wasteType', '$size', '$date', '$time', '$payment','$amout')";
                    if (mysqli_query($con, $sql)) {
                        $sql = "SELECT `id` FROM pickup_requests WHERE email = '$email' ORDER BY id DESC LIMIT 1";
                        $id = $data = mysqli_fetch_assoc(mysqli_query($con, $sql))['id'];
                        $sql = "INSERT INTO `notifications`(`reason_id`, `reason`) VALUES ('$id','request')";
                        mysqli_query($con, $sql);
                        echo 1;
                    } else {
                        echo "Unable to finish Pick up request. please try again later";
                    }
                }  
            }    
        }
    }

    // fetch price ajax handler
    if (@$_GET['operation'] == 'fetch_price') {
        if (isset($_POST['submit'])) {
            $wasteType = $_POST['wasteType'];
            $size = $_POST['size'];
            // echo $wasteType;
            function cleanInput($value){
                global $con;
                $value = strip_tags($value);
                $value = mysqli_real_escape_string($con, $value);
            }

            cleanInput($wasteType);
            cleanInput($size);

            $sql = "SELECT * FROM `price` WHERE `waste_type` = '$wasteType'";
            $result = mysqli_query($con, $sql);
            $data = mysqli_fetch_assoc($result);
            $dbWasteType = $data['waste_type'];
            $dbAmout = $data['amout'];

            echo $dbAmout * $size;

            
        }
    }

    // contact message handler
    if (@$_GET['operation'] == 'contact') {
        if (isset($_POST['msgSubmit'])) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $msg = $_POST['msg'];

            $msg = strip_tags($msg);
            $msg = mysqli_real_escape_string($con, $msg);

            if (strlen(str_replace(' ', '', $email) > 0)) {
                if (strlen(str_replace(' ', '', $name) > 0)) {
                    if (strlen(str_replace(' ', '', $msg) > 0)) {
                        $sql = "SELECT * FROM messages WHERE message = '$msg'";
                        if (mysqli_num_rows(mysqli_query($con, $sql)) > 0) {
                            echo "You have alread submitted this message.";
                        } else {
                            $sql = "INSERT INTO `messages`(`name`, `email`, `message`) VALUES ('$name','$email','$msg')";
                            if (mysqli_query($con, $sql)) {
                                echo 1;
                            }
                        }
                    } else{
                        echo "Please type in your message";
                    }
                } else{
                    echo "Please type in your name";
                }
            } else{
                echo "Please type in your email";
            }
        }
    }

    // cancel waste pick up request handler
    if (@$_GET['operation'] == 'cancel_request') {
        if (isset($_POST['cancelRequest'])) {
            $cancelRequest = $_POST['cancelRequest'];
            // echo 'working';
            $sql = "DELETE FROM `pickup_requests` WHERE `id` = $cancelRequest";
            if (mysqli_query($con, $sql)) {
                echo 1;
            }
        }
    }

    // pay for request handler
    if (@$_GET['operation'] == 'request_pay') {
        $email = $_POST['email'];
        // echo $email;
        $email = strip_tags($email);
        $email = mysqli_real_escape_string($con, $email);

        $sql1 = "SELECT * FROM pickup_requests WHERE email = '$email' ORDER BY id DESC LIMIT 1";
        $sql2 = "SELECT * FROM userstable WHERE email = '$email'";
        $surname = mysqli_fetch_assoc(mysqli_query($con, $sql2))['surname'];
        $firstname = mysqli_fetch_assoc(mysqli_query($con, $sql2))['firstname'];
        
        if (mysqli_query($con, $sql1)) {
            $id = mysqli_fetch_assoc(mysqli_query($con, $sql1))['id'];
            $amout = mysqli_fetch_assoc(mysqli_query($con, $sql1))['amount'];
            ?>

            <!-- <form id="paymentForm">
                <div class="row"> -->
                    <?php
                        // $sql = "SELECT * FROM pickup_requests WHERE email = '$email' AND payed = 0 ORDER BY id DESC LIMIT 1";
                        // $result = mysqli_query($con, $sql);
                        // $data = mysqli_fetch_assoc($result);
                    ?>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="email">Email Address</label>
                        <input class="form-control form-control-lg border border-primary" value="<?= $email; ?>" type="email" id="email-address" required   readonly />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="amount">Amount</label>
                        <input class="form-control form-control-lg border border-primary" value="<?= $amout; ?>" type="tel" id="amount" required  readonly />
                    </div>
                    <?php
                        // $sql = "SELECT * FROM userstable WHERE email = '$email'";
                        // $result = mysqli_query($con, $sql);
                        // $data = mysqli_fetch_assoc($result);
                    ?>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="first-name">First Name</label>
                        <input class="form-control form-control-lg border border-primary" value="<?= $firstname; ?>" type="text" id="first-name"   readonly />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="last-name">Last Name</label>
                        <input class="form-control form-control-lg border border-primary" value="<?= $surname; ?>" type="text" id="last-name"  readonly  />
                    </div>
                    <!-- <div class="form-submit">
                        <button type="submit" class="btn btn-zoom btn-lg btn-block" onclick="payWithPaystack()"> Pay </button>
                    </div> -->
                <!-- </div>
            </form> -->
            <!--             <script src="https://js.paystack.co/v1/inline.js"></script> -->        
            <?php }

    }

    // display user notifications on notifications page
    if (@$_GET['operation'] == 'user_notif_page') {
        // echo 'working';
        $sql = "SELECT * FROM `notifications` WHERE email = '$email' AND reason = 'postpone' ORDER BY `id` DESC";
        $result = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_assoc($result)) {
            $viewed = $data['read'];
            // if ($data['reason'] == 'postpone') {
                $notifId = $data['reason_id'];
                $sql2 = "SELECT * FROM `pickup_requests` WHERE `id` = $notifId";
                $result2 = mysqli_query($con, $sql2);
                while($data2 = mysqli_fetch_array($result2)){
                    //echo $data['id']; ?>
                    <a href="pickups.php?page=notif&notif_id=<?= $notifId; ?>" class="nav-link">
                        <div class="p- d-flex align-items-center border-bottom osaan-post-header payNotif" data-id="<?= $notifId; ?>"  onclick="user_notif_seen()" style="cursor: pointer;">
                            <div class="font-weight-bold mr-3">
                                <div class="text-truncate">Request Postpone</div>
                                <div class="small text-dark"><?//= $data['email']; ?> Your waste pick up request has been postponed to <?= $data2['date'] ?></div>
                            </div>
                            <span class="ml-auto mb-auto">
                                <div class="text-right text-danger pt-1 Viewed"><?php if ($viewed == 1) echo 'Veiwed';
                                 ?></div>
                            </span>
                        </div>
                    </a>
                <?php }
            // }
        }
    }
    // notification count 
    if (@$_GET["operation"] == 'user_notif_count') {
        $sql = "SELECT * FROM `notifications` WHERE `email` = '$email' AND `status` = 0 AND `reason` = 'postpone'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        // $notification = $row['number_of_notifications'];
        $totalNotif = mysqli_num_rows($result);

        echo $totalNotif;
        // echo "working";
    }

    // notification clear on notification button click 
    if (@$_GET["operation"] == 'user_notif_clear') {
        // update nofitications
        $sql = "UPDATE `notifications` SET `status` = '1' WHERE email = '$email'";
        $result = mysqli_query($con, $sql);

        $sql = "SELECT * FROM `notifications` WHERE `status` = 0";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        // $notification = $row['number_of_notifications'];
        $totalNotif = mysqli_num_rows($result);

        echo $totalNotif;
    }