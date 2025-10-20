<?php 
include ("adminLogConnect.php");
if (!isset($_COOKIE['admin_users'])){
    header('location: ../logins.php');
    exit;
}
$sql="SELECT * FROM `admin_users` WHERE email LIKE '".$_COOKIE['admin_users']."'";
$user = array();

if($conn->query($sql) == TRUE){
    $sql="SELECT * FROM `admin_users` WHERE email LIKE '".$_COOKIE['admin_users']."'";
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
<html>
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
          <?php include ("admin_sidebar.php"); ?>               
            <div class="content">
            <div class="container text-center">
            <h1 class="text-dark page-header">USERS DETAILS</h1>


            <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>S/N</th>
                <th>Username</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Postion</th>
                <th>Address</th>
                <th>Motto</th>
            </tr>
            </thead>

            <tr>
                <td><?php echo $user["sN"] ?> </td>
                <td><?php echo $user["email"] ?></td>
                <td><?php echo $user["gender"] ?></td>
                <td><?php echo $user["phone_number"] ?> </td>
                <td><?php echo $user["position"] ?></td>
                <td><?php echo $user["address"] ?></td>
                <td>Skilled Hands, Wise Minds</td>
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
        </html>