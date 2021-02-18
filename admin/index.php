
<!DOCTYPE html>
<html>

<head>
    <title>
        Admin Dashboard
    </title>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <script src="../js/https _ajax.googleapis.com_ajax_libs_jquery_3.5.1_jquery.min.js"></script>
    <link href="css/admin.css" rel="stylesheet" type="text/css">
    <style>

    </style>

</head>

<body>
    <!--header-->
    <div class="header" id="header">
        <span>Admin Dashboard</span>
        <span style="float:right;"><img src="../icons/emoji-sunglasses.svg"/>&nbsp;<?php echo $_SESSION["fname"];?></span>
    </div>

    <!--container-->
    <div class="maincontainer">
        <!--sidenav-->
        <div class="sidenav">
            <a href="#" id="admin">Manage Admin</a>
            <a href="#" id="user">Manage User</a>
            <a href="#" >User</a>
            <a href="#">Logout</a>
        </div>

        <!--Database Container-->
        <div class="dbcontainer">
            <!--Manage User-->
            <div class="manageuser" id="manageuser">
        <?php
            session_start();
            include '../include/db.php';

            $sql = "SELECT * from userdata1";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            if($result->num_rows > 0){
            echo "<table>";
                echo "<tr>";
                
                        echo "<th>ID</th>";
                        echo "<th>First Name</th>";
                        echo "<th>Last Name</th>";
                        echo "<th>Email</th>";
                        echo "<th>Mobile</th>";
                        echo "<th>Password</th>";
                        echo "<th>Gender</th>";
                        echo "<th>DOB</th>";
                    
                echo "</tr>";
                    while($row = $result->fetch_assoc()){//or mysqli_fetch_array()
                        echo "<tr>";
                            echo "<td>".$row["id"]."</td>";
                            echo "<td>".$row["firstname"]."</td>";
                            echo "<td>".$row["lastname"]."</td>";
                            echo "<td>".$row["email"]."</td>";
                            echo "<td>".$row["mobile"]."</td>";
                            echo "<td>".$row["upassword"]."</td>";
                            echo "<td>".$row["gender"]."</td>";
                            echo "<td>".$row["dob"]."</td>";
                        echo "</tr>";
                            
                        }
            echo "</table>";
            mysqli_free_result($result);
}
else echo "No data in database";
?>
</div>

            <!--Manage Admin-->
            <div class="manageadmin">
                <p>admin</p>
            </div>
        
        </div>
    </div>
    <script type="text/javascript" src="js/admin.js"></script>
</body>

</html>