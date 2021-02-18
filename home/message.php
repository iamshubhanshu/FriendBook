<?php 
include '../login/session.php';
include '../include/db.php';
$id=$_SESSION["id"];

?>

                <div class="menu_msg_container">
                    <!--menu msg header-->
                    <div class="menu_msg_header">

                    </div>
                    <!--menu msg area-->
                    <div class="menu_msg_area">
                        <?php
                            echo "<table style='width:100%;'>";
                            $sqlmsg="SELECT id,firstname,lastname from userdata1";
                            $resultmsg=$conn->query($sqlmsg);
                            
                            if($resultmsg->num_rows > 0){
                                while($rowmsg = $resultmsg->fetch_assoc()){
                                    
                                    echo "<tr style='box-shadow:0px 1px 2px 0px rgba(0,0,0,0.2);width:100%;height:42px;'>";
                                        echo "<td>";
                                        $sqlimg ="SELECT ProfilePhoto from userimage where id = '".$rowmsg["id"]."'";
                                        $resultimg = $conn->query($sqlimg);
                                        if($resultimg->num_rows > 0){
                                            while($rowimg = $resultimg->fetch_assoc()){
                                                echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($rowimg["ProfilePhoto"]).'" id="profile_img" alt="dp" style="border-radius:30px;width:40px;height:40px;cursor:pointer;margin:5px;"/>';
                                            }
                                        }

                                        echo "</td>";

                                        echo "<td>";
                                            echo "<span>".$rowmsg["firstname"]." ".$rowmsg["lastname"]."</span>";
                                        echo "</td>";
                                    echo "</tr>";

                                    
                                }
                            }
                            else echo "you have no friends";
                            echo "</table>";
 
                        ?>
                    </div>
                    <!--menu msg footer-->
                    <div class="menu_msg_footer">

                    </div>
                </div>
            
            

                <script type="text/javascript">

                </script>