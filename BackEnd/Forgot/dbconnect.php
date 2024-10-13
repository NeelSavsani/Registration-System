<?php
//creating a connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";
$table ="login_credentials";

$conn = mysqli_connect($servername, $username, $password);

if(!$conn)
{
    die("Error".mysqli_connect_error());
}
else
{
    $sql = "CREATE DATABASE IF NOT EXISTS `$database`";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        echo "Creation of Database of Failed!<br>";
    }
    $sql = "CREATE TABLE IF NOT EXISTS `$database`.`$table` (`Sr. No.` INT(10) NOT NULL AUTO_INCREMENT , `Email Id` VARCHAR(30) NOT NULL , `Password` VARCHAR(30) NOT NULL , `Date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`Sr. No.`)) ENGINE = InnoDB";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        echo "Creation of table was failed!<br>";
    }
}

?>
