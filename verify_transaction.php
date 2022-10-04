<?php session_start();
  $payForId = $_SESSION['pay_for_id'];
  require_once 'includes/connection.php';
  $ref = $_GET['reference'];
  if ($ref == '') {
    header("location:javascript://history.go(-1)");
  }
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_f3a96bd375664ceeec939ea0c7fbd6833059ff10",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    // echo $response;
    $payResult = json_decode($response);
  }
  if ($payResult->data->status == 'success') {
    
    $status = $payResult->data->status;
    $reference = $payResult->data->reference;
    $email = $payResult->data->customer->email;
    $lname = $payResult->data->customer->last_name;
    $fname = $payResult->data->customer->first_name;
    $fullname = $lname. ' '. $fname;

    // $sql = "SELECT * FROM pickup_requests WHERE email = '$email' AND payed = 0 ORDER BY id DESC LIMIT 1";
    $sql = "SELECT * FROM pickup_requests WHERE email = '$email' AND `id` = '$payForId'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
    $id = $data['id'];
    $amount = $data['amount'];
    $size = $data['waste_size'];


    $size = $size.'Kg Waste Pick up';
    $sql = "INSERT INTO `payments`(`email`, `for`, `amount`) VALUES ('$email','$size','$amount')";
    if (mysqli_query($con, $sql)) {
      $sql = "UPDATE `pickup_requests` SET `payed`='1' WHERE `email` = '$email' AND `id` = '$payForId'";
      mysqli_query($con, $sql);
      $sql = "SELECT `id` FROM `payments` WHERE email = '$email' ORDER BY id DESC LIMIT 1";
      $id = $data = mysqli_fetch_assoc(mysqli_query($con, $sql))['id'];
      $sql = "INSERT INTO `notifications`(`reason_id`, `reason`) VALUES ('$id','payment')";
      mysqli_query($con, $sql);
      header("location: index.php?msg=You have successfuly paid for your waste pick up&size=$size&amount=$amount&id=$payForId");
    } else {
      header("Location: index.php?msg=Unable to process payment");
    }

  } else {
    header("Location: index.php?msg=Unable to process payment");
  }
?>