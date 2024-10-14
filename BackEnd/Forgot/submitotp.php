<?php
session_start();
include '../dbconnect.php';


if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    
    // Fetch user details from the database
    $query = "SELECT email, password FROM `$table` WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    $usr = explode('@', $email)[0];
    
    if ($user) {
        echo "<h1>User Details</h1>";
        echo "Email: " . $user['email'] . "<br>";
        echo "Username:" . $usr . "<br>";
        echo "Password: " . $user['password'] . "<br>";
    } else {
        echo "Error fetching user details.";
    }

    // Clear the session data after displaying the details
    session_unset();
    session_destroy();
} else {
    echo "No email found. Please go back to the start.";
}
?>
