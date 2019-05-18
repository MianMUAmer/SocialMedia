<?php
session_start();
require_once './db.php';
if (isset($_POST["signinBtn"])) {
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    
    $stmt = $db->prepare("SELECT * FROM userdetails WHERE email = ?");
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        if (password_verify ($pass, $row['password'])) {
            // Success - Login
            $_SESSION['loginAt'] = time();
            $_SESSION['user'] = $row;
            $id = $row['id'];
            header("Location: Main/dashboard.php?id=$id");
            exit;
        }
    }
    $log_err = true;
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>MUFASA</title>
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Main css -->
        <link rel="stylesheet" href="css/style.css">
        <script type=”text/javascript” src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>

        <div class="main">
            <!-- Sing in  Form -->
            <div id="navBar">MUFASA</div>
            <section class="sign-in">
                <div class="container">
                    <div class="signin-content">
                        <div class="signin-image">
                            <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                            <a href="SignUp.php" class="signup-image-link">Create an account</a>
                        </div>

                        <div class="signin-form">
                            <h2 class="form-title">Sign in</h2>
                            <form method="POST" class="register-form" id="login-form">
                                <div class="form-group">
                                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                                    <input type="email" required name="email" id="email" placeholder="Your Email"/>
                                </div>
                                <div class="form-group">
                                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" required name="pass" id="your_pass" placeholder="Password"/>
                                </div>
                                <div>
                                    <?php
                                        if ( isset($log_err)) {
                                            echo "<p style = 'color: red'>Login Error</p>" ;
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                    <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                                </div>
                                <div class="form-group form-button">
                                    <input type="submit" name="signinBtn" id="signin" class="form-submit" value="Log in"/>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </body>
</html>