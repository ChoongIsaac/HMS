<!DOCTYPE html>
<html lang="en">

<head>
    <title>HMS</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="Art Sign Up Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates,
		Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="web/css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="web/css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- /google fonts-->

</head>


<?php

header("X-Frame-Options: SAMEORIGIN");



session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['csrf_token'];
if (isset($_POST['login-submit'])) {

    if (isset($_POST['csrf_token'])) {
        $csrf_token = $_POST['csrf_token'];

        // Check if the submitted token matches the one stored in $_SESSION.
        if ($csrf_token === $_SESSION['csrf_token']) {
            echo 'Token valid. Updating your data.<br>';
        } else {
            echo 'Token invalid. Operation not allowed.<br>';
        }
    } else {
        echo 'CSRF token not found in the request.<br>';
    }
}
?>

<body>
    <h1>Hostel Room Allocation System</h1>
    <div class=" w3l-login-form">
		<?php
		if (isset($_GET['session']) && $_GET['session'] == 'expired') {
		?>
		<div style="background-color: #f8f5d7;color: #fc3955;padding: 10px;margin: 10px 0;border: 1px solid #f8f5d7;border-radius: 5px;">
		  Your session has expired. Please log in again.
		</div>
		<?php
		}
		?>
        <h2>Student Login</h2>
        <form action="includes/login.inc.php" method="POST">
            <input type="hidden" name="csrf_token" value=<?= htmlentities($token, ENT_QUOTES | ENT_HTML5, "UTF-8") ?> />
            <div class=" w3l-form-group">
                <label>Student Roll No:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="student_roll_no" placeholder="Roll No" required="required" />
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-control" name="pwd" placeholder="Password" required="required" />
                </div>
            </div>
            <!--<div class="forgot">
                <a href="#">Forgot Password?</a>
                <p><input type="checkbox">Remember Me</p>
            </div>-->
            <button type="submit" name="login-submit">Login</button>
        </form>
        <p class=" w3l-register-p">Login as<a href="login-hostel_manager.php" class="register"> Hostel-Manager/Admin</a></p>
        <p class=" w3l-register-p">Don't have an account?<a href="signup.php" class="register"> Sign up</a></p>
    </div>
    <footer>
        <p class="copyright-agileinfo"> &copy; 2018 DBMS Project. All Rights Reserved | Design by <a href="https://www.linkedin.com/in/bharat-reddy/">Bharat-Prajwal-Rakesh</a></p>
    </footer>

</body>

</html>