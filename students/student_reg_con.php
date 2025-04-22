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
$sql="INSERT INTO `student_users` (names, email, passwords, lvl_admitted, dob, matric_no, course, faculty, gender, phoneNumber, image)
 VALUES
('$names', '$email', '$passwords', '$lvl_admitted', '$dob', '$matric_no', '$course', '$faculty', '$gender', '$phoneNumber', '$target_file')";
if($conn ->query($sql) == TRUE){
   // echo "Details Recorded Successfully";
}else{
    echo "Error: " .$sql."<br>".$conn->error;
}
$conn ->close();
?>
