<?php
$verify_otp = $_POST['verify_otp'];
$otp = $_POST['otp'];
$forgot_email = $_POST['forgot_email'];
$forgot_user = $_POST['forgot_user'];
include('dbconnect.php');
if($verify_otp == $otp)
{
    echo "OTP Verified<br>";
    echo "Welcome,<br>";
    // $sql = "SELECT PASSWORD FROM `$table` WHERE EMAIL = '$forgot_email'";
    $sql = "SELECT PASSWORD FROM `$table` WHERE EMAIL = '$forgot_email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    // echo "Password success"."<br>";
    if($num == 1)
    {   
        $email = $forgot_email;
        echo "Email: $forgot_email"."<br>"."Username: $forgot_user". "<br>". "Password: ".htmlspecialchars($row['PASSWORD']);
    }
    else
    {
        echo "Invalid email id";
    }
    // $num = mysqli_num_rows($result);
    // $row = mysqli_fetch_assoc($result);
    // if($num == 1)
    // echo "Password success"."<br>";
    // {   
    //     $email = $forgot_email;
    //     echo "Email: $forgot_email"."<br>"."Username: $forgot_user". "<br>". "Password: ".htmlspecialchars($row['PASSWORD']);
    // }

}
else
{
    echo "OTP Unverified";
}

?>
