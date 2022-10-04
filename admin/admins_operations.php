<?php 
	require_once '../includes/connection.php';
	if (@$_GET['operation'] == 'add_admin') {
	    // ob_start();
	    include_once '../includes/header.php';
	    include_once 'side_panel.php'; ?>

	    <main class="mt-5 pt-3">
	    	<div class="container">
	    		<div class="row">
	    			<h2 class="text-zoom text-center">Adding New Admin</h2>
	    			<hr>
	    			<div class="alert alert-danger text-center" id="alert" role="alert"></div>
	    			<!-- <hr> -->
	    			<form action="admins_operations.php?operation=add_admin_handler" method="post">
	    				<div class="row">
	    					<div class="mb-3 col-md-6">
							  <label for="surname" class="form-label">Admin Surname</label>
							  <input type="text" name="surname" class="form-control form-control-lg border border-primary" id="surname" placeholder="Enter Surname">
							</div>
							<div class="mb-3 col-md-6">
							  <label for="firstname" class="form-label">Admin Firstname</label>
							  <input type="text" name="firstname" id="firstname" class="form-control form-control-lg border border-primary" placeholder="Enter Firstname">
							</div> 
							<div class="mb-3 col-md-6">
							  <label for="email" class="form-label">Admin Email</label>
							  <input type="email" name="email" id="email" class="form-control form-control-lg border border-primary" placeholder="Enter Email">
							</div>  
							<div class="mb-3 col-md-6">
							  <label for="phone" class="form-label">Admin Phone Number</label>
							  <input type="number" name="phone" id="phone" class="form-control form-control-lg border border-primary" placeholder="Enter phone number">
							</div>   
							<div class="mb-3 col-md-6">
							  <label for="gender" class="form-label">Admin Gender</label>
							  <select class="form-select border border-primary form-select-lg" name="gender" id="gender">
							  	<!-- <option value="">Gender</option> -->
							  	<option value="M">Male</option>
							  	<option value="F">Female</option>
							  </select>
							</div> 
							<?php function genratepass($length){
					                $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
					                return substr(str_shuffle($char), 0, $length);
					            }
				            ?>
							<div class="mb-3 col-md-6">
							  <label for="token" class="form-label">Admin Auto generared Password</label>
							  <input type="text" name="token" id="token" class="form-control form-control-lg border border-primary" value="<?php echo genratepass(8); ?>" placeholder="Enter phone number" readonly>
							</div> 
							<div class="row m-1">
                                <button class="btn btn-zoom btn-lg btn-block" id="addAdminSubmit" name="addAdminSubmit" type="button">Add Admin</button>
	                        </div>
	    				</div>
	    			</form>
	    		</div>
	    	</div>
	    </main>
	<?php    include_once '../includes/footer.php';
	}

	// add new admin handler
	if (@$_GET['operation'] == 'add_admin_handler') {
		if (isset($_POST['addAdminSubmit'])) {
			$surname = $_POST['surname'];
			$firstname = $_POST['firstname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];
			$token = $_POST['token'];
			
			// clean input
			function cleanInput($value){
				global $con;
				$value = strip_tags($value);
				$value = mysqli_real_escape_string($con, $value);
			}

			cleanInput($surname);
			cleanInput($firstname);
			cleanInput($email);
			cleanInput($phone);
			cleanInput($gender);
			cleanInput($token);

			$sql = "SELECT * FROM `userstable` WHERE `email` = '$email'";
			if (mysqli_num_rows(mysqli_query($con, $sql)) > 0) {
				echo 'This email is alread in use';
				// header("location: admins_operations.php?operation=add_admin&msg=$msg");
				exit();
			} else{
				if (strlen(str_replace(' ', '', $surname)) < 2) {
					echo "Please enter admin's surname";
					// header("location: admins_operations.php?operation=add_admin&msg=$msg");
					// exit();
				} else {
					if (strlen(str_replace(' ', '', $firstname)) < 2) {
						echo "Please enter admin's firstname";
						// header("location: admins_operations.php?operation=add_admin&msg=$msg");
						// exit();
					} else {
						if (strlen(str_replace(' ', '', $email)) < 2) {
							echo "Please enter admin's email";
							// header("location: admins_operations.php?operation=add_admin&msg=$msg");
							// exit();
						} else {
							if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
								echo "Invalid email format";
								// header("location: admins_operations.php?operation=add_admin&msg=$msg");
								// exit();
							} else {
								if (strlen($phone) < 10 || strlen($phone) > 15) {
									echo 'Phone number cannot be less than 10 and cannot more than 15 characters';
								} else {
									if ($gender == strtolower('m') && $gender == strtolower('m')) {
										echo 'enter valid gender';
									} else {
										$role = 1;
										$sql = "INSERT INTO `userstable`(`email`, `surname`, `firstname`,`gender`, `phone`,`token`, `role`) VALUES ('$email','$surname','$firstname','$gender','$phone','$token','$role')";
										if (mysqli_query($con, $sql)) {
											// echo "New Admin Added Successfully";
											echo 1;
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}

	if (@$_GET['operation'] == 'admin_create_password') { 
	    // ob_start();
	    // include_once '../includes/header.php';
	    // include_once 'side_panel.php'; ?>
		<head>
			<link rel="stylesheet" href="../styles/bootstrap@5.2.0-beta1.min.css">
			<link rel="stylesheet" href="../styles/style.css?style=<?= time(); ?>">
		</head>
		<!-- <main class="mt- pt-3"> -->
			<div class="container">
				<div class="row">
					<h2 class="text-zoom fw-bold text-center">Create A New Password</h2>
				</div>
				<div class="row">
					<form action="admins_operations.php?operation=admin_create_password_handler" method="post">
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" name="password" id="password" class="form-control form-control-lg border border-primary" placeholder="Enter Password">
							</div> 
							<div class="col-md-6 mb-3">
								<label for="confirmPassword" class="form-label">Confirm Password</label>
								<input type="password" name="confirmPassword" id="confirmPassword" class="form-control form-control-lg border border-primary" placeholder="Re-Enter password">
							</div>
						</div>
						<div class="row m-1">
                            <button class="btn btn-zoom btn-lg btn-block" id="adminNewPasswordBtn" name="adminNewPasswordBtn" type="submit">Submit</button>
                        </div>
					</form>
				</div>
			</div>
		<!-- </main> -->

	<?php }

	if (@$_GET['operation'] == 'admin_create_password_handler') {
		if (isset($_POST['adminNewPasswordBtn'])) {
			session_start();
			$email = $_SESSION['email'];
			$password = $_POST['password'];
			$confirmPassword = $_POST['confirmPassword'];
			// echo $email;

			$password = strip_tags($password);
			$password = mysqli_real_escape_string($con, $password);
			$confirmPassword = strip_tags($confirmPassword);
			$confirmPassword = mysqli_real_escape_string($con, $confirmPassword);

			if (empty($password)) {
				$error = "Please enter Password";
				echo $error;
			} else {
				if (strlen($password) < 6) {
					$error = "Your password cannot be less than 6 characters";
					echo $error;
				} else {
					if ($password !== $confirmPassword) {
						$error = "Your passwords do not match";
						echo $error;
					} else {
						$password = md5($password);
						
						$sql = "UPDATE `userstable` SET `password`='$password' WHERE `email` = '$email'";
						if (mysqli_query($con, $sql)) {
							$sql = "UPDATE `userstable` SET `token`='' WHERE `email` = '$email'";
							mysqli_query($con, $sql);
							$sql = "SELECT * FROM `userstable` WHERE `email` = '$email'";
							$result = mysqli_query($con, $sql);
							$data = mysqli_fetch_assoc($result);
							$_SESSION['name'] = $data['surname'].' '.$data['firstname'];
							$_SESSION['id'] = $data['id'];
							$_SESSION['role'] = $data['role'];
							$msg ='You have create your password successfully';
							$alertClass = 'alert-success';
							header("location: index.php?msg=$msg&alertClass=$alertClass");
							exit();
						}
					}
				}
			}
		}
	}

	// admin account update handler
	if (@$_GET['operation'] == 'update_account') {
		if (isset($_POST['adminUpdSub'])) {
			$surname = $_POST['surname'];
			$firstname = $_POST['firstname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];

			function cleanInput($value) {
				global $con;
				$value = strip_tags($value);
				$value = mysqli_real_escape_string($con, $value);
			}

			cleanInput($surname);
			cleanInput($firstname);
			cleanInput($email);
			cleanInput($phone);
			cleanInput($gender);

			if (strlen(str_replace(' ', '', $surname)) < 0 || strlen(str_replace(' ', '', $firstname)) < 0 || strlen(str_replace(' ', '', $email)) < 0 || strlen(str_replace(' ', '', $phone)) < 0 || strlen(str_replace(' ', '', $gender)) < 0) {
				$error = "all fields are required";
				header("location: admin_account.php?error=$error");
				exit();
			} else {
				$sql = "UPDATE `userstable` SET `email`='$email',`surname`='$surname',`firstname`='$firstname',`gender`='$gender',`phone`='$phone' WHERE `email` = '$email'";
				if (mysqli_query($con, $sql)) {
					$error = "Account updated successfully";
					header("location: admin_account.php?error=$error");
					exit();
				}
			}
		}
	}

	// notification count 
	if (@$_GET["operation"] == 'notification_count') {
	    $sql = "SELECT * FROM `notifications` WHERE `status` = 0 AND `reason` != 'postpone'";
	    $result = mysqli_query($con, $sql);
	    $row = mysqli_fetch_assoc($result);
	    // $notification = $row['number_of_notifications'];
	    $totalNotif = mysqli_num_rows($result);

	    echo $totalNotif;
	    // echo "working";
	}

	// notification clear on notification button click 
	if (@$_GET["operation"] == 'notification_clear') {
	    // update nofitications
	    $sql = "UPDATE `notifications` SET `status` = 1";
	    $result = mysqli_query($con, $sql);

	    $sql = "SELECT * FROM `notifications` WHERE `status` = 0";
	    $result = mysqli_query($con, $sql);
	    $row = mysqli_fetch_assoc($result);
	    // $notification = $row['number_of_notifications'];
	    $totalNotif = mysqli_num_rows($result);

	    echo $totalNotif;
	}

	// display notifications on notifications page
    if (@$_GET['operation'] == 'notif_page') {
    	// echo 'working';
    	$sql = "SELECT * FROM `notifications` ORDER BY id DESC";
    	$result = mysqli_query($con, $sql);
    	while ($data = mysqli_fetch_assoc($result)) {
    		$viewed = $data['read'];
    		if ($data['reason'] == 'payment') {
	    		$payId = $data['reason_id'];
    			$paySql = "SELECT * FROM `payments` WHERE id = '$payId'";
    			$payResult = mysqli_query($con, $paySql);
    			while($payData = mysqli_fetch_array($payResult)){
    				//echo $payData['id']; ?>
    				<a href="payments.php?page=notif&notif_id=<?= $payId; ?>" class="nav-link">
	    				<div class="p- d-flex align-items-center border-bottom osaan-post-header payNotif" data-id="<?= $payId; ?>"  onclick="pay_notif_seen()" style="cursor: pointer;">
	                        <div class="font-weight-bold mr-3">
	                            <div class="text-truncate">Payment Made</div>
	                            <div class="small text-dark"><?= $payData['email']; ?> made payment of Ghs <?= $payData['amount'] ?>¢</div>
	                        </div>
	                        <span class="ml-auto mb-auto">
	                            <div class="text-right text-danger pt-1 Viewed"><?php if ($viewed == 1) echo 'Veiwed';
	                             ?></div>
	                        </span>
	                    </div>
                	</a>
    			<?php }
    			
    		} else if ($data['reason'] == 'request') {
    			$reqId = $data['reason_id'];
    			$reqSql = "SELECT * FROM pickup_requests WHERE id = '$reqId'";
    			$reqResult = mysqli_query($con, $reqSql);
    			while ($reqData = mysqli_fetch_assoc($reqResult)) {
    				//echo $reqData['id']; ?>
    				<a href="requests.php?page=notif&notif_id=<?= $reqId; ?>" class="nav-link">
	    				<div class="p- d-flex align-items-center border-bottom osaan-post-header reqNotif" data-id="<?= $reqId; ?>" onclick="req_notif_seen()" style="cursor: pointer;">
	                        <div class="font-weight-bold mr-3">
	                            <div class="text-truncate">Request For Waste Pick up</div>
	                            <div class="small text-dark"><?= $reqData['email']; ?> Request for waste pick up</div>
	                        </div>
	                        <span class="ml-auto mb-auto">
	                            <div class="text-right text-danger pt-1"><?php if ($viewed == 1) echo 'Veiwed';
	                             ?></div>
	                        </span>
	                    </div>
                	</a>
    			<?php }

    		}
    	}
    }

    // clear pay notification on click
    if (@$_GET['operation'] == 'pay_notif_seen') {
    	$id = $_POST['id'];
    	// echo $id;
    	$sql = "UPDATE `notifications` SET `status`= '1', `read`='1' WHERE reason_id = '$id'";
    	mysqli_query($con, $sql);
    	echo $id;
    	echo "<script>$('.payNotif').addClass('bg-light');</script>";
    }

    // clear pay notification on click
    if (@$_GET['operation'] == 'req_notif_seen') {
    	$id = $_POST['id'];
    	// echo $id;
    	$sql = "UPDATE `notifications` SET `status`= '1', `read`='1' WHERE reason_id = '$id'";
    	mysqli_query($con, $sql);
    	echo $id;
    	// echo "<script>$('.payNotif').addClass('bg-light');</script>";
    }