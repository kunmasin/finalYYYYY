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
                            <h1 class="navbar-brand text-light d-block mx-auto  py-3 mb-4 bottom-border" style="font-size: 15px;">STUDENT DASHBOARD</h1>
                            <div class="bottom-border pb-3">
                            <h6 class="text-light"><?php echo $user['names'] ?></h6>
                            </div>
                            <ul class="navbar-nav flex-column">
                            <li class="nav-item"><a href="..\students\student_dashboard.php" class="nav-link cool p-2 mb-4 sidebar-link current"><i class="fas fa-home text-light fa-lg mr-3"></i> DASHBOARD</a></li>
                                <li class="nav-item"><a href="..\students\student_profile.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-user text-light fa-lg mr-3"></i> PROFILES</a></li>
                                <li class="nav-item"><a href="..\students\student_result.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-shopping-cart text-light fa-lg mr-3"></i> RESULT</a></li>
                                <li class="nav-item"><a href="..\students\student_programme_details.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-chart-line text-light fa-lg mr-3"></i> PROGRAMME DETAILS</a></li>
                                <li class="nav-item"><a href="..\students\student_level.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-chart-bar text-light fa-lg mr-3"></i> LEVEL</a></li>
                                <li class="nav-item"><a href="..\students\student_disciplinary_notice.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-table text-light fa-lg mr-3"></i> STUDENT NOTICE</a></li>
                                <li class="nav-item"><a href="..\students\student_account_update.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-wrench text-light fa-lg mr-3"></i> ACCOUNT UPDATE</a></li>
                                <li class="nav-item"><a href="..\students\student_logout.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-file-alt text-light fa-lg mr-3"></i> LOGOUT</a></li>

                            </ul>
                         </div>
                         
            <div class="content">
            <div class="container text-center">
            <h1 class="text-dark page-header">RESULT DETAILS</h1>
            <form action="">
            <div class="container">
             <div class="form-group">
                <select class="form-control">
                    <option value="" selected disabled>Select Your Course of Study</option>
                    <option value="">Software Engineering</option>
                    <option value="">Computer Science</option>
                    <option value="">Cyber Security</option>
                    <option value="">Economics</option>
                    <option value="">Accounting</option>
                    <option value="">International Relation</option>
                    <option value="">English</option>
                    <option value="">Mass Communication</option>
                    <option value="">Microbiology</option>
                    </select><br>
            </div>
            <div class="form-group">
                <select class="form-control">
                    <option value="" selected disabled>Select Your Faculty </option>
                    <option value="">Science and Computing</option>
                    <option value="">Humanaties and Management</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control">
                    <option value="" selected disabled>Choose Level of Admission</option>
                    <option value="">100 Level</option>
                    <option value="">200 Level</option>
                    <option value="">300 Level</option>
                    <option value="">400 Level</option>
                    <option value="">500 Level</option>
                </select>    
                <br>
            </div>

            <div class="form-group">
                <select class="form-control">
                    <option value="" selected disabled>Choose Semester of Application</option>
                    <option value="">1st Semester (Rain)</option>
                    <option value="">2nd Semester (Harmattan)</option>
                </select>    
                <br>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control text-white bg-dark" value="GENERATE RESULT">
            </div>
            </div>
        </form>
        </div>
        <div id="printable-area">
 

                                    <table id="" class="table table-bordered" style="width:90%; font-size: 12px;">
                                        <tbody><tr>
                                            <th>Student Number</th>
                                            <td><?php echo $user['matric_no']?></td>
                                            <th colspan="2" rowspan="3">
                                            <?php 
                        $mysqli= new mysqli('localhost','root','','student_discipline') or die($mysqli ->error);
                        $users= 'image';
                        //"SELECT  image FROM users WHERE s_N = {$user['s_N']}"
                        $result= $mysqli -> query("SELECT  image FROM student_users WHERE id = {$user['id']}") or die($mysqli -> error); //NOTE: to get particular user's image
                        if ($data = $result ->fetch_assoc()){
                            echo "<img src='{$data['image']}' width='150px' height='120px'/>";
                        }?>
                                                                   </th>
                                        </tr>

                                        <tr>
                                            <th>Full Name</th>
                                            <td><?php echo $user['names']?></td>
                                        </tr>

                                        <tr>
                                            <th>School</th>
                                            <td>Ahman Pategi University</td>
                                        </tr>

                                        <tr>
                                            <th>Faculty</th>
                                            <td><?php echo $user['faculty']?></td>
                                            <th>Department</th>
                                            <td>Computer Sciences </td>
                                        </tr>

                                        <tr>
                                            <th>Level</th>
                                            <td><?php echo $user["lvl_admitted"] ?></td>
                                            <th>Programme Option</th>
                                            <td><?php echo $user['course']?></td>
                                        </tr>
                                    </tbody></table>

                                                                        
                                    
                                        <table class="table table-striped table-bordered table-hover" style="font-size: 12px;">
                                            <thead>
                                            <tr>
                                                <th colspan="9">2023/2024 Second Semester</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">S/N</th>
                                                <th>Code</th>
                                                <th>Title</th>
                                                <th class="text-center">Unit</th>
                                                <th>Status</th>
                                                <th class="text-center">Final Score</th>
                                                <th>Grade</th>
                                                <th class="text-center">GP</th>
                                                <th class="text-center">WGP</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                                                                                                                                                                        <tr>
                                                    <td class="text-center">1</td>
                                                    <td>SEN 346</td>
                                                    <td>STUDENT INDUSTRIAL WORK EXPERIENCE (SIWES)</td>
                                                    <td class="text-center">6</td>
                                                    <td>C</td>
                                                    <td class="text-center">100</td>
                                                    <td>A</td>
                                                    <td class="text-center">5.0</td>
                                                    <td class="text-center">5.0</td>
                                                </tr>
                                            
                                                <tr>
                                                    <th colspan="3" class="text-right">Total</th>
                                                    <th class="text-center">6</th>
                                                    <th colspan="4">&nbsp;</th>
                                                    <th class="text-center">0</th>
                                                </tr>
                                                                                                <tr>
                                                    <th colspan="9" class="text-info">OutStanding Courses:
                                                                                                                    CHM 104; 
                                                                                                                    CHM 112; 
                                                                                                                    PHY 112; 
                                                                                                                    COS 102; 
                                                                                                                    COS 104; 
                                                                                                                    MTH 102; 
                                                                                                                    CHM 102; 
                                                                                                                    GST 122; 
                                                                                                                    GST 102; 
                                                                                                                    MTH 202; 
                                                                                                                    MTH 204; 
                                                                                                                    COS 202; 
                                                                                                                    COS 204; 
                                                                                                                    CSC 206; 
                                                                                                                    IFT 210; 
                                                                                                                    INS 204; 
                                                                                                                    GST 212; 
                                                                                                            </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="9" class="text-danger">CarryOver Courses: 
                                                                                                                                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="9">2023/2024 Second Semester Grade Point Average
                                                        : 0.00 </th>
                                                </tr>
                                                                                        <tr>
                                                
                                                <th colspan="9">2023/2024 Cummulative Grade Point Average : 2.63</th>
                                            </tr>
                                            </tbody>
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