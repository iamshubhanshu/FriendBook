<?php 
include '../login/session.php';
include '../include/db.php';
$id=$_SESSION["id"];
?>

<!--cover photo-->
<div class="coverphoto container" id="coverphoto" style="text-align:center;">

                    <?php
                    $sqlC="SELECT CoverPhoto from userimage where id='$id'";
                    $resultC=$conn->query($sqlC);
                        if($resultC->num_rows > 0){
                            while($rowC = $resultC->fetch_assoc()){
                                echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($rowC["CoverPhoto"]).'" id="cover_img" alt="Cover_pic" style="width:100%;height:300px;"/>';
                            }
                        
                         }
                        else{
                            echo '<img src="../img/img_avatar2.png" id="cover_img" alt="cover_pic" style="width:100%;height:300px;"/>';
                        }
                    ?>

                <!--profile picture-->
                <div class="profilepic container" id="profilepic" align="center" style="">
                    <?php
                    $sqlP="SELECT ProfilePhoto from userimage where id='$id'";
                    $resultP=$conn->query($sqlP);
                        if($resultP->num_rows > 0){
                            while($rowP = $resultP->fetch_assoc()){
                                echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($rowP["ProfilePhoto"]).'" id="profile_img" alt="profilepic" style="width:100%;height:100%;"/>';
                            }
                        
                         }
                        else{
                            echo '<img src="../img/img_avatar2.png" id="profile_img" alt="profilepic" style="width:100%;height:100%;"/>';
                        }
                    ?>
                </div>

                <!--Username-->
                <div class="username container" style=""><span><?php echo ucfirst($_SESSION["fname"]);?></span></div>
                <!--cover footer-->
                <div class="coverfooter" style="">

                <!--for desktop-->
                

                <!--for mobile-->
                    <!--Edit profile button-->
                   <!-- <div class="editbtn">
                        <button class="editprofilebtn" style="">&#9997;</button>
                    </div>-->

                    <div class="profile-menu">
                    
                        <a href="#" style="">Timeline</a>
                        <a href="#">About</a>
                        <a href="#">Friends</a>
                        <a href="#">Photos</a>
                       <!--more button-->
                    <div class="dropdown-desktop">
                    <a class="" style="">More <i class="material-icons" style="font-size:13px;font-weight:bold;">expand_more</i></a>
                    <div class="dropdown-menu-desktop">
                        
                            <a href="#" id="edit-profile-pic">Edit Profile Picture</a>
                            <a href="#" id="edit-cover-photo">Change cover photo</a>
                            <a href="#" id="">Videos</a>
                            <a href="#" id="">Music</a>
                            <a href="#" id="">Movies</a>
                            <a href="#" id="">TV shows</a>
                            <a href="#" id="">Blog</a>
                            <a href="#" id="">Books</a>
                            <a href="#" id="">Like</a>
                            <a href="#" id="">Events</a>
                            <a href="#" id="">Groups</a>
                            <a href="#" id="">Notes</a>
                        
                    </div>

                    </div>
                    </div>

                    
                </div>
            </div>

            <!--friend suggestion area-->
            <div class="profile_friend_suggestion" style="width:100%;height:auto;">
                    <div id="profile_frnd_load" class="center"></div>
            </div>

            <!--Intro and CreatePost-->
            <div class="p3" style="width:100%;">
                <!--Intro-->
                <div class="intro" style="width:50%;height:500px;box-shadow:2px 2px 4px gray;float:left;">
                        <div class="title-bar" style="width:100%;height:40px;box-shadow:1px 1px 4px gray;padding:8px;text-align:center;font-weight:bold;font-style:arial;font-size:large;"><span>Intro</span></div>
                </div>
                    
                    
                <!--Create post-->
                <div class="createpost" style="width:50%;height:250px;box-shadow:2px 2px 4px gray;float:left;">

                </div>
            </div>
                
            <script type="text/javascript" src="js/updateprofile.js"></script>
            <script type="text/javascript" src="js/profileContentLoad.js"></script>