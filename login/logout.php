<?php
include '../include/db.php';
session_start();

$id=$_SESSION["id"];
$uname=$_SESSION["fname"];
$uimage=$_SESSION["userimg"];
$sql="UPDATE userdata1 SET ustatus='f' WHERE id='".$id."'";
$result=$conn->query($sql);

if(session_destroy()){
    session_start();
    $_SESSION["name"]=$uname;
    $_SESSION["img"]=$uimage;
    $url = "../index.php";
    header("location:$url");

}

?>