<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="https://kit.fontawesome.com/e05d24f6c7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Register.css">
</head>
<body>
    <i class="fa-solid fa-gear"></i>

    <section>
        <div class="Registration-Box">
            <form method="post">
                <h2>Registration Form</h2>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="register_email" id="register_email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="register_pass" id="register_pass" required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="register_repass" id="register_repass" required>
                    <label>Re-Enter Password</label>
                </div>


                <button type="submit">Register</button>
                <div class="register-link">
                    
                    <p> Registered already? <a href="../Login/Login.php">Login</a></p>
                </div>
                <?php
                $showAlert = false;
                $showError = false;
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    include '../dbconnect.php';
                    $register_email = $_POST['register_email'];
                    $register_pass = $_POST['register_pass'];
                    $register_repass = $_POST['register_repass'];
                    $register_user = explode('@', $register_email)[0];
                    if($register_pass == $register_repass && $register_pass != NULL)
                    {
                        $sql = "INSERT INTO `$table` (`Email`, `Password`, `Date`) VALUES ('$register_email', '$register_pass', current_timestamp());";
                        $result = mysqli_query($conn, $sql);
                        // echo "Password success";
                        if($result)
                        {
                            echo '<span class="success">'."Registeration completed, $register_user"."<br>Redirecting to homepage...".'</span>';
                            echo '<meta http-equiv="refresh" content="1;url=../home.php">';
                        }
                    }
                    else
                    {
                        echo '<span class="danger">'."Both Passwords do not match".'</span>';
                    }
                }
            ?>
            </form>
            
        </div>
    </section>

    <script>
        var btn = document.querySelector(".fa-gear");
        var bdy = document.querySelector("body");
        btn.onclick = function(){
            bdy.classList.toggle("dark");
        }
    </script>
    
</body>
</html>
