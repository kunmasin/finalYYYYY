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
        
                        <!-- Sidebar-->
                                                 <?php include("student_sidebar.php") ;?>
            <div class="content">
            <div class="container text-center">
            <h1 class="text-dark page-header">STUDENT LEVEL DETAILS</h1>


            <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>S/N</th>
                <th>Full Name</th>
                <th>Matric Number</th>
                <th>Level</th>
                <th>Programme</th>
                <th>Faculty</th>
                <th>Motto</th>
            </tr>
            </thead>

            <tr>
                <td>1</td>
                <td><?php echo $user["names"]?></td>
                <td><?php echo $user["matric_no"] ?></td>
                <td><?php echo $user["lvl_admitted"] ?> </td>
                <td><?php echo $user["course"] ?></td>
                <td><?php echo $user["faculty"] ?></td>
                <td><q> SKilled  Hands Wise Minds !!! </q></td>

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