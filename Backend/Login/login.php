<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <form name="login_form" method="post">
        <b>Enter email:</b> <input type="email" name="login_email" id="login_email">
        <br>
        <b>Enter password:</b> <input type="password" name="login_pass" id="login_pass">
        <br>
        <input type="submit" value="Login">
    </form>
    
</body>
</html>

<?php

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
        $login_email = $_POST['login_email'];
        $login_pass = $_POST['login_pass'];
        if($login_email != NULL && $login_pass != NULL)
        {
            $sql = "SELECT * FROM `$table` WHERE EMAIL = '$login_email' AND PASSWORD = '$login_pass'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            echo "Password success"."<br>";
            if($num == 1)
            {   
                $email = $login_email;
                echo "login successfully. Welcome, $login_email"."<br>Redirecting to homepage...";
                // header("Location: home.php");
                echo '<meta http-equiv="refresh" content="1;url=home.php">';
                exit();
            }
            else
            {
                echo "Invalid login credentials";
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
