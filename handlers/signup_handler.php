<?php
	session_start();
	require_once '../includes/connection.php';

	// signup handler
	if (isset($_POST['signupSubmit'])) { //echo 'working';
		$surname = $_POST['surname'];
		$firstname = $_POST['firstname'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];
		
        // echo $confirmPassword; echo '<br>';
        // echo $email; echo '<br>';
        // echo $firstname; echo '<br>';
        // echo $phone; echo '<br>';
		// if (!preg_match("/^[a-zA-Z- ]*$/",$surname)) {
		// 	$nameErr = "Only letters and white space allowed";
		// 	echo $nameErr;
		//   }

		// clean user input fuction
		function cleanInput($value) {
			global $con;
			$value = strip_tags($value);
			$value = mysqli_real_escape_string($con, $value);
		}
		cleanInput($surname);
		cleanInput($firstname);
		cleanInput($email);
		cleanInput($gender);
		cleanInput($phone);
		cleanInput($password);
		cleanInput($confirmPassword);
 
		// check for empty fields
		if ($surname == '') {
			$error = 'Please fill in your surname';
			echo $error;
		} else {
			if ($firstname == '') {
				$error = 'Please fill in your firstname';
				echo $error;
			} else {
				if (strlen($surname) < 2 || strlen($firstname) < 2) {
					$error = 'Your surname or firstname cannot be less than 2 characters';
					echo $error;
				} else {
					if (!preg_match("/^[a-zA-Z- ]*$/",$surname)) {
						$error = "Surname cannot contain numbers or special characters";
						echo $error;
					} else {
						if (!preg_match("/^[a-zA-Z- ]*$/",$firstname)) {
							$error = "Firstname cannot contain numbers or special characters";
							echo $error;
						} else {
							if (empty($phone)) {
								$error = 'enter your phone number';
								echo $error;
							} else {
								if (strtolower($gender) != 'm' && strtolower($gender) != 'f') {
									$error = 'Please select your gender';
									echo $error;
								} else {
									$isString = false;
									for ($i=0; $i < strlen($phone); $i++) { //check for numbers in firstname
										if (ctype_alpha($phone[$i])) {
											$isString = true;
											break;
										}
									}
									if ($isString) { 
										$error = 'Your phone number contain cannot letters';
										// header("location: ../signup.php?error='$error'");
										// exit();
										echo $error;
									} else {
										if (strlen($phone) < 10 || strlen($phone) > 15) {
											$error = 'Your phone number cannot be less than 10 and cannot more than 15 characters';
											echo $error;
										} else {
											if (empty($email)) {
												$error = "Please enter Email";
												echo $error;
											} else {
												if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
													$error = "Invalid email format";
													echo $error;
												} else {
													$sql = "SELECT `email` FROM userstable WHERE email = '$email'";
													$result = mysqli_query($con, $sql);
													if (mysqli_num_rows($result) > 0) {
														$error = "This email is alread in use";
														echo $error;
													} else {
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

																	$sql = "INSERT INTO `userstable`(`email`, `surname`, `firstname`,`gender`, `phone`, `password`) VALUES ('$email','$surname','$firstname','$gender','$phone','$password')";
																	if (mysqli_query($con, $sql)) {
																		// session_start();
																		$sql = "SELECT * FROM userstable WHERE email = '$email'";
																		$result = mysqli_query($con, $sql);
																		$data = mysqli_fetch_assoc($result);

																		$_SESSION['id'] = $data['id'];
																		$_SESSION['email'] = $data['email'];
																		$_SESSION['name'] = $data['surname'] . ' ' . $data['firstname'];
																		$_SESSION['role'] = $data['role'];
																		$_SESSION['password'] = $data['password'];
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
							}	
						}
					}
				}
			}
		}
	}


	// property registration handler
	if (isset($_POST['registerSubmit'])) {
		$email = $_SESSION['email'];
		$houseName = $_POST['houseName'];
		$houseNo = $_POST['houseNo'];
		$location = $_POST['location'];
		$landmark = $_POST['landmark'];
		// $gps = $_POST['gps'];
		$district = $_POST['district'];
		$region = $_POST['region'];
		$town = $_POST['town'];
		$area = $_POST['area'];
		$desc = $_POST['desc'];
		// $desc = $_POST['desc'];
		// $desc = $_POST['desc'];
		// $desc = $_POST['desc'];

		// clean input
		function cleanRegisterInput($value){
			global $con;
			$value = strip_tags($value);
			$value = mysqli_real_escape_string($con, $value);
			return $value;
		}
		cleanRegisterInput($houseName);
		cleanRegisterInput($houseNo);
		cleanRegisterInput($location);
		cleanRegisterInput($landmark);
		// cleanRegisterInput($gps);
		cleanRegisterInput($district);
		cleanRegisterInput($region);
		cleanRegisterInput($town);
		cleanRegisterInput($area);
		cleanRegisterInput($desc);

		// validate data
		if (empty($houseName) || empty($houseNo) || empty($location) || empty($town) || empty($area)) {
			echo 'All fields are required';
		} else {
			$sql = "SELECT * FROM `house_info` WHERE email = '$email'";
			$result = mysqli_query($con, $sql);
			if (mysqli_num_rows($result) > 0) {
				echo "you have alread added your information";
			} else {
				$sql = "INSERT INTO `house_info`(`email`, `house_name`, `house_no`, `location`,`landmark`, `region`, `district`, `town`, `area`, `desc`) VALUES ('$email','$houseName','$houseNo','$location','$landmark','$region','$district','$town','$area','$desc')";
				if (mysqli_query($con, $sql)) {
					// header("location: index.php");
					echo 1;
				}
			}
		}
	}

	if (@$_GET['operation'] == 'fetch_loc_on_map') {
		$location = $_POST['location'];
		$location = str_replace(' ', '+', $location); //echo $location;?>
		<iframe src="https://maps.google.com/maps?q=<?php echo $location; ?>&output=embed" frameborder="2" width="100%" height="700" class="border border-primary border-5"></iframe>

	<?php }
?>