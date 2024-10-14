<?php
session_start();
include '../dbconnect.php';

$pemail = isset($_POST['email']) ? $_POST['email'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pass']) && isset($_POST['cpass'])) {
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    
    if ($pass == $cpass) {
        $sql = "UPDATE `$table` SET `PASSWORD` = '$pass' WHERE `EMAIL` = '$pemail';";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Password changed.";
            echo '<meta http-equiv="refresh" content="2;url=../home.php">';
        } else {
            echo "Password was not changed: " . mysqli_error($conn);
        }
    } else {
        echo "Passwords do not match.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form method="post">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($pemail); ?>">
        <label for="pass">Enter password:</label>
        <input type="password" name="pass" id="pass" required>
        <br>
        <label for="cpass">Confirm your password:</label>
        <input type="password" name="cpass" id="cpass" required>
        <br>
        <button type="submit">Change Password</button>
    </form>
</body>
</html>
