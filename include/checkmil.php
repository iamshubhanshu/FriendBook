
<?php
include("db.php");

$sql = "SELECT email FROM userdata1 WHERE email = " .$_POST['email'];
$select = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($select);

if (mysqli_num_rows > 0) {
    echo "0";
}else echo '1';
?>

