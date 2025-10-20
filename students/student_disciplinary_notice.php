<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("cookie.php");


$sql = "SELECT * FROM `student_users` WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_COOKIE['student_users']);
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
        
                       <!-- Sidebar-->
                                                 <?php include("student_sidebar.php") ;?>
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