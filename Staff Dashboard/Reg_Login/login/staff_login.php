<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Blood Bank Management System - Staff Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-bbms">
        <h2>Staff Login</h2>
      
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
            </div>
            <button type="submit">Login</button>
            <a href="../../staff-bbms/login/forgot_password.php" class="forgot-password">Forgot Password?</a>
        </form>
    </div>
</body>
</html>
