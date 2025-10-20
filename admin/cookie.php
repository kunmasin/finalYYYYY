<?php 
include ("adminLogConnect.php");
if (!isset($_COOKIE['admin_users'])){
    header('location: adminLogin.php');
    exit;
}
$sql="SELECT * FROM `admin_users` WHERE email LIKE '".$_COOKIE['admin_users']."'";
$user = array();

if($conn->query($sql) == TRUE){
    $sql="SELECT * FROM `admin_users` WHERE email LIKE '".$_COOKIE['admin_users']."'";
        $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $user = $row; 
        }
    }else{
        header('location: adminLogin.php');
        exit;
    }
    
}else{
    echo "Error: " .$sql."<br>".$conn->error;
}

?>