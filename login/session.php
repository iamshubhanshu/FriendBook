<?php
   include('../include/db.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $sql="SELECT firstname from userdata1 where email = '".$user_check."' ";
   $ses_sql = mysqli_query($conn,$sql);
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   //$_SESSION["fname"] = $row["firstname"];
   
   if(!isset($_SESSION['login_user'])){//if login_user have not a value it will jump to the login page 
      header("location:../index.php");
      die();
   }
?>