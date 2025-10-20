<!-- Sidebar-->
    <!-- Toggle button -->
        <button type="button" id="sidebarCollapse" class="btn btn-success icon" style="margin-top: 10px; margin-left: 10px">
            <i class="fas fa-bars"></i>
        </button>
                        <!-- Sidebar-->
                         <div class="col-xl-2 col-xl-2 col-xl-2 col-md-4 fixed-top sidebar" id="inDline">
                            <button id="closeSidebar">            <i class="fas fa-bars"></i>
</button> <!-- Close icon -->
                <img src="../imgs/Ahman.webp" class="school-logo" alt="">
                <h1 class="navbar-brand text-light d-block mx-auto  py-3 mb-4 bottom-border" style="font-size: 15px;">LECTURER DASHBOARD</h1>
                <div class="bottom-border pb-3">
                    <!-- <h6 class="text-light"><?php echo $user['lecturer_name'] ?></h6> -->
                </div>
                <ul class="navbar-nav flex-column">
                <li class="nav-item"><a href="../lecturer/lecturerDashboard.php" class="nav-link cool p-2 mb-4 sidebar-link current"><i class="fas fa-home text-light fa-lg mr-3"></i>DASHBOARD</a></li>
                    <li class="nav-item"><a href="../lecturer/lecturerComplaints.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-user text-light fa-lg mr-3"></i>COMPLAINTS</a></li>
                    <li class="nav-item"><a href="../lecturer/lecturerGeneralNotice.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-user text-light fa-lg mr-3"></i>GENERAL NOTICE</a></li>
                    <li class="nav-item"><a href="../lecturer/lecturerStudents.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-envelope text-light fa-lg mr-3"></i> STUDENTS TABLE</a></li>
                    <li class="nav-item"><a href="../lecturer/lecturerTable.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-shopping-cart text-light fa-lg mr-3"></i>PROFILE</a></li>
                    <li class="nav-item"><a href="../lecturer/lecturerSettings.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-wrench text-light fa-lg mr-3"></i> SETTINGS</a></li>
                    <li class="nav-item"><a href="../lecturer/lecturerLogout.php" class="nav-link cool p-2 mb-4 sidebar-link"><i class="fas fa-file-alt text-light fa-lg mr-3"></i> LOGOUT</a></li>
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