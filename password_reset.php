<?php
	require_once 'includes/connection.php';

	if (@$_GET['step'] == 1) { //echo "string";
		if (isset($_POST['passwordResetSubmit'])) { //echo $_POST['passResetEmail'];
			$email = $_POST['passResetEmail'];
			if (strlen(str_replace(' ', '', $email)) == '') {
				echo "Please enter your Email address";
			} else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				  $error = "Invalid email format";
				  header("location: login.php?error=$error");
				  exit();
				} else {
					$sql = "SELECT `email`, `surname` FROM userstable WHERE email = '$email'";
					if (mysqli_num_rows(mysqli_query($con, $sql)) < 1) {
						$error = "This email is not registered";
					  	header("location: login.php?error=$error");
					  	exit();
					} else{
						$firstCode = rand(100, 999);
						$secondCode = mt_rand(100, 900);
						$verif_code = $firstCode.' '.$secondCode;
						$name = $data = mysqli_fetch_array(mysqli_query($con, $sql))['surname'];
						$from = 'From: marssoftwares1@gmail.com';
	                    $to = $email;
	                    $subject = 'Verification Code From Zoomlion Ghana';
	                    // $fullMsg = nl2br($msg);
	                    $headers = array(
	                        "MIME-Version" =>"1.0",
	                        "Content-Type" =>"text/html;charset=UTF-8",
	                        "From" =>"marssoftwares1@gmail.com",
	                        "Reply-To" =>"marssoftwares1@gmail.com"
	                    );

	                    // $url = "http://".$_SERVER['HTTP_HOST'];
	                    ob_start();
	                    include('verif_code_msg.php');
	                    $body = ob_get_contents();
	                    ob_get_clean();

	                    // if (mail($to, $subject, $msg, $headers)) {
	                    function sent(){
	                    	global $verif_code;
	                    	global $email;
	                    	global $con;
	                    	$verif_code = str_replace(' ', '', $verif_code);
	                    	$verif_code = str_replace('Z_', '', $verif_code);
	                        $sql = "INSERT INTO `verif_code`(`email`, `code`) VALUES ('$email','$verif_code')";
	                        if (mysqli_query($con, $sql)) { ?>
	                            <!-- // header("location: password_recovery.php?operation=recover_password_step_2&email=$email"); -->
	                        	<head>
						            <link rel="stylesheet" href="styles/bootstrap 5.css">
						            <link rel="stylesheet" href="styles/style.css">
						            <title>Passsword Reset</title>
						        </head>
						        <body>
						            <div class="container">
						                <div class="row">
						                    <div class="col-md-3"></div>
						                    <div class="form-group col-md-6">
						                        <div class="text-center mt-3">
						                            <h4 class="text-capitalize text-center">Enter Confirmation Code</h4>
						                        </div>
						                        <p class="text-center">A confirmation code has been sent to your email.</p>
						                        <form action="password_reset.php?step=2&email=<?=$email; ?>" method="POST">
						                            <div class="col-md-12 mb-3">
						                                <label class="form-label" for="code">Confirmation Code</label>
						                                <!-- <input type="text" name="code" class="form-control form-control-lg border border-primary" placeholder="Enter the Confirmation sent to your email here"> -->
						                                <div class="input-group form-group">
						                                    <div class="input-group-prepend bg-zoom">
						                                        <!-- <span class="input-group-text">
						                                            Z_
						                                        </span> -->
						                                    </div>
						                                    <input type="text" name="code" id="code" class="form-control form-cntrol-lg border border-primary" placeholder="enter the verication code in your email here" autofocus>
						                                </div>
						                            </div>
						                            <div class="row mb-3">
						                                <button type="submit" name="submit" class="btn btn-zoom btn-lg btn-block">Submit</button>
						                            </div>
						                        </form>
						                    </div>
						                    <div class="col-md-3"></div>
						                </div>
						            </div>
						        </body>
	                        <?php } else {
	                            $error = "Something went wrong";
	                            header("location: login.php?error=$error");
	                            exit();
	                        }
	                    } //else {
	                    //     $error = "Something went wrong";
	                    //     header("location: login.php?error=$error");
	                    //     exit();
	                    // }
	                    function notSent() {
	                    	$error = "Unable to send verification code";
	                        header("location: login.php?error=$error");
	                        exit();
	                    }
	                    require 'phpmailer/index.php';
					}
				}
			}
		}
	}

	if (@$_GET['step'] == 2) {
		if (@$_GET['email']) {
			$email = $_GET['email'];
			$code = str_replace(' ', '', $_POST['code']);
			$code = str_replace('Z_', '', $code);
			// echo $email;
			// echo '<br>';
			// echo $code;
			$sql = "SELECT * FROM `verif_code` WHERE `email` = '$email' AND `code` = '$code' ORDER BY id DESC LIMIT 1";
			if (mysqli_num_rows(mysqli_query($con, $sql)) < 1) {
				$error = 'Invalid verification code. please try again';
				header("location: password_reset.php?step=1?error=$error");
				exit();
			} else { ?>
				<head>
                    <link rel="stylesheet" href="styles/bootstrap 5.css">
                    <link rel="stylesheet" href="styles/style.css">
                    <title>Passsword Reset</title>
                </head>
                <body>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="form-group col-md-6">
                                <div class="text-center mt-3">
                                    <h4 class="text-capitalize text-center">Create a new Password</h4>
                                </div>
                                <p class="text-center">Create a new password that is easy to remember but hard to guest.</p>
                                <form action="password_reset.php?step=3&email=<?= $email; ?>" method="POST">
                                    <div class="col-md-12 mb-3">
                                        <label for="password" class="form-label text-dark">Enter New Password</label>
                                        <input type="password" class="form-control form-control-lg border border-primary" name="password" id="password" placeholder="Enter Your New Password" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="confirmPassword" class="form-label text-dark">Confirm New Password</label>
                                        <input type="password" class="form-control form-control-lg border border-primary" name="confirmPassword" id="confirmPassword" placeholder="Re enter Your New Password" required>
                                    </div>
                                    <!-- <div class="col-md-12 mb-3">
                                        <label class="form-label">Confirmation Code</label>
                                        <input type="text" name="confirm" class="form-control" placeholder="Enter the Confirmation sent to your email here">
                                    </div> -->
                                    <div class="row">
                                        <button type="submit" name="submit" class="btn btn-zoom ">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </body> 
			<?php }
		}
	}

	if (@$_GET['step'] == 3) {
		if (@$_GET['email']) {
			$email = $_GET['email'];
			$password = $_POST['password'];
			$confirmPassword = $_POST['confirmPassword'];

			// echo $email;
			// echo "<br>";
			// echo $password;
			// echo "<br>";
			// echo $confirmPassword;
			$password = strip_tags($password);
			$password = mysqli_real_escape_string($con, $password);

			$confirmPassword = strip_tags($confirmPassword);
			$confirmPassword = mysqli_real_escape_string($con, $confirmPassword);

			if (strlen(str_replace(' ', '', $password)) == '') {
				$error = 'Please enter Password';
				header("location: password_reset.php?step=2&error=$error");
				exit();
			} else {
				if (strlen(str_replace(' ', '', $password)) < 6) {
					$error = 'Your password cannot be less than 6 characters';
					header("location: password_reset.php?step=2&error=$error");
					exit();
				} else {
					if ($password === $confirmPassword) {
						$password = md5($password);
						$sql = "UPDATE `userstable` SET`password`='$password' WHERE `email` = '$email'";
						if (mysqli_query($con, $sql)) {
							session_start();
							$sql = "SELECT * FROM userstable WHERE email = '$email'";
							$result = mysqli_query($con, $sql);
							$data = mysqli_fetch_assoc($result);

							$_SESSION['id'] = $data['id'];
							$_SESSION['email'] = $data['email'];
							$_SESSION['name'] = $data['surname'] . ' ' . $data['firstname'];
							$_SESSION['role'] = $data['role'];
							$_SESSION['password'] = $data['password'];
							$sql = "DELETE FROM verif_code WHERE email = '$email'";
							mysqli_query($con, $sql);
							if ($_SESSION['role'] == '1') {
								header("location: admin/index.php");
							} else {
								header("location: index.php");
							}
						}
					} else {
						$error = 'Your passwords do not match';
						header("location: password_reset.php?step=2&error=$error");
						exit();
					}
				}
			}
		}
	}