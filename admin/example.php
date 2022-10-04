<?php session_start();
  require_once '../includes/connection.php';
  /*
  This example works only for those users which are using Cloud Service and do not want to run
  client application on their end.
  You just need to Start the Cloud Service from the Dashboard and Scan QR Code.
  When WhatsApp gets ready, then you can start sending messages.
  */

  if (isset($_POST['replyWhatsMsg'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $whatsNo = mysqli_real_escape_string($con, $_POST['whatsNo']);
    $toMsg = mysqli_real_escape_string($con, $_POST['toMsg']);
    $replyMsg = mysqli_real_escape_string($con, $_POST['replyMsg']);

    $body = 'Dear '.$name.'

      *Replying to your message:* '.
      $toMsg. '

      ----------------------------------- 
      *Our Reply* 

      '. $replyMsg;
      
    include('WhatsappAPI.php'); // include given API file
    $wp = new WhatsappAPI("3649", "02c857847b1b035937792913ce89c147d416a788"); // create an object of the WhatsappAPI class with your user id and api key
    $number = $whatsNo; // NOTE: Phone Number should be with country code
    // $message = 'Testing WhatsappAPI From PHP'; // You can use WhatsApp Code to compose text messages like *bold*, ~Strikethrough~, ```Monospace```
    $message = $body; // You can use WhatsApp Code to compose text messages like *bold*, ~Strikethrough~, ```Monospace```
    // $media_url = 'http://www.africau.edu/images/default/sample.pdf'; // Direct global accessible URL of the file, image, docs etc.
    // Max file size should be 10MB otherwise you may get error.
    // $group_name = 'My Test Group 😋';
    // $caption = 'Its my Caption'; // For media files
    /* UNCOMMENT YOUR REQUIRED FUNCTIONS FROM BELOW */
    // Send Text Message to number
    $status = $wp->sendText($number, $message);
    // Send PDF, Documents, File, Images etc  Message to number
    // $status = $wp->sendFromURL($number, $media_url, $caption);
    // Send Text message in Group
    //$status = $wp->sendTextInGroup($group_name, $message);
    // Send Media message in Group
    //$status = $wp->sendFromURLInGroup($group_name, $media_url, $caption);
    $status = json_decode($status);
    if($status->status == 'error'){
      // echo $status->response;
      $msg = 'Unable to send reply';
      $alertClass = 'alert-danger';
      header("location: messages.php?msg=$msg&alertClass=$alertClass");
      exit();
    }elseif($status->status == 'success'){
      // echo 'Success <br />';
      // echo $status->response;
      $msg = 'Reply sent Successfully';
      $alertClass = 'alert-success';
      header("location: messages.php?msg=$msg&alertClass=$alertClass");
      exit();
    }else{
      // print_r($status);
      $msg = 'Unable to send reply';
      $alertClass = 'alert-danger';
      header("location: messages.php?msg=$msg&alertClass=$alertClass");
      exit();
    }
  }
  
  ?>