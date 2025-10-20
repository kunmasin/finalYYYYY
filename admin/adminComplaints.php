<?php 
include ("adminLogConnect.php");
if (!isset($_COOKIE['admin_users'])){
    header('location: ./logins.php');
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
        header('location: ./logins.php');
        exit;
    }
    
}else{
    echo "Error: " .$sql."<br>".$conn->error;
}
$conn->close();

?>
<?php
include ("adminLogConnect.php"); // Create adminLogConnect.php
// Ensure only admins can access this page

$sql = "SELECT * FROM complaints";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="c:\Users\HP\Documents\PROJECTS_AT_PLAT\fontawesome-free-6.4.2-web">
	    <link rel="stylesheet" href="c:\Users\HP\Documents\PROJECTS_AT_PLAT\bootstrap-icons-1.11.1">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="..\style.css">
	    <script src="c:\Users\HP\Documents\PROJECTS_AT_PLAT\fontawesome-free-6.4.2-web\js\all.js"></script>
        <script src="https://kit.fontawesome.com/c5355fa9b1.js" crossorigin="anonymous"></script>   
        <title>Dashboard</title>
        <style>
            button{
                border-radius: 10px;
                color: white;
            }
            .text-black{
                color: black;
            }
            .text-white{
                color: white;
            }
        </style>
</head>
<body>
     <!-- Toggle button -->
     <?php include ("admin_sidebar.php"); ?>
     
            <div class="content">
    <div class="container text-center">
        <h1>Admin Complaints</h1>
        <table class="table table-striped text-left">
            <thead>
                <tr>
                    <th>List Number</th>
                    <th>Complaint ID</th>
                    <th>Lecturer Reporting</th>
                    <th>Student Name </th>
                    <th>Offence</th>
                    <th>Details of offence</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Make Judgement</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sn = 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $sn++ . "</td>";
                        echo "<td>" . $row['complaint_id'] . "</td>";
                        echo "<td>" . $row['lecturer_name'] . "</td>";
                        echo "<td>" . $row['student_name'] . "</td>";
                        echo "<td>" . $row['student_offence'] . "</td>";
                        echo "<td>" . $row['complaint_details'] . "</td>";
                        echo "<td>" . $row['complaint_date'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td><button class=' btn btn-primary text-white d-flex'><a href='verify_complaint.php?id=" . $row['complaint_id'] . "' class='text-white'>Verify</a> /<b class='invisible'>space</b> <a href='reject_complaint.php?id=" . $row['complaint_id'] . "' class='text-white'>Reject</a></button></td>";
                        echo "<td><button class='btn btn-danger text-white'><a class='text-white' href='adminJudgement.php'>Make Judgement</a></button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No complaints found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
            </div>
            </div>
</body>
</html>
<?php $conn->close(); ?>