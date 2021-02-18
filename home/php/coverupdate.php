<?php
include "../../include/db.php";
session_start();

$id = $_SESSION["id"];

if(isset($_POST["submit"])){
    $file = $_FILES["cover-file"];

    $fileName = $_FILES["cover-file"]["name"];
    $fileTmpName = $_FILES["cover-file"]["tmp_name"];
    $fileType = $_FILES["cover-file"]["type"];
    $fileError = $_FILES["cover-file"]["error"];
    $fileSize = $_FILES["cover-file"]["size"];


    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowedExt = array('jpg','jpeg','png');

    if(in_array($fileActualExt,$allowedExt)){
        if($fileError === 0){
            if($fileSize < 2000000){
        
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = "cover/".$fileNameNew;
                $imagecontent = addslashes(file_get_contents($fileTmpName));

                $sqlcheckstatus="SELECT pstatus,cstatus from userimage where id='$id'";
                $resultCheck=$conn->query($sqlcheckstatus);

                if($resultCheck->num_rows > 0){
                    while($row = $resultCheck->fetch_assoc()){
                        $cstatus=$row["cstatus"];
                        $pstatus=$row["pstatus"];
                    }
                }
                if($cstatus == "t"){
                    $sqlUpdateCover="UPDATE userimage SET CoverPhoto = '$imagecontent' WHERE id='$id'";
                    $resultUpdate=$conn->query($sqlUpdateCover);
                    if($resultUpdate === TRUE){

                        move_uploaded_file($fileTmpName,$fileDestination);
                        header("location:../home.php?upload_success");
                        }
                        else{
                             echo "error".$sqlUpdateProfile."<br>".$conn->error;
                        }
                }
                else{
                    $sql = "UPDATE userimage SET id = '$id',pstatus = '$pstatus',CoverPath='$fileName',CoverPhoto = '$imagecontent',cstatus = 't' where id='$id'";
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
            echo "Error: ".$fileError;
        }
    }
    else echo "you cannot upload this type of file";
}
?>
