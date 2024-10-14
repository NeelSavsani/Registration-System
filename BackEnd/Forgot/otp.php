<?php
session_start();
include '../dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_otp = $_POST['otp'];
    
    if ($entered_otp == $_SESSION['otp']) {
        // OTP is correct
        header("Location: submitotp.php");
        exit();
    } else {
        // OTP is incorrect
        echo "Invalid OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
</head>
<body>
	<h2>OTP Verification</h2>
    <form method="POST" action="otp.php">
        <label for="otp">Enter OTP:</label>
        <input type="number" name="otp" id="otp" required>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
<?php
include('smtp/PHPMailerAutoload.php');
$forgot_email = $_SESSION['email'];
$html = '<big><b style="font-size: 1em;">'.$_SESSION['otp'].'</b></big>';
echo smtp_mailer($forgot_email,'OTP Verification Subject', $html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$forgot_email = $_SESSION['email'];
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
