<?php
include '../../include/db.php';

$type = $_POST["type"];
//search result
if($type == 1){

    $searchTxt = $_POST["search"];
    $sql = "SELECT id,firstname,lastname from userdata1 where firstname like '%".$searchTxt."%' order by firstname asc limit 5";
    $result = $conn->query($sql);

    $search_arr = array();

    while($row = mysqli_fetch_assoc($result)){

        $id = $row["id"];
        $fname = $row["firstname"];
        $lname = $row["lastname"];

        $search_arr[] = array("id" => $id,"fname" => $fname,"lname" => $lname);
    }
    echo json_encode($search_arr);

}

//get user data after click on search result

if($type == 2){

    $userid = $_POST["id"];
    $sql = "SELECT * from userdata1";
    $result = $conn->query($sql);

    $return_arr = array();

    while($row = $result->fetch_assoc()){
        $id = $row["id"];
        $fname = $row["firstname"];
        $lname = $row["lastname"];
        $email = $row["email"];
        $mobile = $row["mobile"];
        $gender = $row["gender"];

        $return_arr[] = array("id" => $id, "fname"=>$fname,"lname"=>$lname,"email"=>$email,"mobile"=>$mobile,"gender"=>$gender);
    }
    
    echo json_encode($return_arr);

}
?>