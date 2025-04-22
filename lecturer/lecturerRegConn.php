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
$sql="INSERT INTO `lecturer_users` (lecturer_name,  passwords,  email, phone_number, gender, office, address, image) VALUES ('$lecturer_name', '$passwords', '$email', '$phone_number', '$gender', '$office', '$address', '$target_file')";
if($conn ->query($sql) == TRUE){
   // echo "Details Recorded Successfully";
}else{
    echo "Error: " .$sql."<br>".$conn->error;
}
$conn ->close();
?>
