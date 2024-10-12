<?php
$otp = rand(0000, 9999);
include('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password?</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="otp.php" method="post">
        Enter email: <input type="email" name="forgot_email" id="forgot_email">
        <input type="hidden" name="otp" value="<?php echo $otp; ?>">
        <button type="submit">Check Password</button>
    </form>
</body>
</html>
