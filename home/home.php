<?php 
include '../login/session.php';
include '../include/db.php';
$id=$_SESSION["id"];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home123</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="../js/https _ajax.googleapis.com_ajax_libs_jquery_3.5.1_jquery.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <!--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-->
    <!--<script src="../js/jquery.min.js"></script>-->
    <!--<script src="../js/jquery-3.5.1.js"></script>-->
    <script src="../js/jquery.js"></script>
    <!--<script src="js/loadImg.js"></script>-->
    <!--<script src="../js/jquery.mobile.min.js"></script>-->
    <script src="../js/jquery-ui.min.js"></script>
    <!--<link href="../css/jquery.mobile.min.css" rel="stylesheet">-->
    <link href="../css/jquery-ui.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/message_block.css">
    <link rel="stylesheet" href="../css/fa.css">
    <style>
        #loader,#m_msgloader,#d_msgloader,#profile_loader,#home_frnd_load,#profile_frnd_load {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #444444;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
        
        .center {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }

        

    </style>
    <script>
        //for all ajax request
        $(document).ajaxSend(function(){
            $('#loader').fadeIn(250);
        });
        $(document).ajaxComplete(function(){
            $('#loader').fadeOut(250);
        });

        //for body page load only
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector(
                    "body").style.visibility = "hidden";
                document.querySelector(
                    "#loader").style.visibility = "visible";
            } else {
                document.querySelector(
                    "#loader").style.display = "none";
                document.querySelector(
                    "body").style.visibility = "visible";
            }
        };
    </script>

</head>

<body>
    <div id="loader" class="center"></div>
    <!--top nav-->
    <div class = "topnav container">
        <span>Friend<font style="font-family:cursive;">BOOK</font></span>
        <div class="d_search">
                <input type="search" id="search" name="search" placeholder="search...">
                <div class="d_search_result_block"><ul class="d_search_result"></ul></div>
        </div>
                
        <div class="clear"></div>
    </div>


    <div class="all-container container" style="width:100%;">

    <!--Menu Bar-->
    <div class="menubar container" id="menubar">
        <div id="menuicon"><i class="material-icons">menu</i></div>
        <div><i class="material-icons">people</i></div>
        <div id="menu-messenger"><i class="material-icons">message</i></div>
        <div><i class="material-icons">notifications</i></div>
        <div class="dropdown_search"><i class="material-icons">search</i></div>
    </div>

    <!--side nav-->
    <div class="sidenav container" id="sidenav"> 
        <div id="dp">
        <?php
                    $sqlP="SELECT ProfilePhoto from userimage where id='$id'";
                    $resultP=$conn->query($sqlP);
                        if($resultP->num_rows > 0){
                            while($rowP = $resultP->fetch_assoc()){
                                echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($rowP["ProfilePhoto"]).'" id="profile_img" alt="dp" style="border-radius:30px;width:30px;height:30px;cursor:pointer;"/>';
                            }
                        
                         }
                        else{
                            echo '<img src="../img/img_avatar2.png" id="profile_img" alt="profilepic" style="width:100%;height:100%;"/>';
                        }
                    ?>  
    </div>
        <div class="sidebtn1"><!--<div class="side-btn-content1">--><a href="home.php"><i class="material-icons">home</i></a><!--</div>--></div>
        <div class="sidebtn2"><!--<div class="side-btn-content2">--><a href="#"><i class="material-icons">people</i></a><!--</div>--></div>
        <div class="sidebtn3"><i class="material-icons">message</i></div>
        <div class="sidebtn4"><!--<div class="side-btn-content4">--><a href="#"><i class="material-icons">notifications</i></a><!--</div>--></div>
        <div class="sidebtn5"><!--<div class="side-btn-content5">--><a href="#"><i class="material-icons">search</i></a><!--</div>--></div>
        <div class="sidebtn6"><a href="../login/logout.php"><i class="material-icons">logout</i></a></div>
    </div>

    <!--Main container-->
    <div class="maincontainer container" id="maincontainer" area-hidden="true">

    <!--Search bar in mobile-->
    <div class="dropdown_search_content">
        <input type="search" placeholder="search..." id="m_search"/>
        <ul class="m_search_result"></ul>
    </div>

    <!--upload profile image-->
    <div class="upload-profile">
                    <div style="width:100%;height:10%;box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.2);text-align:center;font-weight:bold;padding:4px;">
                            <label>Update Profile</label>
                            <label id="close-upload-modal1"><i class="material-icons">close</i></label>
                    </div>

                    <div style="width:100%;height:90%;">
                    <!--upload profile image form start-->
                        <form action="php/imageupload.php" method="post" enctype="multipart/form-data" style="width:100%;height:100%;position:relative;">
                    
                        <div class="modal-block1">
                                <div id="demoprofile" style="display:flex;justify-content:center;">
                                    <img src="" id="img" name="img" width="150" height="180" style="display:none;"/>
                                </div>
                                <input type="file" name="file" id="file">
                        </div>  

                            <div class="modal-block2">
                                <div class="upload-btn">
                                   <!-- <button type="submit" name="preview" id="preview">Preview</button><br>-->
                                    <button type="submit" name="submit" id="upload-profile-image">Upload</button><br>
                                    <span>&nbsp;(max-size : 2MB)</span>
                                </div>
                            </div>
                            
                        </form>
                        <!--upload profile image form end-->
                    </div>
    </div>

    <!--upload cover photo-->
    <div class="upload-cover">
                    <div style="width:100%;height:10%;box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.2);text-align:center;font-weight:bold;padding:4px;">
                            <label>Update Cover Photo</label>
                            <label id="close-upload-modal2"><i class="material-icons">close</i></label>
                    </div>

                    <div style="width:100%;height:90%;">
                    <!--upload cover photo form start-->
                        <form action="php/coverupdate.php" method="post" enctype="multipart/form-data" style="width:100%;height:100%;position:relative;">
                    
                        <div class="modal-block3">
                                <div id="democover">
                                <img src="" id="cover-img" name="cover-img" width="100%" height="120x" style="display:none;"/>
                                </div>
                        </div>  

                            <div class="modal-block4">
                                <div class="upload-btn">
    
                                    <input type="file" name="cover-file" id="cover-file"><span>&nbsp;(max-size : 2MB)</span>
                                    <!--<button type="submit" name="preview" id="cvr-preview">Preview</button><br>-->
                                    <button type="submit" name="submit" id="upload-cover-image">Upload</button>
                                </div>
                            </div>
                            
                        </form>
                        <!--upload cover photo form end-->
                    </div>
    </div>
        

        <!--HomePage-->
        <div class="homepage container" id="homepage">
            <!--home side menu-->
            <div class="home_sidemenu">
                
                    <div id="" style="font-size:14px;font-weight:bold;">
                        <?php
                            $sqlP="SELECT ProfilePhoto from userimage where id='$id'";
                            $resultP=$conn->query($sqlP);
                                if($resultP->num_rows > 0){
                                    while($rowP = $resultP->fetch_assoc()){
                                    echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($rowP["ProfilePhoto"]).'" id="profile_img" alt="dp" style="border-radius:30px;width:30px;height:30px;cursor:pointer;margin-left:5px;"/>';
                                }
                        
                                }
                                else{
                                echo '<img src="../img/img_avatar2.png" id="profile_img" alt="profilepic" style="width:100%;height:100%;"/>';
                                }
                                echo "<span style='color:black;margin-left:5px;position:absolute;padding:8px;'>".ucfirst($_SESSION["fname"])."&nbsp;".ucfirst($_SESSION["lname"])."</span>";
                        ?>  
                    
                    </div>
                <hr>
                    <div><i class="material-icons">timeline</i><a href="#" id="">Newsfeed</a></div>
                    <div><i class="material-icons">messenger</i><a href="#" id="">Messenger</a></div>
                    <div style="color:black;text-align:center;font-size:13px;font-weight:bold;padding:8px;"><label>Explore</label></div><hr>
                    <div><i class="material-icons">world</i><a href="#" id="">World</a></div>
                    <div><i class="material-icons">events</i><a href="#" id="">Events</a></div>
                    <div><i class="material-icons">groups</i><a href="#" id="">Groups</a></div>
                    <div><i class="material-icons">blog</i><a href="#" id="">Blog</a></div>
                    <div><i class="material-icons">services</i><a href="#" id="">Social services</a></div>
                    <div><i class="material-icons">donate</i><a href="#" id="">Donate</a></div>
                    <div><i class="material-icons">saved</i><a href="#" id="">Saved</a></div>
                    <div><i class="material-icons">discount</i><a href="#" id="">Offers</a></div>
                    <div><i class="material-icons"></i><a href="#" id="">Weather</a></div>
                    <div><i class="material-icons">people</i><a href="#" id="">Find friends</a></div>
                    <div><i class="material-icons">memories</i><a href="#" id="">Memories</a></div>
                
            </div><!--home side menu close-->
            <!--home maincontainer-->
            <div class="home_main_container">
                
                <div class="create_post">
                    <!--Post form start-->
                    <form action="" method="post" enctype="multipart/form-data" style="width:inherit;height:100%;">
                        <!--create post header-->
                        <div class="cp_header">
                                <div class="cp_header_title">
                                    <label>Create Post</label>
                                    <i class="material-icons" id="close_cp" style="display:none;float:right;cursor:pointer;">close</i>
                                </div>
                        </div>
                        <!--create post text area-->
                        <div class="cp_textarea">
                                <div class="textarea"><textarea placeholder="write something here..."></textarea></div>
                        </div>
                        <!--create post footer-->
                        <div class="cp-footer">
                                <div class="cp_footer_button">
                                    <!--photo/video button-->
                                    <div class="custom_input_file">
                                        <input type="file">
                                        <button><i class="material-icons"  style="padding:5px;font-size:13px;">add_a_photo</i>Photo/video</button>
                                       <!-- <input type="button" value="Photo/video">-->
                                    </div>
                                    <!--<button><i class="material-icons" style="padding:5px;font-size:13px;">person</i>Tag friends</button>-->
                                    <button><i class="material-icons" style="padding:5px;font-size:13px;">mood</i>Feeling/Activity</button>
                                    <button style="width:40px;">...</button>
                                </div>
                                <button type="submit" class="post_btn">post</button><!--submit post btn>-->
                        </div><!--cp footer close-->
                    </form><!--post form close-->
                </div><!--create post close--> 

                    <!--friend suggestion area-->
                    <div class="home_friend_suggestion" style="width:100%;height:280px;">
                        <div id="home_frnd_load" class="center"></div>
                    </div>
            </div><!--home main container close-->

            <!--home right container-->
            <div class="home_right_container">
            <div></div>
                
            </div>
        </div><!--homepage close-->


        <!--profile-->
        <div class="profilecontainer container" id="profile"> 
                <div id="profile_loader" class="center"></div>
        </div>

        <!--Desktop_Messenger-->
        <div class="messenger" id="messenger" style="display:none;"> 
            <div class="message_block">
                <div class="triangle"></div>
                <div class="call_msg_dsktp" style="width:100%;height:100%;">
                <div id="d_msgloader" class="center"></div><!--loader icon-->
                </div> 
            </div>

        </div>

        <!--Mobile_Messenger-->
        <div class="menu_msg" style="display:none;">
            <div class="menu_message_block">
                <div class="menu_msg_block_triangle"></div>
                <div class="call_msg_mob" style="width:100%;height:100%;">
                <div id="m_msgloader" class="center"></div><!--Loader icon-->
                </div> 
            </div>
        </div>

        <!--Groups-->
        <div class="profile" id="profile"> 
            
        </div>

        <!--Friend list-->
        <div class="profile" id="profile"> 
            
        </div>

        </div>
    </div>

    <!--chat Box with icon-->
            <img src="../icons/chat-dots.svg" id="chaticon"/>
            
            <div class="msgbox container" id="msgbox">
                <!--MessageBox header-->
                <div class="msgheader container">
                    <span>Message</span>
                    <span id="msgboxclose" style="float:right;">&times;</span>
                </div>

                <!--Message Area-->
                <div class="msg-area container" id="msgarea">
                <?php
                    $sql1="SELECT firstname,lastname,ustatus from userdata1";
                    $result=$conn->query($sql1);
                    if($result->num_rows > 0){
                    
                        echo "<div>"; 
                            echo "<table>";
                                while($row = $result->fetch_assoc()){
                                    echo "<tr style='padding:13px;height:30px;font-size:12px;'>";
                                        echo "<td id='frnd-name'>".ucfirst($row["firstname"])."&nbsp;".ucfirst($row["lastname"])."</td>";
                                        if($row["ustatus"] == "t")
                                        echo "<td style='color:#4caf50;font-weight:bold;text-align:right;'>online</td>";
                                        else 
                                        echo "<td style='color:gray;text-align:right;'>offline</td>";
                                    echo "</tr>";
                                }
                            echo "</table>";
                        echo "</div>";
                }
            ?>
                </div>
                <!--Message footer-->
                <div class="msgfooter container">
                    <form action="" method="post" id="sendmsgform">
                        <div id="button-in container" style="position:relative;">
                            <input type="text" name="input-msg" id="input-msg" placeholder="Type a message...">
                            <button type="submit" id="sendmsgbtn"><i class="material-icons">send</i></button>
                        </div>
                    </form>
                </div>
            </div>
    </div><!--Main container div close-->

<script type="text/javascript" src="js/home.js"></script>
<script type="text/javascript" src="js/loadPage.js"></script>
<script type="text/javascript" src="js/homepage.js"></script>
<script type="text/javascript" src="js/search.js"></script>
</body>

</html>