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
        <script src="vendor/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
        <div class="main">
            <!-- Sign up form -->
            <section class="signup">
                <div class="container">
                    <div class="signup-content">
                        <div class="signup-form">
                            <h2 class="form-title">Sign up</h2>
                            <form method="POST" class="register-form" id="register-form">
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
                                    <input type="radio" name="Gender" value="0" id="rdbtn" required>Male
                                    <input type="radio" name="Gender" value="0" id="rdbtn" required>Female
                                </div>

                                <div class="form-group">
                                    <i class="zmdi zmdi-calendar"></i><span style="padding-left: 10px;">Birthday : </span>
                                    <input type="date" name="bday" id="bday" required>
                                </div>

                                <div>
                                    <p style="font-weight: 500; padding-bottom: 10px;"> Upload Profile Picture : </p>
                                    <div style="border: 1px solid red; width: 150px; height: 150px;" id="canvas"></div>
                                    <input type="file" name="fileupload" id='fileupload' accept='image/*' required> 
                                </div>

                                <div class="form-group">
                                    <input type="checkbox" required name='agree-term' id="agree-term" class="agree-term"/>
                                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                                </div>
                                <div class="form-group form-button">
                                    <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                                </div>
                            </form>
                        </div>
                        <div class="signup-image">
                            <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                            <a href="login.php" class="signup-image-link">I am already a member</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>