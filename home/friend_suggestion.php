<?php 
include '../login/session.php';
include '../include/db.php';
$id=$_SESSION["id"];
?>

<!--friend suggestion-->
<div style="width:100%;height:20px;box-shadow:0px 1px 2px gray;padding:2px;font-size:12px;font-weight:bold;border-radius:2px;"><span>Friend Suggestion</span>
                <i class="material-icons" id="frnd-sgtn-expand_less" style="float:right;font-size:20px;">expand_less</i>
                <i class="material-icons" id="frnd-sgtn-expand_more" style="float:right;font-size:20px;">expand_more</i>
                <i class="material-icons close" style="float:right;font-size:20px;display:none;">close</i>
            </div>
            <div class="frndsuggestion container" style="width:100%;height:250px;box-shadow:2px 2px 4px rgba(0,0,0,0.4);margin-bottom:15px;color:#111;">
            
                <div style="width:100%;height:100%;overflow:auto;display:flex;"> 
                <?php
                    $sql="SELECT id,firstname,lastname from userdata1";
                    $result = mysqli_query($conn,$sql);
                    if($result->num_rows > 0 ){
                        while($row = $result->fetch_assoc()){
                            $imageid = $row["id"];
                            echo "<div style='width:100%;height:height:90%;box-shadow:1px 1px 10px rgba(0,0,0,0.4),-1px -1px 3px rgba(0,0,0,0.4);float:left;padding:5px;margin:3px;border-radius:4px;'>";
                                echo "<div class='frnd-img' style='width:180px;height:70%;border-radius:4px; box-shadow: 1px 1px 2px 0px rgba(0, 0, 0, 0.4);text-align:center;'>";
                                
                                $sqlP="SELECT ProfilePhoto from userimage where id='$imageid'";
                                $resultP=$conn->query($sqlP);
                                if($resultP->num_rows > 0){
                                    while($rowP = $resultP->fetch_assoc()){
                                        if($rowP["ProfilePhoto"] != NULL)
                                        echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($rowP["ProfilePhoto"]).'" id="profile_img" alt="frnd-img" style="max-width:100%;max-height:100%;"/>';
                                        else echo '<img src="../img/default-avatar.png" id="profile_img" alt="profilepic" style="width:100%;height:100%;"/>';
                                    }
                                
                                 }
                                else{
                                    echo '<img src="../img/default-avatar.png" id="profile_img" alt="profilepic" style="width:100%;height:100%;"/>';
                                }
                
                                echo "</div>";

                                echo "<div style='position:relative;width:100%;height:30%;margin-top:2px;'>";
                                    echo "<span style='position:absolute;height:50%;font-size:12px;font-weight:bold;padding:4px;'>".ucfirst($row["firstname"])."&nbsp;".ucfirst($row["lastname"])."</span>";
                                    echo "<button type='submit' class='add-frnd-btn' style='position:absolute;width:95%;margin:2%;bottom:0px;border:1px solid #111;color:#111;border-radius:4px;box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.4);padding:5px;'><i class='material-icons' style='font-size:15px;'>person_add</i><span style='font-size:15px;'>&nbsp;Add friend</span></button>";
                                echo "</div>";
                            echo "</div>";
                        }
                    }
                ?>
                </div>
            </div>

            <script type="type/javascript" src="js/frnd_sgtn.js"></script>