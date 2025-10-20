<?php 
include ("lecturerLogConnect.php");
if (!isset($_COOKIE['lecturer_users'])){
    header('location: ../logins.php');
    exit;
}
$sql="SELECT * FROM `lecturer_users` WHERE email LIKE '".$_COOKIE['lecturer_users']."'";
$user = array();

if($conn->query($sql) == TRUE){
    $sql="SELECT * FROM `lecturer_users` WHERE email LIKE '".$_COOKIE['lecturer_users']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $user = $row; 
        }
    }else{
        header('location: ../logins.php');
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
        <?php include ("lecturer_sidebar.php") ;?>    
                         <div class="content">
            <div class="container">
                <h1 class="text-dark text-center">GENERAL NOTICE</h1>
                <h3 class="mt-5">Notice for all !!! </h3>
                <p>The University Management is delighted to inform you that you have been given appointment as the:</p>
                <li> <strong>Office:</strong> <span><?php echo $user['office']?></span></li>
                <li><strong>Adress:</strong> <span><?php echo $user['address']?></span></li>
                <li><strong>Qalificatiion:</strong> <span>Bsc, Msc, PhD</span></li>
                <li><strong>Duration of Appointment:</strong> <span>4 Years</span></li>
                <br>
                <!--<h5>The confirmation of the provisonal admission is subject to your possession of the minimum entry requirements or the programme to which you have been offered admission with the following conditions:</h5>
                <li>This offer of provisional admission is subject to your acceptance by completing the registration process as prescribed by the institution.</li>
                <li>You are required to present this admission letter at the time of registration, alongside other required documents.</li>
                <li>Failure to complete the registration process within the stipulated time frame may result in the forfeiture of your admission.</li>
-->
                <!--<h5 class="mt-5">Next Steps</h5>
                <li>Pay the acceptance fee as directed by the Abdul Ventures</li>
                <li>Proceed with the registration and documentation at the university.</li>
                <li>Attend the orientation program organized by the university.</li> -->
            <h5 class="mt-5 text-success text-center">CONGRATULATIONS ON YOUR APPOINTMENT, WE WISH YOU A HAPPY STAY AND HAPPY ENDING, BEST OF LUCK !!!!</h5>


           

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