<?php 
include ("cookie.php");
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
                        <div>
                        <?php 
                        $mysqli= new mysqli('localhost','root','','student_discipline') or die($mysqli ->error);
                        $users= 'image';
                        //"SELECT  image FROM users WHERE s_N = {$user['s_N']}"
                        $result= $mysqli -> query("SELECT  image FROM student_users WHERE id = {$user['id']}") or die($mysqli -> error); //NOTE: to get particular user's image
                        if ($data = $result ->fetch_assoc()){
                            echo "<img src='{$data['image']}' width='180px' height='100px'/>";
                        }?>
                         <h2><?php echo $user['names'] ?></h2>
                         <p>Returning Student</p>
                         <span><i class="fa fa-circle text-success"></i> Online Status</span>
                         <h2> WELCOME TO THE STUDENT DISCIPLINARY PORTAL</h2>
                         <p> <q> we are here to make life more convenient and easy for you. </q> </p>
                         </div>
                         <div class="table-responsive">
                         <div class="col-md-6">
                        <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                                <strong>Session</strong> 2023/2024
                            </td>
                            <td>
                                <strong>Semester</strong> Second Semester
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <strong>Programme</strong> Undergraduate (Regular)
                            </td>
                            <td>
                                <strong>Faculty</strong> <?php echo $user['faculty']?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Department</strong> Computer Sciences 
                            </td>
                            <td>
                                <strong>Programme Option</strong> <?php echo $user['course']?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Level</strong> <?php echo $user['lvl_admitted']?>
                            </td>
                            <td>
                                <strong>Centre</strong> Main Campus
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Matric Number</strong> <?php echo $user['matric_no']?>
                            </td>
                            <td>
                                <strong>Gender</strong> <?php echo $user['gender']?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                            </div>
                         </div>
                         <div class="greenandblue greenandblue_new">
                            <div class="col-lg-6 green bg-success">
                                <div class="widget lazur-bg p-xl">
                                    <div style="float:right"><i class="fa fa-at fa-5x"></i></div>
                                        <ul class="list-unstyled m-t-md">
                                            <li>
                                                <span class="fa fa-envelope m-r-xs"></span>
                                                <label>Email:</label>
                                                <?php echo $user['email']?>
                                            </li>
                                            <li>
                                                <span class="fa fa-phone m-r-xs"></span>
                                                <label>Mobile No:</label>
                                                <?php echo $user['phoneNumber']?>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                     
                            <div class="col-lg-6 blue bg-info">
                                <div class="widget navy-bg p-xl">
                                    <div style="float:left"><i class="fa fa-calendar fa-5x"></i></div>
                                    <div class="text-right">
                                        <span style="font-size: 28px;"><?php 
                                        date_default_timezone_set("Africa/Lagos");
                                        $today= date("l h:i:sa");
                                        echo $today?></span>
                                    </div>
                                </div>
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