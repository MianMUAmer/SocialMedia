<?php
//
require_once '../db.php';
session_start();
//var_dump($_SESSION);

extract($_GET);
$stmt = $db->prepare("select * from userdetails where id = ?");
$stmt->execute([$id]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

$Pstmt = $db->prepare("select * from Posts order by post_id DESC");
$Pstmt->execute();
$postdata = $Pstmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['POSTBtn'])) {
//        var_dump($_POST);
    extract($_POST);
    $addQ = $db->prepare("insert into Posts (user_id, Title, Location, minAtt, maxAtt, Price,post, imgPost) values (?,?,?,?,?,?,?,?)");
    $addQ->execute([$id, $title, $location, $minAtt, $maxAtt, $price, $description, $imgURL]);

    $Pstmt = $db->prepare("select * from Posts");
    $Pstmt->execute();
    $postdata = $Pstmt->fetchAll(PDO::FETCH_ASSOC);
}

try{
    $pddo = new PDO("mysql:host=remotemysql.com;dbname=dqBmkgCDYi;charset=utf8mb4", "dqBmkgCDYi", "tXX4UQ2gs8");
    // Set the PDO error mode to exception
    $pddo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt search query execution
try{
    if(isset($_REQUEST["term"])){
        // create prepared statement
        
        $ssql = "SELECT * FROM userdetails WHERE fullname LIKE :term";
        
        $stmnt = $pddo->prepare($ssql);
        $term =  $_REQUEST["term"]. '%';
        // bind parameters to statement
        $stmnt->bindParam(":term", $term);
        // execute the prepared statement
        $stmnt->execute();
        if($stmnt->rowCount() > 0){
            while($row = $stmnt->fetch()){
                $iid = $row["id"];
                //isset($cid)?$cid=$userData['id']:$cid="";
                echo "<a href='dash.php?id=$iid'>" . $row["fullname"]."</a><br>";
            }
        } else{
            echo "<p>No matches found</p>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close statement
unset($stmnt);
 
// Close connection
unset($pddo);

if(isset($_POST["addF"])){
    $nstmt = $db->prepare("Insert into Notifications(nto, nfrom, decision) values (?,?, ?)");
    extract($_GET);
    $nstmt->execute([$id,$curid,"pending"]);
}
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title><?=$_SESSION['user']['fullname']?></title>
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
        <script src="../js/main.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <script src="../js/main.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        $inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if($inputVal.length){
            var aaa= String($inputVal);
            aaa +=":" + <?php echo $_SESSION["user"]["id"];?>;
            
            $.get("backend-search-pdo-format", {term: aaa}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
    </head>


    <body>
        <div class="wrapper">
            <header>
                <div class="container">
                    <div class="header-data">
                        <div class="logo">
                            <a href="dash.php?id=<?= $id ?>" title=""><img src="images/logo.png" alt=""></a>
                        </div><!--logo end-->
                        <div class="search-bar">
                            <form>
                                <div class="search-box">
                                    <input type="text" autocomplete="off" placeholder="Search user..."/>
                                    <div style="background-color: white;position: absolute; width: 81%; z-index: 3" class="result"></div>
                                    <button type="submit"><i class="la la-search"></i></button>
                                </div>
                             
                            </form>
                        </div><!--search-bar end-->
                        <nav>
                            <ul>
                                <li><a href="dash.php?id=<?=$_SESSION['user']['id']?>" title=""><span><img src="images/icon1.png" alt=""></span>Home</a></li>
<!--                                <li><a href="profiles.html" title=""> <span><img src="images/icon4.png" alt=""></span>People</a></li>
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
                                                </div>notification-info 
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/resources/ny-img2.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="messages.html" title="">Jassica William</a></h3>
                                                    <p>Lorem ipsum dolor sit amet.</p>
                                                    <span>2 min ago</span>
                                                </div>notification-info 
                                            </div>
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/resources/ny-img3.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="messages.html" title="">Jassica William</a></h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua.</p>
                                                    <span>2 min ago</span>
                                                </div>notification-info 
                                            </div>
                                            <div class="view-all-nots">
                                                <a href="messages.html" title="">View All Messsages</a>
                                            </div>
                                        </div>nott-list end
                                    </div>notification-box end
                                </li>-->
                                <li>
                                    <a href="#" title="" class="not-box-open">
                                        <span><img src="images/icon7.png" alt=""></span>
                                        Notification
                                    </a>
                                    <div class="notification-box">
                                        
                                        <div class="nott-list">
                                            <?php
                                            
                                            $s = $db->prepare("select * from Notifications where nto = ?");
                                            $s->execute([$_SESSION["user"]["id"]]);
                                            $u = $s->fetch(PDO::FETCH_ASSOC);
                                            
                                            if(isset($u))
                                            { 
                                                $f = $db->prepare("select * from userdetails where id = ?");
                                                $f->execute([$u["nfrom"]]);
                                                $wri = $f->fetch(PDO::FETCH_ASSOC);
                                            }
                                            
                                            
                                            isset($wri)?$dis=$wri['fullname']." sent you a friend request":$dis="No friend requests";
                                            
                                            ?>
                                            <div class="notfication-details">
<!--                                                <div class="noty-user-img">
                                                    <img src="images/resources/ny-img2.png" alt="">
                                                </div>-->
                                                
                                                <div class="notification-info">
                                                    <h3><?php echo '<a href="#" title="">'.$dis.'</a>';?></h3>
                                                    
                                                </div><!--notification-info -->
                                            </div>
<!--                                            <div class="view-all-nots">
                                                <a href="#" title="">View All Notification</a>
                                            </div>-->
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
<?php echo $_SESSION['user']['picture'] ?>
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
                                <h3 class="tc"><a href="logout.php" title="">Logout</a></h3>
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
                                                <?php 
                                                
                                                
                                                if(isset($curid)){
                                                
                                                $stm = $db->prepare("select * from userdetails where id = ?");
                                                $stmt->execute([$_SESSION['user']['id']]);
                                                $f = $stmt->fetchAll(PDO::FETCH_ASSOC);
//                                                var_dump($f);
                                                if(strpos($f[0]['Friends'], $id) == false)
                                                {       echo "<form method='post' action=''>";
                                                        echo "<button type='submit' name='addF' style='color:white; padding: 10px 10px 10px 10px; margin-bottom: 10px; border-radius: 8px; background-color: #e44d3a'>Add Friend</button>";
                                                        echo "</form>";
                                                        
                                                        $st = $f[0]['Friends'].",".$id;
                                                        
                                                        //$ns = $db=>prepare("Insert into Notifications(nto, nfrom) values (?,?)");
                                                        
                                                        
//                                                        $ns = $db->prepare("UPDATE userdetails SET Friends = ? WHERE id = ?");
//                                                        
//                                                        $ns->execute([$st, $_SESSION["user"]["id"]]);

                                                        
                                                }else {
                                                    echo "<button style='color:white; padding: 10px 10px 10px 10px; margin-bottom: 10px; border-radius: 8px; background-color: #e44d3a'>Friend Added</button>";
                                                }
                                                
                                                }
                                                
                                                $q1 = $db->prepare("select count(*) from Posts where user_id=?");
                                                $q1->execute([$userData['id']]);
                                                $numofEvents = $q1->fetch(PDO::FETCH_ASSOC);
                                                $q1 = $db->prepare("select Friends from userdetails where id=?");
                                                $q1->execute([$userData['id']]);
                                                $frands = $q1->fetch(PDO::FETCH_ASSOC);
                                                $numofFriends = sizeof(explode (",", $frands['Friends']));
                                                ?>
                                                <li>
                                                    <h4>Birthday</h4>
<?php echo "<span>" . $userData['bday'] . "</span>" ?>
                                                </li>
                                                <li>
                                                    <h4>Events</h4>
                                                    <span><?=$numofEvents['count(*)']?></span>
                                                </li>
                                                <li>
                                                    <h4>Followers</h4>
                                                    <span><?=$numofFriends?></span>
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

                                        <!--Wall-->
                                        <div class="posts-section">
                                            <?php
//                                            var_dump($userData);
                                            $friendsArr = explode (",", $userData['Friends']);
//                                            var_dump($friendsArr);
                                            if(isset($_GET['pg'])){
//                                                var_dump($_GET);
                                                extract($_GET);
                                                $size = $size + 10 >= sizeof($postdata) ? sizeof($postdata) : $size + 10;
                                                unset($_GET['pg']);
                                            }else{
                                                $size = 10 ;
                                            }
                                            for ($i = 0 ; $i < $size; $i++){
                                                 try {
                                                                $sql="select count(*) as total from Likes where postID= ?";
                                                                $stmt=$db->prepare($sql);
                                                                $stmt->execute([$postdata[$i]['post_id']]);
                                                                
                                                                $likeCount=$stmt->fetch(PDO::FETCH_ASSOC)['total'];
                                                            } catch (Exception $exc) {
                                                                echo "Sql error" .$exc->getMessage();
                                                            }
                                                
                                                
                                            if(in_array($postdata[$i]['user_id'], $friendsArr) or $postdata[$i]['user_id'] == $id){
                                            echo "<div class='posty'>";
                                                echo "<div class='post-bar'>";
                                                    echo "<div class='post_topbar'>";
                                                            echo "<div class='usy-dt'>";
                                                            $picQ = $db->prepare("select picture,fullname from userdetails where id = ?");
                                                            $picQ->execute([$postdata[$i]['user_id']]);
                                                            $user = $picQ->fetch(PDO::FETCH_ASSOC);
                                                            echo $user['picture'];

                                                            echo "<div class='usy-name'>";

                                                            echo "<h3>" . $user['fullname'] . "</h3>";
//                                                                    $time_ago = strtotime($postdata['timestp']);
//                                                                    $currtime = time();
//                                                                    $dif = $currtime - $time_ago;
//                                                                    $dated = $currtime - $postdata['timestp'];    
                                                            echo "<span>" . 2 . " min ago</span>";


                                                            echo "</div>
                                                              </div>
                                                           </div>";
                                                            echo " <div class='epi-sec'>";
                                                            echo "<ul class='descp'>
                                                                        <li><img src='images/icon8.png' alt=''><span>Status</span></li>";
                                                                  echo "<li><img src='images/icon9.png' alt=''><span>" . $postdata[$i]['Location'] . "</span></li>
                                                                   </ul>
                                                            </div>";
                                                            echo "<div class='job_descp'>
                                                                    <h3>" . $postdata[$i]['Title'] . "</h3>
                                                                    <ul class='job-dt'>
                                                                        <li><a href='#' title=''>"
                                                                            . $postdata[$i]['minAtt'] .
                                                                            " To  " .
                                                                            $postdata[$i]['maxAtt'] . "Participants</a></li>
                                                                        <li><span>" . $postdata[$i]['Price'] . " / hr</span></li>
                                                                    </ul>
                                                                    <p>" . $postdata[$i]['post'] . "</p>";
                                                                    if($postdata[$i]['imgPost'] != null){
                                                                        echo $postdata[$i]['imgPost']; 
                                                                    }
                                                                echo "</div>";
                                                            
                                                            
                                                                    echo "<div class='job-status-bar'>
                                                                    <ul class='like-com'>
                                                                        <li>
                                                                            <a href='likeprocess.php?id=$id&postId={$postdata[$i]['post_id']}'><i class='la la-heart'></i>Joi</a>
                                                                            <span>$likeCount</span>
                                                                        </li> 
                                                                        <li><a href='#' title='' class='com'><img src='images/com.png' alt=''> Comment 15</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>";
//                                                            
                                                                    
                                                            
                                                         echo "</div>";
                                            }
                                            }
                                                        ?>
                                                            <!--                                                <div class="comment-section">
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
                                                                                                                            </div>comment-list end
                                                                                                                            <ul>
                                                                                                                                <li>
                                                                                                                                    <div class="comment-list">
                                                                                                                                        <div class="bg-img">
                                                                                                                                            <img src="images/resources/bg-img2.png" alt="">
                                                                                                                                        </div>
                                                                                                                                        <div class="comment">
                                                                                                                                            <span><img src="images/clock.png" alt=""> 3 min ago</span>
                                                                                                                                            <p>Hi ABC </p>
                                                                                                                                            <a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>
                                                                                                                                        </div>
                                                                                                                                    </div>comment-list end
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
                                                                                                                            </div>comment-list end
                                                                                                                        </li>
                                                                                                                    </ul>
                                                                                                                </div>comment-sec end
                                                                                                                <div class="post-comment">
                                                                                                                    <div class="comment_box">
                                                                                                                        <form>
                                                                                                                            <input type="text" placeholder="Post a comment">
                                                                                                                            <button type="submit">Send</button>
                                                                                                                        </form>
                                                                                                                    </div>
                                                                                                                </div>post-comment end
                                                                                                            </div>comment-section end-->
                                                        

                                                        

                                                        <div class="process-comm">
                                                            <a href="dash.php?id=<?=$_SESSION['user']['id']?>&pg=u&size=<?=$size?>" title=""><img src="images/process-icon.png" alt=""></a>
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
                                        <form method="post" action="" >
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <input type="text" name="title" placeholder="Title">
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" name="location" placeholder="Location">
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
                                                
                                                <div>
                                                    <p style="font-weight: 500; padding-bottom: 10px;"> Upload Profile Picture : </p>
                                                    <input id="fileupload" type="file" name="fileupload" accept='image/*' onchange="encodeImageFileAsURL();"/>
                                                </div>
                                                <div>
                                                    <input type="hidden" name="imgURL" id="imgURL"/>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <ul>
                                                        <li><button class="active" type="submit" name="POSTBtn" value="post">Post</button></li>
                                                        <li><a href="#" title="">Cancel</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!--post-project-fields end-->
                                    <a href="#" title=""><i class="la la-times-circle-o"></i></a>
                                </div><!--post-project end-->
                            </div><!--post-project-popup end-->

<!--                            <div class="chatbox-list">
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
                                        </div>chat-list end
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
                                        </div>typing-msg end
                                    </div>chat-history end
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
                                        </div>chat-list end
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
                                        </div>typing-msg end
                                    </div>chat-history end
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
                                        </div>chat-list end
                                    </div>conversation-box end
                                </div>
                            </div>chatbox-list end-->

                        </div><!--theme-layout end-->



                        <script type="text/javascript" src="js/jquery.min.js"></script>
                        <script type="text/javascript" src="js/popper.js"></script>
                        <script type="text/javascript" src="js/bootstrap.min.js"></script>
                        <script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
                        <script type="text/javascript" src="lib/slick/slick.min.js"></script>
                        <script type="text/javascript" src="js/scrollbar.js"></script>
                        <script type="text/javascript" src="js/script.js"></script>
                        <script>
                            //Encode image to base64 string
                            function encodeImageFileAsURL() {
                                alert("Hi");
                                
                                var filesSelected = document.getElementById("fileupload").files;
                                if (filesSelected.length > 0) {
                                    var fileToLoad = filesSelected[0];

                                    var fileReader = new FileReader();

                                    fileReader.onload = function (fileLoadedEvent) {
                                        var srcData = fileLoadedEvent.target.result; // <--- data: base64
                                        //removeElement("outputimg");
                                        var newImage = document.createElement('img');
                                        newImage.src = srcData;
                                        alert("Kesa diya");
                                        console.log(newImage.outerHTML.toString());
                                
//                                        document.getElementById("output").innerHTML = newImage.outerHTML;

                                        //Store the value of encoded string in the hidden div object for sending it in the $_POST array
                                        document.getElementById("imgURL").value = newImage.outerHTML.toString();

                                        
                                        alert(srcData);
                                    }
                                    fileReader.readAsDataURL(fileToLoad);
                                }
                            }

                        </script>
                            

                        </body>

                        </html>
