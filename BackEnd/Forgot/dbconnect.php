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
    $sql = "CREATE TABLE IF NOT EXISTS `$database`.`$table` (`Sr. No.` INT(10) NOT NULL AUTO_INCREMENT , `Email` VARCHAR(30) NOT NULL , `Password` VARCHAR(30) NOT NULL , `Date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`Sr. No.`)) ENGINE = InnoDB";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        echo "Creation of table was failed!<br>";
    }
    $sql = "SELECT * FROM `$database`.`$table`;";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num==0)
    {
        $sql = "INSERT INTO `$database`.`$table` (`Sr. No.`, `Email`, `Password`, `Date`) VALUES (1, 'neelsavsani7@gmail.com', 'Neel@123', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            echo "Insertion of data is failed". mysqli_connect_error();
        }
    }
}

?>
