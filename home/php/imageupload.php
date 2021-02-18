<?php
include "../../include/db.php";
session_start();

$id = $_SESSION["id"];

if(isset($_POST["submit"])){
    $file = $_FILES["file"];

    $fileName = $_FILES["file"]["name"];
    $fileTmpName = $_FILES["file"]["tmp_name"];
    $fileType = $_FILES["file"]["type"];
    $fileError = $_FILES["file"]["error"];
    $fileSize = $_FILES["file"]["size"];


    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowedExt = array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowedExt)){
        if($fileError === 0){
            if($fileSize < 2000000){
        
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = "profileImage/".$fileNameNew;
                $imagecontent = addslashes(file_get_contents($fileTmpName));

                $sqlcheckstatus="SELECT pstatus from userimage where id='$id'";
                $resultCheck=$conn->query($sqlcheckstatus);

                if($resultCheck->num_rows > 0){
                    while($row = $resultCheck->fetch_assoc()){
                        $pstatus=$row["pstatus"];
                        $cstatus=$row["cstatus"];
                    }
                }
                if($pstatus == "t"){
                    $sqlUpdateProfile="UPDATE userimage SET ProfilePhoto = '$imagecontent' WHERE id='$id'";
                    $resultUpdate=$conn->query($sqlUpdateProfile);
                    if($resultUpdate === TRUE){

                        move_uploaded_file($fileTmpName,$fileDestination);
                        header("location:../home.php?upload_success");
                        }
                        else{
                             echo "error".$sqlUpdateProfile."<br>".$conn->error;
                        }
                }
                else{
                    $sql = "UPDATE userimage SET id = '$id',ProfilePath='$fileName',ProfilePhoto = '$imagecontent',pstatus = 't',cstatus = '$cstatus' where id='$id'";
                    $result = $conn->query($sql);

                    if($result === TRUE){

                        move_uploaded_file($fileTmpName,$fileDestination);
                        header("location:../home.php?upload_success");
                        }
                        else{
                             echo "error".$sql."<br>".$conn->error;
                        }
                }
                
                
                
            }
            else echo "you file is too big";
        }
        else{
            echo "There was an error to uploading you profile";
        }
    }
    else echo "you cannot upload this type of file";
}
?>
