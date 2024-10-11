<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register Form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <form name="register_form" method="post">
        <b>Enter email:</b> <input type="email" name="register_email" id="register_email">
        <br>
        <b>Enter password:</b> <input type="password" name="register_pass" id="register_pass">
        <br>
        <b>Renter password:</b> <input type="password" name="register_repass" id="register_repass">
        <br>
        <input type="submit" value="register">
    </form>
    
</body>
</html>

<?php
$showAlert = false;
$showError = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //creating a connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project";
    $table = "login_credentials";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if($conn)
    {
        echo "Connection Success"."<br>";
        $register_email = $_POST['register_email'];
        $register_pass = $_POST['register_pass'];
        $register_repass = $_POST['register_repass'];
        if($register_pass == $register_repass && $register_pass != NULL)
        {
            $sql = "INSERT INTO `$table` (`Email`, `Password`, `Date`) VALUES ('$register_email', '$register_pass', current_timestamp());";
            $result = mysqli_query($conn, $sql);
            echo "Password success";
            if($result)
            {
                echo "Registered successfully, $register_email";
            }
        }
        else
        {
            echo "Password Fail";
        }
    }
    else
    {
        die("Error". mysqli_connect_error());
    }
}
?>
