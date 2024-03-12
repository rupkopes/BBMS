<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp"/>
    <link rel="stylesheet" href="/BBMS/Reg_Login/login.css"/>
</head>
<body>

    <!-- Login form for Admin -->
    <div class="bbms admin-login">
        <div class="login-box">
            <form action="">
                <div class="arrow1">
                    <a href="staff_login.php"><span class="material-symbols-sharp">keyboard_double_arrow_left</span></a>
                </div>
                <div class="arrow2">
                    <a href="donor_login.php"><span class="material-symbols-sharp">keyboard_double_arrow_right</span></a>
                </div>
                <!-- <h1><div class="slide">Admin</div></h1> -->
                <h1>Admin</h1>
                <h2>Login</h2>
                <div class="input-box">
                    <span class="icon"><i class="material-symbols-sharp">mail</i></span>
                    <input type="email" name="email" id="email" placeholder="Username/Email" required>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="material-symbols-sharp">lock</i></span>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                        <i class="material-symbols-sharp">visibility</i>
                    </span>
                </div>
                <div class="remember-forget">
                    <label for="remember"><input type="checkbox">Remember Me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit"><a href="/BBMS/Admin Dashboard/index.php">Login</a></button>
                <div class="register-link">
                </div>
            </form>
        </div>
    </div>
    <script src="/BBMS/Reg_Login/eye.js"></script>
</body>
</html>