<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("student_log_con.php");

if (!isset($_COOKIE['student'])) {
    header('location: student_login.php');
    exit;
}

$sql = "SELECT * FROM `student_users` WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_COOKIE['student']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    header('location: student_login.php');
    exit;
}
$stmt->close();

// Retrieve notices
$sql_notices = "SELECT * FROM notices WHERE student_name = ?";
$stmt_notices = $conn->prepare($sql_notices);
$stmt_notices->bind_param("s", $user['names']);
$stmt_notices->execute();
$result_notices = $stmt_notices->get_result();
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
                            <img src="../imgs/Ahman.webp" class="school-logo" alt="">
                            <h1 class="navbar-brand text-light d-block mx-auto  py-3 mb-4 bottom-border" style="font-size: 15px;">STUDENT DASHBOARD</h1>
                            <div class="bottom-border pb-3">
                               <!-- <h6 class="text-light"><?php echo $user['names'] ?></h6>-->
                            </div>
                            <ul class="navbar-nav flex-column">
                            <li class="nav-item"><a href="..\students\student_dashboard.php" class="nav-link cool p-2 mb-4 sidebar-link current"><i class="fas fa-home text-light fa-lg mr-3"></i> DASHBOARD</a></li>
                                <li class="nav-item"><a href="..\students\student_profile.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-user text-light fa-lg mr-3"></i> PROFILES</a></li>
                                <!--<li class="nav-item"><a href="..\students\student_result.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-shopping-cart text-light fa-lg mr-3"></i> RESULT</a></li> -->
                                <li class="nav-item"><a href="..\students\student_programme_details.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-chart-line text-light fa-lg mr-3"></i> PROGRAMME DETAILS</a></li>
                                <li class="nav-item"><a href="..\students\student_level.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-chart-bar text-light fa-lg mr-3"></i> LEVEL</a></li>
                                <li class="nav-item"><a href="..\students\student_disciplinary_notice.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-table text-light fa-lg mr-3"></i> STUDENT NOTICE</a></li>
                                <li class="nav-item"><a href="..\students\student_account_update.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-wrench text-light fa-lg mr-3"></i> ACCOUNT UPDATE</a></li>
                                <li class="nav-item"><a href="..\students\student_logout.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-file-alt text-light fa-lg mr-3"></i> LOGOUT</a></li>

                      
                            </ul>
                         </div>
                           <div class="content">
        <div class="container">
            <h1 class="text-dark page-header text-center mt-5">STUDENT DISCIPLINARY RECORD</h1>

            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Matric Number</th>
                        <th>Level</th>
                        <th>Programme</th>
                        <th>Faculty</th>
                        <th>Disciplinary Notice</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sn = 1;
                    if ($result_notices->num_rows > 0) {
                        while ($row_notice = $result_notices->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $sn++ . "</td>";
                            echo "<td>" . $user['names'] . "</td>";
                            echo "<td>" . $user['matric_no'] . "</td>";
                            echo "<td>" . $user['lvl_admitted'] . "</td>";
                            echo "<td>" . $user['course'] . "</td>";
                            echo "<td>" . $user['faculty'] . "</td>";
                            echo "<td><q>" . $row_notice['notice_text'] . "</q></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No notices found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
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