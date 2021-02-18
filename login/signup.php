<?php
session_start();
include '../include/db.php';


    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $mob = $_POST["mobile"];
    $pass = $_POST["password"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $status = "f";

    $sql = "INSERT into userdata1(firstname,lastname,email,mobile,upassword,gender,dob,ustatus) values('$fname','$lname','$email','$mob','$pass','$gender','$dob','$status')";
    
    if($conn->query($sql) === TRUE){

        $fetch_id="SELECT id from userdata1 where email='$email'";
        $result=$conn->query($fetch_id);

        if( $result > 0){
            while($row = $result->fetch_assoc()){
                $id=$row["id"];
            }
        }
        //create image data
        $sqlImg="INSERT into userimage(id,pstatus,cstatus) values('$id','f','f')";
        if($conn->query($sqlImg) === TRUE){
            echo "1";
        }else echo "error :".$sqlImg."<br>".$conn->error;
        
     }
     else echo "<script>alert('"."error".$sql."<br>".$conn->error."');</script>";

$conn->close();
?>