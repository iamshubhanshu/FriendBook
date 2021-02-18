<?php
session_start();


if(isset($_SESSION["name"])){
    $fname = $_SESSION["name"];
                echo '      <div class="user" onclick='.'document.getElementById("open_account_on_click").style.display="block"'.'>

                                <div class="user-img">
                                    <img src="data:image/jpg;charset=utf8;base64,'.base64_encode($_SESSION["img"]).'" alt="dp" style="border-top-left-radius:10px;border-top-right-radius:10px;width:inherit;height:100%;cursor:pointer;"/>
                                </div>

                                <div class="user-name">
                                    <span><b>'.$fname.'</b></span>
                                </div>

                                <span style="top:-10px;right:-10px;font-size:20px;position:absolute;z-index:10;color:red;text-decoration:none;" id="destroy"><a href="index.php?destroy=true">&bigotimes;</a></span>
                            </div>
                                <div class="open_account_on_click" id="open_account_on_click">
                                    <div class="" style="position:relative;width:450px;height:300px;margin:auto;margin-top:10%;background-color:whitesmoke;align-items:center;">
                                
                                        <div class="" style="width:100px;height:100px;border-radius:50px;">
                                            <img src="data:image/jpg;charset=utf8;base64,'.base64_encode($_SESSION["img"]).'" alt="dp" style="border-radius:50%;width:100px;height:100px;cursor:pointer;"/>
                                        </div>

                                        <div class="">
                                            <span><b>'.$fname.'</b></span>
                                        </div>
                                        <div>
                                            <input type="password" name="pass" id="pass" placeholder="Enter your Password" required>
                                            <span style="top:10px;right:10px;font-size:20px;position:absolute;cursor:pointer;" onclick='.'document.getElementById("open_account_on_click").style.display="none"'.'>&bigotimes;</a></span>
                                        </div>
                                    </div>
                                </div>';
                            
}


?>