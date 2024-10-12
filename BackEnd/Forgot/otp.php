<?php
$otp = $_POST['otp'];
$forgot_email = $_POST['forgot_email'];
$forgot_user = explode('@', $forgot_email)[0];
include('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>
<body>
    <h2>OTP Verification</h2>
    <h3><?php echo"Welcome, "; ?></h3>
    <form action="submitotp.php" method="POST">
        Enter OTP: <input type="number" name="verify_otp" id="verify_otp">
        <input type="hidden" name="otp" id="otp" value="<?php echo $otp; ?>">
        <input type="hidden" name="forgot_email" id="forgot_email" value="<?php echo $forgot_email; ?>">
        <input type="hidden" name="forgot_user" id="forgot_user" value="<?php echo $forgot_user; ?>">
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
<?php
include('smtp/PHPMailerAutoload.php');
$html = '<big><b style="font-size: 1em;">'.$otp.'</b></big>';
echo smtp_mailer($forgot_email,'OTP Verification Subject', $html);
function smtp_mailer($to,$subject, $msg){
    $forgot_email = $_POST['forgot_email'];
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "neelsavsani7@gmail.com";
	$mail->Password = "kdob lrur lvly nvqk";
	$mail->SetFrom("neel");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'OTP Sent to '.$forgot_email;
	}
}
?>
