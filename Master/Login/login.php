<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://kit.fontawesome.com/e05d24f6c7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Login.css">
</head>

<body>
    <i class="fa-solid fa-gear"></i>
    <section>
        <div class="login-box">
            <form method="post">
                <h2>Login</h2>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="login_email" id="login_email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="login_pass" id="login_pass" required>
                    <label>Password</label>
                </div>


                <button type="submit">Login</button>
                <div class="register-link">
                    <div class="remember-forgot">
                        <!-- <label><input type="checkbox">Remember Me</label> -->
                        <center>
                            <a href="#">Forgot Password?</a>
                        </center>

                    </div>
                    <p>Don't have an account? <a href="../Register/register.php">Register</a></p>
                </div>
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
                            // echo "Connection Success"."<br>";
                            $login_email = $_POST['login_email'];
                            $login_pass = $_POST['login_pass'];
                            $login_user = explode('@', $login_email)[0];
                            if($login_email != NULL && $login_pass != NULL)
                            {
                                $sql = "SELECT * FROM `$table` WHERE EMAIL = '$login_email' AND PASSWORD = '$login_pass'";
                                $result = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                // echo "Password success"."<br>";
                                if($num == 1)
                                {   
                                    $email = $login_email;
                                    echo '<span class="success">'."Login Successfully. Welcome, $login_user"."<br>Redirecting to homepage...".'</span>';
                                    // header("Location: home.php");
                                    echo '<meta http-equiv="refresh" content="1;url=../home.php">';
                                    exit();
                                }
                                else
                                {
                                    echo '<span class="danger">'."Invalid login credentials".'</span>';
                                }
                            }
                            else
                            {
                                echo '<span class="danger">'."Password Fail".'</span>';
                            }
                        }
                        else
                        {
                            die("Error". mysqli_connect_error());
                        }
                    }
                ?>
            </form>
        </div>

    </section>
    <div id="toggle">
        <i class="indicator"></i>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


    <script>
        var bdy = document.querySelector("body");

        var btn = document.querySelector(".fa-gear")
        console.log("dark");
        btn.onclick = function () {
            bdy.classList.toggle("dark");

        }
    </script>
</body>

</html>
