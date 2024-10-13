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
                <div id="usernameDisplay" style="display: none; font-size: 1em; color: var(--bg-color); font-family: 'Poppins', sans-serif; margin-bottom: 10px;"></div>

                <div class="input-box" id="step1">
                    <div class="input_box">
                        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" name="login_email" id="login_email" required>
                        <label>Email</label>
                    </div>
                    <button type="submit" onclick="goToStep2()">Next &nbsp; <i class="fa-solid fa-arrow-right"></i></button>
                    <div class="register-link">
                        <p>Don't have an account? <a href="registration.html">Register</a></p>
                    </div>
                </div>

                <div class="input-box" id="step2" style="display: none;">
                    <div class="input_box">
                        <input type="password" id="login_pass" name="login_pass" required>
                        <span class="icon toggle-password"><i
                                class="fa-solid fa-eye-slash show-pass"></i></span>
                        <label>Password</label>
                    </div>
                    <button type="submit" onclick="goToStep1()"> <i class="fa-solid fa-arrow-left"></i> &nbsp; Previous</button>
                    <button type="submit">Login &nbsp; <i class="fa-solid fa-arrow-right"></i></button>
                    <div class="register-link">
                        <div class="remember-forgot">
                            <center>
                                <a href="#">Forgot Password?</a>
                            </center>
                        </div>
                    </div>
                </div>
                <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // creating a connection
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "project";
                        $table = "login_credentials";
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        if ($conn) {
                            $login_email = $_POST['login_email'];
                            $login_pass = $_POST['login_pass'];
                            $login_user = explode('@', $login_email)[0];
                            if ($login_email != NULL && $login_pass != NULL) {
                                $sql = "SELECT * FROM `$table` WHERE EMAIL = '$login_email' AND PASSWORD = '$login_pass'";
                                $result = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                if ($num == 1) {
                                    echo '<span class="success">Login Successful.<br> Welcome, ' . $login_user . '<br>Redirecting to homepage...</span>';
                                    echo '<meta http-equiv="refresh" content="2;url=../home.php">';
                                    exit();
                                } else {
                                    echo '<span class="danger">Invalid login credentials</span>';
                                }
                            } else {
                                echo '<span class="danger">Email and password are required</span>';
                            }
                        } else {
                            die("Error" . mysqli_connect_error());
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


    <!-- Script for toggling day-night -->
    <script>
        var bdy = document.querySelector("body");

        var btn = document.querySelector(".fa-gear")
        console.log("dark");
        btn.onclick = function () {
            bdy.classList.toggle("dark");

        }
    </script>

    <!-- Script to show and hide passwords on clicking eye -->
    <script>
        const togglePassword = document.querySelector(".toggle-password");
        const passwordField = document.getElementById('login_pass');

        togglePassword.addEventListener('click', function(){
            const type = passwordField.getAttribute('type') === 'password' ?
            'text' : 'password';
            passwordField.setAttribute('type', type);

            this.innerHTML = type === 'password' ? '<i class="fa-solid fa-eye-slash show-pass"></i>' : '<i class="fa-solid fa-eye show-pass"></i>';
        })
    </script>

    <!-- Script to switch between steps -->
    <script>
        function goToStep2() {
            const emailInput = document.getElementById('login_email').value;
            const username = emailInput.split('@')[0]; // Extract username from email

            if (username) {
                const usernameDisplay = document.getElementById('usernameDisplay');
                usernameDisplay.style.display = 'block';
                usernameDisplay.textContent = `Welcome, ${username}`;
            }

            document.getElementById('step1').style.display = 'none';
            document.getElementById('step2').style.display = 'block';
        }

        function goToStep1() {
            document.getElementById('step1').style.display = 'block';
            document.getElementById('step2').style.display = 'none';

            // Hide the username display when returning to step 1
            const usernameDisplay = document.getElementById('usernameDisplay');
            usernameDisplay.style.display = 'none';
        }

        //hit enter key to go to step 2
        document.getElementById("login_email").addEventListener("keypress", function(event) {
            if(event.key === "Enter")
            {
                event.preventDefault();
                goToStep2();
            }
        })
    </script>
</body>

</html>
