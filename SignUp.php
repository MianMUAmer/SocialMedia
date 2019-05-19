<?php
session_start();
require_once './db.php';

if (isset($_POST["signupBtn"])) {
    var_dump($_POST);
    extract($_POST);
    $pass = password_hash($pass, PASSWORD_BCRYPT);
    $fulname = $name . ' ' . $srname;
    try {
        $stmt = $db->prepare("insert into userdetails (fullname, email, password, gender, bday, picture) values (?,?,?,?,?,?)");
        $stmt->execute([$fulname, $email, $pass, $Gender, $bday, $imgURL]);
        $stmt = $db->prepare("select id from userdetails where email=?");
        $stmt->execute([$email]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($data);
        $id = $data['id'];
        header("Location: Main/dashboard.php?id=$id");
        exit;
    } catch (Exception $ex) {
        $error = true;
    }
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
            <div id="navBar">MUFASA</div>
            <!-- Sign up form -->
            <section class="signup">
                <div class="container">
                    <div class="signup-content">
                        <div class="signup-form">
                            <h2 class="form-title">Sign up</h2>
                            <div>
                                <?php
                                if (isset($error)) {
                                    echo "<p style = 'color: red;'>Error : Email Address Already In Use</p>";
                                }
                                ?>
                            </div>
                            <form method="POST" action="" class="register-form" id="register-form">
                                <div class="form-group">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="name" id="name" placeholder="Your Name" required/>
                                </div>
                                <div class="form-group">
                                    <label for="srname"><i class="zmdi zmdi-account-o zmdi-hc-2x"></i></label>
                                    <input type="text" name="srname" id="name" placeholder="Your Surname" required/>
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                                    <input type="email" name="email" id="email" placeholder="Your Email" required/>
                                </div>
                                <div class="form-group">
                                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" name="pass" id="pass" placeholder="Password" required/>
                                </div>

                                <div class="form-group">
                                    <i class="zmdi zmdi-male-female"></i><span style="padding-left: 10px;">Gender : </span>
                                    <input type="radio" name="Gender" value="Male" id="rdbtn" required>Male
                                    <input type="radio" name="Gender" value="Female" id="rdbtn" required>Female
                                </div>

                                <div class="form-group">
                                    <i class="zmdi zmdi-cake"></i><span style="padding-left: 10px;">Birthday : </span>
                                    <input type="date" name="bday" id="bday" required>
                                </div>

                                <div>
                                    <p style="font-weight: 500; padding-bottom: 10px;"> Upload Profile Picture : </p>
                                    <div id="output"><img id="outputimg" src="./images/download.png"></div>
                                    <input id="fileupload" type="file" name="fileupload" accept='image/*' onchange="encodeImageFileAsURL();" required />
                                </div>
                                <div>
                                    <input type="hidden" name="imgURL" id="imgURL"/>
                                </div>

                                <div class="form-group">
                                    <input type="checkbox" required name='agree-term' id="agree-term" class="agree-term"/>
                                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                                </div>
                                <div class="form-group form-button">
                                    <input type="submit" name="signupBtn" id="signup" class="form-submit" value="Register"/>
                                </div>
                            </form>
                        </div>
                        <div class="signup-image">
                            <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                            <a href="index.php" class="signup-image-link">I am already a member</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>