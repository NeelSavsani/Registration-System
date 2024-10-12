<?php
//creating a connection
$servername = "localhost";
$username = "root";
$password = "";
$dadtabase = "project";
$table ="login_credentials";

$conn = mysqli_connect($servername, $username, $password, $dadtabase);

if(!$conn)
{
    die("Error".mysqli_connect_error());
}

?>
