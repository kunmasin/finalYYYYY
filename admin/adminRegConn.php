<?php
$servername= "localhost";
$username="root";
$password="";
$dbname="student_discipline";
//create connection
$conn= mysqli_connect($servername,$username,$password,$dbname);
//check connection
if(!$conn){
    die("Connection Failed: " .mysqli_connect_error());
}
//echo "Connected Successfully ";
$sql="INSERT INTO `admin_users` (fullname, usernames, passwords,  email, phone_number, gender, position, address,image) VALUES ('$fullname', '$usernames', '$passwords', '$email', '$phone_number', '$gender', '$position', '$address', '$target_file')";
if($conn ->query($sql) == TRUE){
   // echo "Details Recorded Successfully";
}else{
    echo "Error: " .$sql."<br>".$conn->error;
}
$conn ->close();
?>
