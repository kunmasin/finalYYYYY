<?php 
include ("adminLogConnect.php");
if (!isset($_COOKIE['admin'])){
    header('location: adminLogin.php');
    exit;
}
$sql="SELECT * FROM `admin_users` WHERE usernames LIKE '".$_COOKIE['admin']."'";
$user = array();

if($conn->query($sql) == TRUE){
    $sql="SELECT * FROM `admin_users` WHERE usernames LIKE '".$_COOKIE['admin']."'";
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

$sql = "SELECT id, lecturer_name, email, address, gender, office, phone_number FROM lecturer_users";
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
            <!-- Toggle button -->
        <button class="toggle-button" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i> Menu
        </button>

                        <!-- Sidebar-->
                        <div class="col-xl-2 col-xl-2 col-xl-2 col-md-4 fixed-top sidebar" id="sidebar">
                            <h1 class="navbar-brand text-light d-block mx-auto  py-3 mb-4 bottom-border" style="font-size: 15px;">ADMIN DASHBOARD</h1>
                            <div class="bottom-border pb-3">
                            <h6 class="text-light"><?php echo $user['usernames'] ?></h6>
                            </div>
                            <ul class="navbar-nav flex-column">
                                
                            <li class="nav-item"><a href="..\admin\adminDashboard.php" class="nav-link cool p-2 mb-4 sidebar-link current"><i class="fas fa-home text-light fa-lg mr-3"></i>DASHBOARD</a></li>
                                <li class="nav-item"><a href="..\admin\adminUsers.php" class="nav-link cool p-2 mb-4 sidebar-link current"><i class="fas fa-home text-light fa-lg mr-3"></i>USERS</a></li>
                                <li class="nav-item"><a href="..\admin\adminGeneralNotice.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-user text-light fa-lg mr-3"></i>GENERAL NOTICE</a></li>
                                <li class="nav-item"><a href="..\admin\adminComplaints.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-envelope text-light fa-lg mr-3"></i> GENERAL COMPLAINTS</a></li>
                                <li class="nav-item"><a href="..\admin\adminStudents.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-envelope text-light fa-lg mr-3"></i> STUDENTS</a></li>
                                <li class="nav-item"><a href="..\admin\adminLecturers.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-shopping-cart text-light fa-lg mr-3"></i> LECTURERS</a></li>
                                <li class="nav-item"><a href="..\admin\adminSettings.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-wrench text-light fa-lg mr-3"></i> SETTINGS</a></li>
                                <li class="nav-item"><a href="..\admin\adminLogout.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-file-alt text-light fa-lg mr-3"></i> LOGOUT</a></li>
                            </ul>
                         </div>
                       
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
      }
    } else {
      echo "<tr><td colspan='3'>No users found</td></tr>";
    }
    ?>
        <td>Skilled Hands Wise Minds </td>

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