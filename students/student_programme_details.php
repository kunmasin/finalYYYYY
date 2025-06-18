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
            <div class="container text-center">
            <h1 class="text-dark page-header">PROGRAMME DETAILS</h1>
            <div class="container mt-5">
             <div class="text-dark text-left">
               <h4>WELCOME <?php echo $user['names'] ?> </h4>
                <p>A <?php echo $user['course']?> 400 Level Student</p>
            </div>

            <div class="text-left">
                <h4>AHMAN PATEGI UNIVERSITY:</h4>
                <p>Ahman Pategi University, was founded in the year 2018, it is located in Patigi one of the local government in Kwara State, majorly occupied by the NUPE tribe conmbined with Yoruba and Igbo for business purpose.
                </p>
            </div>

            <div class="text-left">
                <h4>FACULTY:</h4>
                <p> <?php echo $user['faculty']?></p>
            </div>

            <div class="text-left">
                <h4> PROGRAMME(<?php echo $user['course'] ?>):</h4>
                    <p><?php echo $user['course']?> is one of the best courses around presently, people in the field mostly work as Web-developers, Mobile-developers, Web-Applications, Mobile-Applictions. etc....</P>
            </div>
           
            <div class="text-left">
                <h4>PROGRAMME DURATION:</h4>
                <p>The Programme is a 4 YEARS Programme</p>
                <br>
            </div>
            <div class="text-left">
                <h4 class="text-danger">NOTE:</h4>
                <p>Ensure you keep your composure, be focused and commited to learning, best of luck in your journey. Remember who you are. </p>
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