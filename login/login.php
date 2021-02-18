
<?php
include('../include/db.php');
session_start();


if($_SERVER["REQUEST_METHOD"]=="POST"){
     $email = mysqli_real_escape_string($conn,$_POST['email']);//this function removes special characters
    $password = mysqli_real_escape_string($conn,$_POST["password"]);

$sql="SELECT id,firstname,ustatus from `userdata1` where email='".$email."' and `upassword`='".$password."' ";

$result=mysqli_query($conn,$sql);
//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//$active=$row['active'];
$count=mysqli_num_rows($result);

while($row = $result->fetch_assoc()){//fetch data from result and sort it in array
    $fname = $row["firstname"];
    $status = $row["ustatus"];
    $id = $row["id"];
    $lname = $row["lastname"];

    $sqlImg = "SELECT * From userimage where id='$id'";
    $resultImg = mysqli_query($conn,$sqlImg);

    while($rowImg = $resultImg->fetch_assoc()){
        $pstatus = $rowImg["pstatus"];
        $cstatus = $rowImg["cstatus"];
        $userimg = $rowImg["ProfilePhoto"];
    }
}
	
	if($count==1){//if login data matched table row will be one
        
        echo json_encode(array("success"=>"1","uname"=>$fname));//send data to javascript
        //create session
        $_SESSION["fname"]=$fname;
        $_SESSION["lname"]=$lname;
        $_SESSION["login_user"]=$email;
        $_SESSION["id"]=$id;
        $_SESSION["pstatus"]=$pstatus;//profle photo status
        $_SESSION["cstatus"]=$cstatus;//cover photo status
        $_SESSION["userimg"]=$userimg;
        if($status == "f"){
            $query="UPDATE userdata1 SET ustatus='t' where id='".$id."'";
            mysqli_query($conn,$query);
        }
        //header('location:../home/home.php');
}
else echo json_encode("Invalid_password");
}
?>