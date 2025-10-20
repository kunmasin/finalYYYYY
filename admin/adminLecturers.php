<?php 
include ("adminLogConnect.php");
if (!isset($_COOKIE['admin_users'])){
    header('location: ../logins.php');
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
        header('location: ../logins.php');
        exit;
    }
    
}else{
    echo "Error: " .$sql."<br>".$conn->error;
}
$conn->close();

?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_discipline";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM lecturer_users";
$result = $conn->query($sql);
?>

<!DOCTYPE html> 
<php>
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
        
    </head>
        <body>
       
                        <?php include("admin_sidebar.php"); ?>
                                             
            <div class="content">
            <div class="container text-center">
            <h1 class="text-dark page-header">LECTURERS DETAILS</h1>


            <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>I/D</th>
                <th>Full name</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Office</th>
                <th>Motto</th>
            </tr>
            </thead>

            <tr>
            <?php
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"]. "</td>";
        echo "<td>" . $row["lecturer_name"]. "</td>";
        echo "<td>" . $row["gender"]. "</td>";
        echo "<td>" . $row["phone_number"]. "</td>";
        echo "<td>" . $row["email"]. "</td>";
        echo "<td>" . $row["office"]. "</td>";
        echo "<td>" . $row["status"] . "</td>";
      }
    } else {
      echo "<tr><td colspan='3'>No users found</td></tr>";
    }
    ?>

            </tr>

            </table>
        </div>
        </div>
        <script>
            function toggleSidebar() {
                var sidebar = document.getElementById("sidebar");
                sidebar.classList.toggle("active");
            }
        </script>
        </body>
        </php>