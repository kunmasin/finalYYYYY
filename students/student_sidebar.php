<!-- Sidebar-->
    <!-- Toggle button -->
        <button type="button" id="sidebarCollapse" class="btn btn-success icon" style="margin-top: 10px; margin-left: 10px">
            <i class="fas fa-bars"></i>
        </button>
                         
<div class="col-xl-2 col-xl-2 col-xl-2 col-md-4 fixed-top sidebar" id="inDline">
                                       <button id="closeSidebar">            <i class="fas fa-bars"></i>
</button> <!-- Close icon -->

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
                                <!--<li class="nav-item"><a href="..\students\student_account_update.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-wrench text-light fa-lg mr-3"></i> ACCOUNT UPDATE</a></li> -->
                                <li class="nav-item"><a href="..\students\student_logout.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-file-alt text-light fa-lg mr-3"></i> LOGOUT</a></li>

                      
                            </ul>
                         </div>

                         <script>
    document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('inDline');
    const button = document.getElementById('sidebarCollapse');
    const closeButton = document.getElementById('closeSidebar');
    
    // Toggle sidebar visibility on button click
    button.addEventListener('click', function() {
        if (sidebar.classList.contains('show')) {
            sidebar.classList.remove('show');
        } else {
            sidebar.classList.add('show');
        }
    });
    
    // Close sidebar on close button click
    closeButton.addEventListener('click', function() {
        sidebar.classList.remove('show');
    });
});

</script>