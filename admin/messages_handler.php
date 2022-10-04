<?php
	require_once '../includes/connection.php';
	// if (isset($_POST['replyMsgSubmit'])) {
	if (isset($_POST['replyMsgBtn'])) {
		$email = $_POST['email'];
		$toMsg = $_POST['toMsg'];
		$replyMsg = $_POST['replyMsg']; echo $email;

		function cleanInput($value) {
			global $con;
			$value = strip_tags($value);
			$value = mysqli_real_escape_string($con, $value);
		}
		cleanInput($email);
		cleanInput($toMsg);
		$replyMsg = mysqli_real_escape_string($con, $replyMsg);

		$sql = "SELECT `surname`, `firstname` FROM `userstable` WHERE `email` = '$email'";
		$data = mysqli_fetch_assoc(mysqli_query($con, $sql));
		$name = $data['surname'];
		$subject = 'Reply From Zoomlion Ghana';

		// // $headers = array(
		// //         "MIME-Version" =>"1.0",
		// //         "Content-Type" =>"text/html;charset=UTF-8",
		// //         "From" =>"Zoomlion Ghana",
		// //         "Reply-To" =>"Zoomlion Ghana"
		// //     );
		// // }

		// // ob_start();
  // //       include('msg_reply.php');
  // //       $msg = ob_get_contents();
  // //       ob_get_clean();
		$body = '<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
			</head>
			<body>
				<p>Dear'.$name.',</p>
				<p>Reply to your message: '.$toMsg.',</p>
				<p>'.$replyMsg.'</p>
			</body>
			</html> ';
		// // if (mail($email, $subject, $msg, $headers)) {
		// // 	// echo "Reply send successfully";
		// // 	echo 1;
		// // 	// header("location: messages.php");
		// // 	exit();
		// // } else {
		// // 	echo "Unable to send reply";
		// // 	// header("location: messages.php");
		// // 	exit();
		// // }
		function sent(){
			// echo 1;
			$msg = 'Reply sent';
			$cssClass = 'alert-success';
			header("location: messages.php?page=unread&msg=$msg&cssClass=$cssClass");
			exit();
		}
		function notSent(){
			// echo "Unable to send reply";
			$msg = 'Unable to send reply';
			$cssClass = 'alert-danger';
			header("location: messages.php?page=unread&msg=$msg&cssClass=$cssClass");
			exit();
		}

		require '../phpmailer/index.php';
	}

	