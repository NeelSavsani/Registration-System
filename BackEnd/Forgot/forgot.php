<?php
session_start();
include '../dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Check if the email exists in the database
    $query = "SELECT * FROM `$table` WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Email exists, proceed with OTP generation
        $_SESSION['email'] = $email;
        // Generate OTP
        $otp = rand(1000, 9999);
        $_SESSION['otp'] = $otp;

        // Send OTP to email (using PHP mailer or similar)
        // mail($email, "Your OTP", "Your OTP is: " . $otp);

        header("Location: otp.php");
        exit();
    } else {
        // Email does not exist, show an error message
        echo "The entered email does not exist in our records.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form method="POST" action="forgot.php">
        <label for="email">Enter your email:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
