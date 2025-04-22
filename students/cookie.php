<?php 
include ("student_log_con.php");
if (!isset($_COOKIE['student'])){
    header('location: student_login.php');
    exit;
}
$sql="SELECT * FROM `student_users` WHERE email LIKE '".$_COOKIE['student']."'";
$user = array();

if($conn->query($sql) == TRUE){
    $sql="SELECT * FROM `student_users` WHERE email LIKE '".$_COOKIE['student']."'";
        $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $user = $row; 
        }
    }else{
        header('location: student_login.php');
        exit;
    }
    
}else{
    echo "Error: " .$sql."<br>".$conn->error;
}
$conn->close();

?>