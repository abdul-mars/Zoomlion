<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Verification Code</title>
    <style>
        .code{
            color: #001c6c;
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <?php $url= 'http://'.$_SERVER['HTTP_HOST'];  ?>
    <div class="m-3">
        <p>Hello, <?= $name; ?></p>
        <p>You try to reset your account password and here your verification code. <br> Copy and paste it in the verification code field</p>
        <div class="code" style="width: 120px!important">
            <p class="fs-3 fw-bold"><?= $verif_code; ?></p>
        </div>
        <div>You can also click <a href="<?php echo $url; ?>/Project/password_recovery.php?operation=recover_password_step_2&email=<?= $email; ?>">here</a> to finish reseting your password</div>
        <p>If it was not you who requested for password reset don't worry your account is safe</p>
    </div>
</body>
</html>