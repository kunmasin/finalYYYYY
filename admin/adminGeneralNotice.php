<?php 
include ("adminLogconnect.php");
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
                                <li class="nav-item"><a href="..\admin\adminComplaints.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-envelope text-light fa-lg mr-3"></i> GENERAL COMPLAINTS</a></li>
                                <li class="nav-item"><a href="..\admin\adminGenerateReport.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-user text-light fa-lg mr-3"></i>GENERATE REPORT</a></li>
                                <li class="nav-item"><a href="..\admin\adminStudents.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-envelope text-light fa-lg mr-3"></i> STUDENTS</a></li>
                                <li class="nav-item"><a href="..\admin\adminLecturers.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-shopping-cart text-light fa-lg mr-3"></i> LECTURERS</a></li>
                                <li class="nav-item"><a href="..\admin\adminSettings.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-wrench text-light fa-lg mr-3"></i> SETTINGS</a></li>
                                <li class="nav-item"><a href="..\admin\adminLogout.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-file-alt text-light fa-lg mr-3"></i> LOGOUT</a></li>
                            </ul>
                         </div>
                         <div class="content">
            <div class="container">
                <h1 class="text-dark text-center">GENERAL NOTICE</h1>
                <h3 class="mt-5">Notice for all !!! </h3>
                <p>The University Management is delighted to inform you that you have been offered provisional admission to ABDUL VENTURES, ILORIN, KWARA STATE to study a FIRST DEGREE programme in <?Php echo $user['course']?> with the following details:</p>
                <li> <strong>Faculty:</strong> <span><?php echo $user['faculty']?></span></li>
                <li><strong>Department:</strong> <span><?php echo $user['course']?></span></li>
                <li><strong>Degree:</strong> <span>B.Sc</span></li>
                <li><strong>Duration of Programme:</strong> <span>4 Years</span></li>
                <br>
                <h5>The confirmation of the provisonal admission is subject to your possession of the minimum entry requirements or the programme to which you have been offered admission with the following conditions:</h5>
                <li>This offer of provisional admission is subject to your acceptance by completing the registration process as prescribed by the institution.</li>
                <li>You are required to present this admission letter at the time of registration, alongside other required documents.</li>
                <li>Failure to complete the registration process within the stipulated time frame may result in the forfeiture of your admission.</li>

                <h5 class="mt-5">Next Steps</h5>
                <li>Pay the acceptance fee as directed by the Abdul Ventures</li>
                <li>Proceed with the registration and documentation at the university.</li>
                <li>Attend the orientation program organized by the university.</li>
            <h5 class="mt-5 text-success text-center">CONGRATULATIONS ON YOUR ADMISSION, WE WISH YOU A HAPPY STAY AND HAPPY ENDING, BEST OF LUCK !!!!</h5>


           

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