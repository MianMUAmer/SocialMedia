<?php //
    require_once '../db.php';
    extract($_GET);
    $stmt = $db->prepare("select * from userdetails where id = ?");
    $stmt->execute([$id]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
//    var_dump($userData);
//    $ig = base64_decode($userData['picture']);
//    echo $userData['picture'];
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" type="text/css" href="css/animate.css">
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/line-awesome.css">
        <link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
    </head>


    <body>
        <div class="wrapper">
            <header>
                <div class="container">
                    <div class="header-data">
                        <div class="logo">
                            <a href="dashboard.php?id=<?=$id?>" title=""><img src="images/logo.png" alt=""></a>
                        </div><!--logo end-->
                        <div class="search-bar">
                            <form>
                                <input type="text" name="search" placeholder="Search...">
                                <button type="submit"><i class="la la-search"></i></button>
                            </form>
                        </div><!--search-bar end-->
                        <nav>
                            <ul>
                                <li><a href="index.html" title=""><span><img src="images/icon1.png" alt=""></span>Home</a></li>
                                <li><a href="profiles.html" title=""> <span><img src="images/icon4.png" alt=""></span>People</a></li>
                                <li>
                                    <a href="#" title="" class="not-box-open"><span><img src="images/icon6.png" alt=""></span>Messages</a>
                                    <div class="notification-box msg">
                                        <div class="nt-title">
                                            <h4>Setting</h4>
                                            <a href="#" title="">Clear all</a>
                                        </div>
                                        <div class="nott-list">
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/resources/ny-img1.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="messages.html" title="">Jassica William</a> </h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/resources/ny-img2.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="messages.html" title="">Jassica William</a></h3>
                                                    <p>Lorem ipsum dolor sit amet.</p>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/resources/ny-img3.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="messages.html" title="">Jassica William</a></h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua.</p>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div>
                                            <div class="view-all-nots">
                                                <a href="messages.html" title="">View All Messsages</a>
                                            </div>
                                        </div><!--nott-list end-->
                                    </div><!--notification-box end-->
                                </li>
                                <li>
                                    <a href="#" title="" class="not-box-open">
                                        <span><img src="images/icon7.png" alt=""></span>
                                        Notification
                                    </a>
                                    <div class="notification-box">
                                        <div class="nt-title">
                                            <h4>Setting</h4>
                                            <a href="#" title="">Clear all</a>
                                        </div>
                                        <div class="nott-list">
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/resources/ny-img1.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/resources/ny-img2.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/resources/ny-img3.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/resources/ny-img2.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div>
                                            <div class="view-all-nots">
                                                <a href="#" title="">View All Notification</a>
                                            </div>
                                        </div><!--nott-list end-->
                                    </div><!--notification-box end-->
                                </li>
                            </ul>
                        </nav><!--nav end-->
                        <div class="menu-btn">
                            <a href="#" title=""><i class="fa fa-bars"></i></a>
                        </div><!--menu-btn end-->
                        <div class="user-account">
                            <div class="user-info" style="width: 130px">
                                <?php echo $userData['picture'] ?>
                                <a href="#" title="">My Profile</a>
                                <!--<i class="la la-sort-down"></i>-->
                            </div>
                            <div class="user-account-settingss">
                                <h3>Status</h3>
                                <div class="search_form">
                                    <form>
                                        <input type="text" name="search">
                                        <button type="submit">Ok</button>
                                    </form>
                                </div><!--search_form end-->

                                <ul class="us-links">
                                    <li><a href="#" title="">Faqs</a></li>
                                    <li><a href="#" title="">Terms & Conditions</a></li>
                                </ul>
                                <h3 class="tc"><a href="#" title="">Logout</a></h3>
                            </div><!--user-account-settingss end-->
                        </div>
                    </div><!--header-data end-->
                </div>
            </header><!--header end-->	

            <main>
                <div class="main-section">
                    <div class="container">
                        <div class="main-section-data">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                                    <div class="main-left-sidebar no-margin">
                                        <div class="user-data full-width">
                                            <div class="user-profile">
                                                <div class="username-dt">
                                                    <div class="usr-pic">
                                                        <?php echo $userData['picture'] ?>
                                                    </div>
                                                </div><!--username-dt end-->
                                                <div class="user-specs">
                                                    <?php echo "<h3>" . $userData['fullname'] . "</h3>" ?>
                                                    <span>Status</span>
                                                </div>
                                            </div><!--user-profile end-->
                                            <ul class="user-fw-status">
                                                <li>
                                                    <h4>Birthday</h4>
                                                    <?php echo "<span>" . $userData['bday'] . "</span>" ?>
                                                </li>
                                                <li>
                                                    <h4>Events</h4>
                                                    <span>34</span>
                                                </li>
                                                <li>
                                                    <h4>Followers</h4>
                                                    <span>155</span>
                                                </li>
                                                <li>
                                                    <a href="#" title="">View Profile</a>
                                                </li>
                                            </ul>
                                        </div><!--user-data end-->
                                    </div><!--main-left-sidebar end-->
                                </div>
                                <div class="col-lg-6 col-md-8 no-pd">
                                    <div class="main-ws-sec">
                                        <div class="post-topbar">
                                            <div class="user-picy">
                                                <?php echo $userData['picture'] ?>
                                            </div>
                                            <pre id="yaas" style="height: 20px;">      In the mood to meet some awesome people?</pre>
                                            <div class="post-st">
                                                <ul>
                                                    <li><a class="post_project" href="#" title="">Create an Event</a></li>
                                                </ul>
                                            </div><!--post-st end-->
                                        </div><!--post-topbar end-->
                                        <div class="posts-section">
                                            <div class="posty">
                                                <div class="post-bar no-margin">
                                                    <div class="post_topbar">
                                                        <div class="usy-dt">
                                                            <?php echo $userData['picture'] ?>
                                                            <div class="usy-name">
                                                                <?php echo "<h3>" . $userData['fullname'] . "</h3>" ?>
                                                                <!--<img id="clock" src="images/clock.png" alt="">------------------------------->
                                                                <span>3 min ago</span>
                                                            </div>
                                                        </div>
                                                        <div class="ed-opts">
                                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                            <ul class="ed-options">
                                                                <li><a href="#" title="">Edit Post</a></li>
                                                                <li><a href="#" title="">Unsaved</a></li>
                                                                <li><a href="#" title="">Unbid</a></li>
                                                                <li><a href="#" title="">Close</a></li>
                                                                <li><a href="#" title="">Hide</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="epi-sec">
                                                        <ul class="descp">
                                                            <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                                                            <li><img src="images/icon9.png" alt=""><span>Pakistan</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="job_descp">
                                                        <h3>Senior Wordpress Developer</h3>
                                                        <ul class="job-dt">
                                                            <li><a href="#" title="">4 To 10 Participants</a></li>
                                                            <li><span>$30 / hr</span></li>
                                                        </ul>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                                                    </div>
                                                    <div class="job-status-bar">
                                                        <ul class="like-com">
                                                            <li>
                                                                <a href="#"><i class="la la-heart"></i> Join</a>
                                                                <img src="images/liked-img.png" alt="">
                                                                <span>25</span>
                                                            </li> 
                                                            <li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
                                                        </ul>
                                                    </div>
                                                </div><!--post-bar end-->
                                                <div class="comment-section">
                                                    <div class="plus-ic">
                                                        <i class="la la-plus"></i>
                                                    </div>
                                                    <div class="comment-sec">
                                                        <ul>
                                                            <li>
                                                                <div class="comment-list">
                                                                    <div class="bg-img">
                                                                        <img src="images/resources/bg-img1.png" alt="">
                                                                    </div>
                                                                    <div class="comment">
                                                                        <h3>ABC</h3>
                                                                        <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                                        <p>Lorem ipsum dolor sit amet, </p>
                                                                        <a href="#" title="" class="active"><i class="fa fa-reply-all"></i>Reply</a>
                                                                    </div>
                                                                </div><!--comment-list end-->
                                                                <ul>
                                                                    <li>
                                                                        <div class="comment-list">
                                                                            <div class="bg-img">
                                                                                <img src="images/resources/bg-img2.png" alt="">
                                                                            </div>
                                                                            <div class="comment">
                                                                                <?php echo "<h3>" . $userData['fullname'] . "</h3>" ?>
                                                                                <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                                                <p>Hi ABC </p>
                                                                                <a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>
                                                                            </div>
                                                                        </div><!--comment-list end-->
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li>
                                                                <div class="comment-list">
                                                                    <div class="bg-img">
                                                                        <img src="images/resources/bg-img3.png" alt="">
                                                                    </div>
                                                                    <div class="comment">
                                                                        <h3>DEF</h3>
                                                                        <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at.</p>
                                                                        <a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>
                                                                    </div>
                                                                </div><!--comment-list end-->
                                                            </li>
                                                        </ul>
                                                    </div><!--comment-sec end-->
                                                    <div class="post-comment">
                                                        <div class="comment_box">
                                                            <form>
                                                                <input type="text" placeholder="Post a comment">
                                                                <button type="submit">Send</button>
                                                            </form>
                                                        </div>
                                                    </div><!--post-comment end-->
                                                </div><!--comment-section end-->
                                            </div><!--posty end-->
                                            
                                            <div class="top-profiles">
                                                <div class="pf-hd">
                                                    <h3>Top Profiles</h3>

                                                </div>
                                                <div class="profiles-slider">
                                                    <div class="user-profy">
                                                        <img src="images/resources/user1.png" alt="">
                                                        <?php echo "<h3>" . $userData['fullname'] . "</h3>" ?>
                                                        <span>Graphic Designer</span>
                                                        <ul>
                                                            <li><a href="#" title="" class="followw">Follow</a></li>
                                                            <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>

                                                        </ul>
                                                        <a href="#" title="">View Profile</a>
                                                    </div><!--user-profy end-->
                                                    <div class="user-profy">
                                                        <img src="images/resources/user2.png" alt="">
                                                        <?php echo "<h3>" . $userData['fullname'] . "</h3>" ?>
                                                        <span>Graphic Designer</span>
                                                        <ul>
                                                            <li><a href="#" title="" class="followw">Follow</a></li>
                                                            <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>

                                                        </ul>
                                                        <a href="#" title="">View Profile</a>
                                                    </div><!--user-profy end-->
                                                    <div class="user-profy">
                                                        <img src="images/resources/user3.png" alt="">
                                                        <?php echo "<h3>" . $userData['fullname'] . "</h3>" ?>
                                                        <span>Graphic Designer</span>
                                                        <ul>
                                                            <li><a href="#" title="" class="followw">Follow</a></li>
                                                            <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>

                                                        </ul>
                                                        <a href="#" title="">View Profile</a>
                                                    </div><!--user-profy end-->
                                                    <div class="user-profy">
                                                        <img src="images/resources/user1.png" alt="">
                                                        <?php echo "<h3>" . $userData['fullname'] . "</h3>" ?>
                                                        <span>Graphic Designer</span>
                                                        <ul>
                                                            <li><a href="#" title="" class="followw">Follow</a></li>
                                                            <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>

                                                        </ul>
                                                        <a href="#" title="">View Profile</a>
                                                    </div><!--user-profy end-->
                                                    <div class="user-profy">
                                                        <img src="images/resources/user2.png" alt="">
                                                        <?php echo "<h3>" . $userData['fullname'] . "</h3>" ?>
                                                        <span>Graphic Designer</span>
                                                        <ul>
                                                            <li><a href="#" title="" class="followw">Follow</a></li>
                                                            <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>

                                                        </ul>
                                                        <a href="#" title="">View Profile</a>
                                                    </div><!--user-profy end-->
                                                    <div class="user-profy">
                                                        <img src="images/resources/user3.png" alt="">
                                                        <h3>John Doe</h3>
                                                        <span>Graphic Designer</span>
                                                        <ul>
                                                            <li><a href="#" title="" class="followw">Follow</a></li>
                                                            <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>

                                                        </ul>
                                                        <a href="#" title="">View Profile</a>
                                                    </div><!--user-profy end-->
                                                </div><!--profiles-slider end-->
                                            </div><!--top-profiles end-->

                                            <div class="process-comm">
                                                <a href="#" title=""><img src="images/process-icon.png" alt=""></a>
                                            </div><!--process-comm end-->
                                        </div><!--posts-section end-->
                                    </div><!--main-ws-sec end-->
                                </div>
                                <div class="col-lg-3 pd-right-none no-pd">
                                    <div class="right-sidebar">
                                        <div class="widget widget-jobs">
                                            <div class="sd-title"><h3>New Events</h3></div>
                                            <div class="jobs-list">
                                                <div class="job-info">
                                                    <div class="job-details">
                                                        <h3>Senior Product Designer</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                                    </div>
                                                    <div class="hr-rate">
                                                        <span>$25/hr</span>
                                                    </div>
                                                </div><!--job-info end-->
                                            </div><!--jobs-list end-->
                                        </div><!--widget-jobs end-->
                                    </div>
                                </div><!--right-side bar end-->
                            </div>
                        </div>
                    </div><!-- main-section-data end-->
                </div> 
            </main>




            <div class="post-popup pst-pj">
                <div class="post-project">
                    <h3>Create an event</h3>
                    <div class="post-project-fields">
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" name="title" placeholder="Title">
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="location" placeholder="Location">
                                </div>
                                <div class="col-lg-12">
                                    <div class="inp-field">
                                        <select>
                                            <option>Category</option>
                                            <option>Category 1</option>
                                            <option>Category 2</option>
                                            <option>Category 3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="price-sec">
                                        <div class="price-br">
                                            <input type="text" name="minAtt" placeholder="Min. Attendance">

                                        </div>
                                        <span>To</span>
                                        <div class="price-br">
                                            <input type="text" name="maxAtt" placeholder="Max. Attendance">
                                        </div>
                                    </div>
                                    <div class="price-br">
                                        <input type="text" name="price" placeholder="Cost of attendance">
                                        <i class="la la-dollar"></i>
                                    </div>

                                </div>
                                <div class="col-lg-12">
                                    <textarea name="description" placeholder="Description"></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <ul>
                                        <li><button class="active" type="submit" value="post">Post</button></li>
                                        <li><a href="#" title="">Cancel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div><!--post-project-fields end-->
                    <a href="#" title=""><i class="la la-times-circle-o"></i></a>
                </div><!--post-project end-->
            </div><!--post-project-popup end-->

            <div class="chatbox-list">
                <div class="chatbox">
                    <div class="chat-mg">
                        <a href="#" title=""><img src="images/resources/usr-img1.png" alt=""></a>
                        <span>2</span>
                    </div>
                    <div class="conversation-box">
                        <div class="con-title mg-3">
                            <div class="chat-user-info">
                                <img src="images/resources/us-img1.png" alt="">
                                <h3>John Doe <span class="status-info"></span></h3>
                            </div>
                            <div class="st-icons">
                                <a href="#" title=""><i class="la la-cog"></i></a>
                                <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
                                <a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
                            </div>
                        </div>
                        <div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
                            <div class="chat-msg">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                                <span>Sat, Aug 23, 1:10 PM</span>
                            </div>
                            <div class="date-nd">
                                <span>Sunday, August 24</span>
                            </div>
                            <div class="chat-msg st2">
                                <p>Cras ultricies ligula.</p>
                                <span>5 minutes ago</span>
                            </div>
                            <div class="chat-msg">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                                <span>Sat, Aug 23, 1:10 PM</span>
                            </div>
                        </div><!--chat-list end-->
                        <div class="typing-msg">
                            <form>
                                <textarea placeholder="Type a message here"></textarea>
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                            <ul class="ft-options">
                                <li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
                                <li><a href="#" title=""><i class="la la-camera"></i></a></li>
                                <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
                            </ul>
                        </div><!--typing-msg end-->
                    </div><!--chat-history end-->
                </div>
                <div class="chatbox">
                    <div class="chat-mg">
                        <a href="#" title=""><img src="images/resources/usr-img2.png" alt=""></a>
                    </div>
                    <div class="conversation-box">
                        <div class="con-title mg-3">
                            <div class="chat-user-info">
                                <img src="images/resources/us-img1.png" alt="">
                                <h3>John Doe <span class="status-info"></span></h3>
                            </div>
                            <div class="st-icons">
                                <a href="#" title=""><i class="la la-cog"></i></a>
                                <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
                                <a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
                            </div>
                        </div>
                        <div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
                            <div class="chat-msg">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                                <span>Sat, Aug 23, 1:10 PM</span>
                            </div>
                            <div class="date-nd">
                                <span>Sunday, August 24</span>
                            </div>
                            <div class="chat-msg st2">
                                <p>Cras ultricies ligula.</p>
                                <span>5 minutes ago</span>
                            </div>
                            <div class="chat-msg">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                                <span>Sat, Aug 23, 1:10 PM</span>
                            </div>
                        </div><!--chat-list end-->
                        <div class="typing-msg">
                            <form>
                                <textarea placeholder="Type a message here"></textarea>
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                            <ul class="ft-options">
                                <li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
                                <li><a href="#" title=""><i class="la la-camera"></i></a></li>
                                <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
                            </ul>
                        </div><!--typing-msg end-->
                    </div><!--chat-history end-->
                </div>
                <div class="chatbox">
                    <div class="chat-mg bx">
                        <a href="#" title=""><img src="images/chat.png" alt=""></a>
                        <span>2</span>
                    </div>
                    <div class="conversation-box">
                        <div class="con-title">
                            <h3>Messages</h3>
                            <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
                        </div>
                        <div class="chat-list">
                            <div class="conv-list active">
                                <div class="usrr-pic">
                                    <img src="images/resources/usy1.png" alt="">
                                    <span class="active-status activee"></span>
                                </div>
                                <div class="usy-info">
                                    <h3>John Doe</h3>
                                    <span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
                                </div>
                                <div class="ct-time">
                                    <span>1:55 PM</span>
                                </div>
                                <span class="msg-numbers">2</span>
                            </div>
                            <div class="conv-list">
                                <div class="usrr-pic">
                                    <img src="images/resources/usy2.png" alt="">
                                </div>
                                <div class="usy-info">
                                    <h3>John Doe</h3>
                                    <span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
                                </div>
                                <div class="ct-time">
                                    <span>11:39 PM</span>
                                </div>
                            </div>
                            <div class="conv-list">
                                <div class="usrr-pic">
                                    <img src="images/resources/usy3.png" alt="">
                                </div>
                                <div class="usy-info">
                                    <h3>John Doe</h3>
                                    <span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
                                </div>
                                <div class="ct-time">
                                    <span>0.28 AM</span>
                                </div>
                            </div>
                        </div><!--chat-list end-->
                    </div><!--conversation-box end-->
                </div>
            </div><!--chatbox-list end-->

        </div><!--theme-layout end-->



        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/popper.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
        <script type="text/javascript" src="lib/slick/slick.min.js"></script>
        <script type="text/javascript" src="js/scrollbar.js"></script>
        <script type="text/javascript" src="js/script.js"></script>

    </body>

</html>
