<?php 
include 'db.php';
session_start();
$user = $_SESSION['login_user'];
$ses = $conn->query("SELECT email FROM userdata1 WHERE email = '$user'");
$row = $ses->fetch_assoc();
$login_session = $row['username'];

if(!isset($_SESSION['login_user'])){
    header('location: ../index.php');
    die();
}
?>