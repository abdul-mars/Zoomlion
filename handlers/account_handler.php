<?php session_start();
    $sessionEmail = $_SESSION['email'];
    require_once '../includes/connection.php';
    if (isset($_POST['accUpdSubmit'])) {
        function cleanInput($value) {
            global $con;
            $value = strip_tags($value);
            $value = strtolower($value);
            $value = mysqli_real_escape_string($con, $value);
            // return $value;
            // echo $value;
        }
        $surname = $_POST['surname'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $houseName = $_POST['houseName'];
        $houseNo = $_POST['houseNo'];
        $location = $_POST['location'];
        $landmark = $_POST['landmark'];
        $region = $_POST['region'];
        $town = $_POST['town'];
        $district = $_POST['district'];
        $town = $_POST['town'];
        $area = $_POST['area'];
        $desc = $_POST['desc'];
        // echo "string";
        cleanInput($surname);
        cleanInput($firstname);
        cleanInput($email );
        cleanInput($phone );
        cleanInput($gender);
        cleanInput($houseName);
        cleanInput( $houseNo);
        cleanInput($location);
        cleanInput($landmark);
        cleanInput($region);
        cleanInput( $town );
        cleanInput($district);
        cleanInput($town);
        cleanInput( $area);
        cleanInput($desc);

        $sql = "UPDATE `userstable` SET `email`='$email',`surname`='$surname',`firstname`='$firstname',`gender`='$gender',`phone`='$phone' WHERE `email` = '$email'";
        mysqli_query($con, $sql);
        $sql = "UPDATE `house_info` SET `house_name`='$houseName',`house_no`='$houseNo',`location`='$location',`landmark`='$landmark',`region`='$region',`district`='$district',`town`='$town',`area`='$area',`desc`='$desc' WHERE `email` = '$sessionEmail' ";
        ;
        if (mysqli_query($con, $sql)) {
            $_SESSION['name'] = $surname.' '.$firstname;
            $_SESSION['email'] = $email;
            $msg = 'Account updated successfully';
            $alertClass = 'alert-success';
            header("location: ../account.php?msg=$msg&alertClass=$alertClass");
            exit();
        } else {
            $msg = 'Unable to update Account';
            $alertClass = 'alert-danger';
            header("location: ../account.php?msg=$msg&alertClass=$alertClass");
            exit();
        }
    }
?>