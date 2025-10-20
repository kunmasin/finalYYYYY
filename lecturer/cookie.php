<?php 
include ("lecturerLogConnect.php");
if (!isset($_COOKIE['lecturer_users'])){
    header('location: lecturerLogin.php');
    exit;
}
$sql="SELECT * FROM `lecturer_users` WHERE email LIKE '".$_COOKIE['lecturer_users']."'";
$user = array();

if($conn->query($sql) == TRUE){
    $sql="SELECT * FROM `lecturer_users` WHERE email LIKE '".$_COOKIE['lecturer_users']."'";
        $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $user = $row; 
        }
    }else{
        header('location: lecturerLogin.php');
        exit;
    }
    
}else{
    echo "Error: " .$sql."<br>".$conn->error;
}

?>