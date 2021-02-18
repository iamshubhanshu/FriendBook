<?php
session_start();
function destroy(){ 
    session_destroy();
    //header('location:index.php');
   
    
}
//if destroy==true in add_account.php file then destroy() function called
if(isset($_GET["destroy"])){
    destroy();//destroy the session for add_account
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Friend BOOK</title>
        <link rel="stylesheet" href="index.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>-->
        <!--<script src="../js/jquery-3.5.1.js"></script>-->
        <!-- <script src="http://code.jquery.com/jquery-latest.js"></script>-->
    </head>

    <body>
        <div class="header">
            <header id="header"><span style="font-family:sans-serif;">Friend&nbsp;</span><span style="background:transparent;">BOOK</span></header>
        </div>
        
                <div class="maincontainer0">
                    <!--table1-->
                    <div class="maincontainer1">
                        
                            <div style="margin-bottom:10px;color:whitesmoke;font-family:sans-serif">
                                <span style="font-size:40px;">Recent Logins</span><br>
                                <span style="font-size:20px;">Click your picture or add an account</span>
                            </div>

                        <form id="select_account">
                            <!--user image-->
                            <div class="clickable_user">

                            </div>

                            <!--Add account-->
                            <div class="add_account" >
                                <button id="add_account" onclick='document.getElementById("add_new_account").style.display="block"';><i style="font-size:40px;">&plus;</i></button>
                                <div class="add_new_account" id="add_new_account">
                                    <div class="maincontainer3">
                                        <?php popup_login(); ?>
                                        <span class="close_modal" style="top:5px;right:5px;position:absolute;font-size:25px;cursor:pointer;" onclick="document.getElementById('add_new_account').style.display='none'">&bigotimes;</span>
                                    </div>
                                   
                                </div>
                            </div>
                        </form>
                    </div>
                
                    <!--table2-->
                    <div class="maincontainer2">
                  <?php
                    popup_login();
                    ?>    
                    
                        <?php 
                        
                        function popup_login(){

                        ?>
                        <div class="loginform container" id="loginform">
                            <!--Login form-->
                            <form action="" method="post">
                                <div class="imgcontainer">
                                    <img src="img/avator1.png" alt="Avatar" class="avatar">
                                </div>

                                <div class="container">
                                    <label>Email or phone : </label>
                                    <input type="email" name="cemail" id="cemail" placeholder="Email/Mobile No." required>
                            
                                    <label>Password : </label>
                                    <input type="password" name="cpass" id="cpass" placeholder="password" required>
                                </div>
                            
                            
                                <div class="container" style="font-size:15px;color:red;">
                                    <button type="submit" id="loginbtn">Login</button>
                                    <br>
                                    <span>Forgot<a href="#" style="text-decoration:none;"> password?</a>&nbsp;| </span>
                                    <span><a href="#" style="text-decoration:none;" id="crtnewacnt" class="cna">create new account</a>
                                    </span>                            
                                </div>
                           
                            </form>
                        
                        
                        </div><!--loginform end-->

                        <?php 
                        
                        }

                        ?>



                        <div class="signupform container" id="signupform">
                            <!--signUp form-->
                            <form action="" method="post" id="form2" name="form2"> 
                                <div class="imgcontainer">
                                    <b>SignUP</b><hr>
                                </div>
                                    
                                <div class="container"> 
                                    <div style="display:flex;">
                                        <input type="text" class="textbox" name="fname" id="fname" placeholder="firstname" style="width:50%;margin-right:2px;" required>
                    
                                        <input type="text" class="textbox" name="lname" id="lname" placeholder="lastname" style="width:50%;" required>
                                    </div>
                                    <input type="email" class="textbox" name="email" id="email" placeholder="Enter Email" required>
                    
                                    <input type="tel" class="textbox" pattern="[0-9]{10}" name="mobile" id="mobile" placeholder="Enter Phone number" required>
                    
                                    <input type="password" class="textbox" name="password" id="password" placeholder="Enter New Password" required>
                                    <div style="display:inline-block;">
                                        <label for="date" style="">Pick Date :</label>
                                        <input type="date" class="textbox" name="dob" id="dob" placeholder="dd/mm/yyyy" style="" required> 
                                    </div><br>
                    

                                    <label for="radio">Gender :</label>
                                    <input type="radio" name="gender" value="male" class="gender" required> Male
                                    <input type="radio" name="gender" value="female" class="gender" required> Female
                                    <input type="radio" name="gender" value="others" class="gender" required> other
                            
                             
                                </div>
                                <div class="container" style="display:inline-block;width:100%">
                                    <button type="submit" name="submit" id="signupbtn">SignUp</button>
                                    <a href="#" id="gotologin" style="text-decoration:none;">Already have an account? </a>
                                </div>
                            </form>
                        </div><!--signUpform end-->
                    </div>
                </div>
        <script type="text/javascript" src="index.js"></script>
    </body>

</html>