<?php //session_start();
	require_once '../includes/connection.php';

	if (isset($_POST['postponeSubmit'])) {
		$email = $_POST['email'];
		$oldDate = $_POST['oldDate'];
		$oldTime = $_POST['oldTime'];
		$date = $_POST['date'];
		$time = $_POST['time'];

		// clean input
        // function cleanInput($value){
        //     global $con;
        //     // $value = strip_tags($value);
        //     $value = mysqli_real_escape_string($con, $value);
        //     return $value;
        // }

		// cleanInput($email);
		// cleanInput($date);
		// cleanInput($time);

		$sql = "UPDATE `pickup_requests` SET `date`='$date',`time`='$time' WHERE `email` = '$email' AND `date` = '$oldDate'";
		$result = mysqli_query($con, $sql);
		if ($result) {
			$sql = "SELECT `id`,`email` FROM `pickup_requests` WHERE `email` = '$email' AND `date` = '$date'";
			$data = mysqli_fetch_assoc(mysqli_query($con, $sql));
			$id = $data['id'];
			$email = $data['email'];
			$sql = "INSERT INTO `notifications`(`reason_id`, `reason`, `email`) VALUES ('$id','postpone','$email')";
			mysqli_query($con, $sql);
			$msg =  'Waste Pick up Postpone Successfully';
			$alertClass = 'alert-success';
			header("location: requests.php?msg=$msg&alertClass=$alertClass");
			exit();
		} else {
			$msg =  'Unable to Postpone waste Pick up';
			$alertClass = 'alert-danger';
			header("location: requests.php?msg=$msg&alertClass=$alertClass");
			exit();
		}
	}

	// view map handler
	if (@$_GET['operation'] == 'veiw_map') {
		if (@$_GET['location']) {
			$location = $_GET['location'];
			$location = str_replace(' ', '+', $location);

			include_once '../includes/header.php';
			include_once 'side_panel.php'; ?>

			<main class="mt-5 pt-3">
				<iframe src="https://maps.google.com/maps?q=<?php echo $location; ?>&output=embed" frameborder="2" width="100%" height="700"></iframe>

				<div class="row m-1">
                    <a href="requests.php" class="btn btn-zoom btn-lg btn-block">Go Back</a>
                </div>
			</main>

		<?php	include_once '../includes/footer.php';
		}
	}

	// view more info handler
	if (@$_GET['operation'] == 'more_info') {
		if (isset($_POST['userEmail'])) {
			$email = $_POST['userEmail'];
			$sql = "SELECT * FROM `house_info` WHERE `email` = '$email'";
			$result = mysqli_query($con, $sql);
			$data = mysqli_fetch_assoc($result);
			$houseName = $data['house_name'];
			$houseNo = $data['house_no'];
			$location = $data['location'];
			$location = str_replace(' ', '+', $location);
			$town = $data['town'];
			$landmark = $data['landmark'];
			$region = $data['region'];
			$district = $data['district'];
			$desc = $data['desc'];
			$area = $data['area'];

			$sql = "SELECT * FROM `house_info` WHERE `email` = '$email'";
			$result = mysqli_query($con, $sql);
			$data = mysqli_fetch_assoc($result); ?>
			
			<div class="row">
				<div class="col-md-6">
					<iframe src="https://maps.google.com/maps?q=<?php echo $location; ?>&output=embed" frameborder="5" width="100%" height="100%" class="shadow border border-primary border-5"></iframe>
				</div>
				<div class="col-md-6">
					<table class="tabel">
						<tr>
							<td>
								<p><span class="fw-bold">Email: </span><?= $email; ?></p>
								<p><span class="fw-bold">Place Name:</span> <?= $houseName; ?></p>
								<p><span class="fw-bold">House No:</span> <?= $houseNo; ?></p>
								<p><span class="fw-bold">Location:</span> <?= $location; ?></p>
								<p><span class="fw-bold">Region:</span> <?= $region; ?></p>
								<p><span class="fw-bold">District:</span> <?= $district; ?></p>
								<p><span class="fw-bold">Town:</span> <?= $town; ?></p>
								<p><span class="fw-bold">Area:</span> <?= $area; ?></p>
								<p><span class="fw-bold">Description:</span> <?= $desc; ?></p>
							</td>
						</tr>
					</table>
				</div>
			</div>

		<?php }
	}

	// finished handler
	if (@$_GET['operation'] == 'finished') {
		if (isset($_POST['requestId'])) {
			$requestId = $_POST['requestId'];
			$sql = "UPDATE `pickup_requests` SET `status`='1' WHERE `id` = $requestId";
			if (mysqli_query($con, $sql)) {
				echo 1;
			} else {
				echo "Unable to update record. please try again later";
			}
		}
	}