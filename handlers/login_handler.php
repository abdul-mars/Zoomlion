<?php
	require_once '../includes/connection.php'; 

	// validate login
	function loginValid(){
		global $password;
		global $email;
		global $role;
		
		// clean user inputs function
		function cleanInput($value) {
			global $con;
			$value = strip_tags($value);
			$value = str_replace(' ', '', $value);
			// echo $value;
			$value = mysqli_real_escape_string($con, $value);
			return $value;
		}
		
		cleanInput($email);
		cleanInput($password);

		global $con;
		// global $password;
			if (empty($email)) { // check if email is emapty
			$error = 'Please Enter your Email';
			echo $error;
		} else { // check if email is correct format
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = "Invalid email format";
			echo $error;
			} else { // check if email is registed
				$sql = "SELECT * FROM userstable WHERE `email` = '$email' AND `role` = $role";
				$result = mysqli_query($con, $sql);
				if (mysqli_num_rows($result) < 1) {
					$error = 'Incorrect Email and or Password';
					echo $error;
				} else {
					$data = mysqli_fetch_assoc($result);
					$hashedPassword = $data['password'];

					if (md5($password) !== $hashedPassword) { // check if password is correct
						$error = 'Incorrect Email and or Password';
						echo $error;
					} else { // log in user with session variables
						session_start();
						$_SESSION['email'] = $data['email'];
						$_SESSION['name'] = $data['surname'].' '.$data['firstname'];
						$_SESSION['id'] = $data['id'];
						$_SESSION['role'] = $data['role'];
						$_SESSION['password'] = $data['password'];
						echo 1;
					}
				}
			}
		}
	}

	// user login handler
	if (@$_POST['loginSubmit']) { //check if submit button is clicked
		$email = $_POST['email']; // collect the value of email into variable
		$password = $_POST['password']; // collect the value of password into variable
		$role = 0;
		loginValid();
	}

	// admin login handler
	if (@$_POST['adminLoginSubmit']) { //check if submit button is clicked
		$email = $_POST['email']; // collect the value of email into variable
		$password = $_POST['password']; // collect the value of password into variable
		$token = $_POST['password'];
		$token = strip_tags($token);
		$token = mysqli_real_escape_string($con, $token);
		$role = 1;

		$sql = "SELECT * FROM userstable WHERE email = '$email' AND token = '$token' AND role = 1";
		if (mysqli_num_rows(mysqli_query($con, $sql)) > 0) {
			session_start();
			$_SESSION['email'] = $data = mysqli_fetch_assoc(mysqli_query($con, $sql))['email'];
			echo 2;
			// header("location: ../admin/admins_operations.php?operation=admin_create_password");
			exit();
		} else {
			loginValid();
		}
	}
?>